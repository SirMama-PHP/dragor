<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontendController extends Controller
{
    function index(){
        return view('frontend.index',[
            'categories' => Category::all(),
            'products'=> Product::all(),
        ]);
    }

    function ProductDetiels($Product_id){
        return view('admin.product.singelproduct',[
            'products_info'=> Product::find($Product_id)
        ]);
    }
}
