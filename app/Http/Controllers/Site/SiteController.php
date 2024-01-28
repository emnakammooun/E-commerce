<?php

namespace App\Http\Controllers\Site;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $products = Product::where('status',true)->inRandomOrder()->get();
        $latest_products = Product::where('status',true)->latest()->limit(4)->get();
        $sliders = Slider::where('status',true)->get();
        $categories = Category::withCount('products')->where('status',true)->get();

        return inertia ('Site/Home',compact('sliders','categories','products','latest_products'));
    }

    public function shop(){
        return inertia ('Site/Products');
    }
    
    public function productDetail(Request $request){
        $product = Product::findOrFail(request ()->product_id);
        return inertia ('Site/ProductDetail',compact('product'));
    }
}
