<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::latest()->with('category')->get();
        return view('sub_category.index',compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('sub_category.create',compact('categories'));
    }
    public function store(Request $request)
    {
        //dd('ok');
        //dd($request->all());
        $request->validate([
            'category_id'=>'required',
            'sub_category'=>'required'
        ]);

       if(Subcategory::where('category_id',$request->category_id)->where('subcategory_name',$request->sub_category)->exists()){
           return back()->with('exists','subcategory already exists');
       }

        Subcategory::create([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->sub_category,
        ]);
     
        
        notify()->success('SubCategory Successfully Created!');
        return back();

        
    }
}
