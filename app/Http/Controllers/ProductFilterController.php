<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    public function all_products()
    {
        $products = Product::all();
        return view('frontend.shop.index',compact('products'));
    }

    public function search_products(Request $request)
    {
        $products = Product::whereBetween('price',[$request->left_value, $request->right_value])->get();
        return view('frontend.shop.index',compact('products'))->render();
    }

    public function sort_by(Request $request)
    {
        if($request->sort_by == 'lowest_price'){
            $products = Product::orderBy('price','asc')->get();
        }
        if($request->sort_by == 'highest_price'){
            $products = Product::orderBy('price','desc')->get();
        }
        return view('frontend.shop.index',compact('products'))->render();

    }
}
