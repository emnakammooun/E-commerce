<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Admin/Products/Index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Admin/Products/Create',compact('categories'));
    }

    public function store (Request $request){
     $request->validate([
         'name' => 'required|string|max:50',
         'description' => 'required|string',
         'qty' => 'required|integer',
         'price' => 'required|string',
         'sale_price' => 'required|string',
         'image' => 'required|file|mimes:jpg,jpeg,png',
     ]);
     $model = new Product();
     if ($request->image){
         $model->image = $request->file('image')->store('images/product','public');
     }
     $model->name = $request->name;
     $model->description = $request->description;
     $model->qty = $request->qty;
     $model->price = $request->price;
     $model->sale_price = $request->sale_price;

    $model->save();
    return redirect()->route('product.index');}


    public function edit ($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return Inertia::render( 'Admin/Products/Edit',compact('product','categories'));
    }


    public function update (Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'qty' => 'required|integer',
            'price' => 'required|string',
            'sale_price' => 'required|string',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);
      $model = Product::findOrFail($id);
      if ($request->hasFile('image')){
        $model->image = $request->file('image')->store('images/product','public');

    }
    $model->name = $request->name;
    $model->description = $request->description;
    $model->qty = $request->qty;
    $model->price = $request->price;
    $model->sale_price = $request->sale_price;
   $model->save();
    return redirect()->route('product.index');
    }

    public function destroy($id)
{
    $model = Product::findOrFail($id);

    if (!empty($model->image)) {
        Storage::delete("public/" . $model->image);
    }

    $model->delete();

    return redirect()->route('product.index');
}
}
