<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class FrontendController extends Controller
{
    function index(){
        return view('frontend.index',[
            'categories' => Category::all(),
        ]);
    }
}
