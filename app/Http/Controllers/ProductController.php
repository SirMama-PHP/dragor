<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    function Add_Product(){

        return view('admin.product.index',[
            'categories'=>Category::all(),
        ]);
    }

    function AddProductPost(Request $request){
        // print_r($request->all());
        // die();
       Product::insert([
        'product_name'=>$request->product_name,
        'category_id'=>$request->category_id,
        'product_price'=>$request->product_price,
        'product_quantity'=>$request->product_quantity,
        'product_short_description'=>$request->product_short_description,
        'product_long_description'=>$request->product_long_description,
        'product_thumbnail_photo'=>'photo',
        'created_at'=>carbon::now(),
       ]);
       echo 'done';
    }
}
