<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return Inertia::render('Admin/Brands/Index',compact('brands'));
    }

    public function create()
    {
        return Inertia::render('Admin/Brands/Create');
    }

    public function store (Request $request){
     $request->validate([
         'brand_name' => 'required|string|max:50',
         'brand_image' => 'required|file|mimes:jpg,jpeg,png',
     ]);
     $model = new Brand();
     if ($request->brand_image){
         $model->image = $request->file('brand_image')->store('images/brand','public');
     }
     $model->brand_name = $request->brand_name;
    $model->save();
    return redirect()->route('brand.index');}


    public function edit ($id){
        $brand = Brand::findOrFail($id);
        return Inertia::render( 'Admin/Brands/Edit',compact('brand'));
    }


    public function update (Request $request, $id){
        $request->validate(['brand_name' => 'required|string|max:50',
        // 'brand_image" => 'sometime nullable image mimes jpg, jpeg, png',
      ]);
      $model = Brand::findOrFail($id);
      if ($request->hasFile('brand_image')){
        $model->image = $request->file('brand_image')->store('images/brand','public');

    }
    $model->brand_name = $request->brand_name;
    $model->save();
    return redirect()->route('brand.index');
    }

    public function destroy($id)
{
    $model = Brand::findOrFail($id);

    if (!empty($model->image)) {
        Storage::delete("public/" . $model->image);
    }

    $model->delete();

    return redirect()->route('brand.index');
}

}
