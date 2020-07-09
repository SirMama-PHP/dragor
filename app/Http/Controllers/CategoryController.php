<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;



class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    function AddCategory(){
        $categories = Category::all();
        $delete_categories = Category::onlyTrashed()->get();
        return view('admin.category.category', compact('categories', 'delete_categories'));
    }

    function AddCategoryPost(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_photo' => 'required|image'
        ], [
            'category_name.required' => 'ভাই তুমি ক্যাটেগরি টা দেও ?',
        ]);
        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'category_photo' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        //photo uploads start
        $upload_photo = $request->file('category_photo');
        $new_name =  $category_id . '.' . $upload_photo->getClientOriginalExtension();
        $new_uploade_location = base_path('public/uploads/category_photo/'. $new_name);
        Image::make($upload_photo)->resize(300,250)->save($new_uploade_location);
        //photo uploads end
        Category::find($category_id)->update([
            'category_photo'=> $new_name
        ]);
        return back()->with('success_massage', 'Category Added Successfully');
    }

    function UpdateCategory($category_id){
        $category_name = Category::find($category_id)->category_name;
        return view('admin.category.update', compact('category_name', 'category_id'));
    }

    function UpdateCategoryPost(Request $request){
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name
        ]);
        return redirect('add_category')->with('update_status', 'Your Category Successfully Updated ');
    }

    function DeleteCategory($id){
        Category::find($id)->delete();
        return back()->with('delete_status', 'Category Deleted Successfully');
    }

    function RestoreCategory($id){
        Category::withTrashed()->find($id)->restore();
        return back()->with('restore_status', 'Category Restore Successfully');
    }

    function HardDeleteCategory($id){
        Category::onlyTrashed()->find($id)->forceDelete();
        return back()->with('forcedelete_status', 'Category ForceDelete Successfully');
    }
}
