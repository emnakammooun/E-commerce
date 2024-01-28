<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return Inertia::render('Admin/Slider/Index',compact('sliders'));
    }

    public function create()
    {
        return Inertia::render('Admin/Slider/Create');
    }

    public function store (Request $request){
     $request->validate([
        'slider_position'=>'required|numeric|max:10',
        'title'=>'required|string|max:100',
        'description'=>'required|string|max:500',
        'btn_name'=>'required|string|max:50',
        'btn_link'=>'required|string|max:50',
        'slider_image'=>'required|image|mimes:jpg,jpeg,png',
        'status'=>'required|boolean',
     ]);
     $model = new Slider();
     if ($request->slider_image){
        $model->image = $request->file('slider_image')->store('images/slider','public');
     }
     $model->position = $request->slider_position;
     $model->title = $request->title;
$model->description = $request->description;
$model->btn_name = $request->btn_name;
$model->btn_link = $request->btn_link;
$model->status = $request->status;
    $model->save();
    return redirect()->route('slider.index');}


    public function edit ($id){
        $slider = Slider::findOrFail($id);
        return Inertia::render( 'Admin/Slider/Edit',compact('slider'));
    }


    public function update (Request $request, $id){
        $request->validate([
            'slider_position' => 'required|numeric|max:10',
            'title'=>'required|string|max:100',
            'description'=>'required|string|max:500',
            'btn_name'=>'required|string|max:50',
            'btn_link'=>'required|string|max:50',
            'status'=>'required|boolean'
        
      ]);
      $model = Slider::findOrFail($id);
      if ($request->hasFile('slider_image')){
        $model->image = $request->file('slider_image')->store('images/slider','public');

    }
    $model->position = $request->slider_position;
    $model->title = $request->title;
    $model->description = $request->description;
    $model->btn_name = $request->btn_name;
    $model->btn_link = $request->btn_link;
    $model->status = $request->status;
    $model->save();
    return redirect()->route('slider.index');
    }

    public function destroy($id)
{
    $model = Slider::findOrFail($id);

    if (!empty($model->image)) {
        Storage::delete("public/" . $model->image);
    }

    $model->delete();

    return redirect()->route('slider.index');
}


}
