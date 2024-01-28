<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function cartView(){

        $cartBox = session()->get('cart');
        //dd($cartBox);
        return inertia ('Site/Cart', compact('cartBox'));
    }

    public function addToCart($product_id) {
        $product = Product::findOrFail($product_id);

        //create cart using session
        $cart =session()->get('cart');
        //dd($cart);

        // if cart does not exist
        if (isset($cart)) {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'qty' => 1,
                'price' => $product->sale_price,
            ];
        
            session()->put('cart', $cart);
            return redirect()->route('cartView');
        }
        

        //if again want to add previous product
        if(isset($cart[$product_id])){
            $cart[$product_id]['qty']++;
            session()->put('cart', $cart);
                return redirect()->route('cartView');
        
        }

        if (isset($cart)){
            $cart = [$product->id] = [

                    'id' =>$product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'qty' => 1,
                    'price' => $product->sale_price,
            ];
                
                  
        session()->put('cart', $cart);
        return redirect()->route('cartView');
        }
    }

    public function removeCart($product_id){
        $cart = Session::get('cart');
        if(isset($cart[$product_id])){
            unset($cart[$product_id]);
            session()->put('cart', $cart);
            return redirect()->route('cartView');

        }
        
    }

    public function upsertProductQty(Request $request){
        $cart = Session::get('cart');
        if(isset($cart[$request->product_id])){
            $cart[$request->product_id]['qty']= $request->qty;
            
            session()->put('cart', $cart);
            return redirect()->route('cartView');

        }
        
    }
        
    }

