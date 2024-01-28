<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registerView(){
        return view ('auth.register');
    }

    public function loginView(){
        return view ('auth.login');
    }
    public function postRegister(Request $request){
        $attr = $request -> validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|unique:users|max:50',
            'password' => 'required|confirmed|max:50',
        ]);
        $attr['password'] = bcrypt($request->password);
        User::create($attr);
        return back()->withSuccess('Register Successfully!! Please Login Now');
}

public function postLogin(Request $request){
    $credentials = $request->validate([
        'email' => 'required|string|email|max:50',
        'password' => 'required|max:50',
    ]);

    if(Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Log the user's status for debugging
        \Log::info('User Status: ' . $user->status);

        if ($user->status === 'admin') {
            return redirect('/dashboard');
        } elseif ($user->status === 'client') {
            return redirect('/');
        } else {
            // Log the unexpected status for further debugging
            \Log::error('Unexpected user status: ' . $user->status);
            // Redirect to the default location (home or login)
            return redirect('/');
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}


public function logout(Request $request): RedirectResponse
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

}