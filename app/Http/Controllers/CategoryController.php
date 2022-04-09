<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Image;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('category.index',['categories'=>Category::latest()->with('user')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_photo'=>'required|image',
        ]);
        
        //dd($request->category_photo);
       $new_image_path = time().'-'.Auth::id().'.'.$request->category_photo->extension();
       //dd($new_image_path);
       $img = Image::make($request->category_photo)->resize(50,50);
       $img->save(public_path('uploads/categories_photo/'.$new_image_path));
      //dd('ok');
       $request->user()->categories()->create([
            'category_name'=>$request->category_name, 
            'image_path'=> $new_image_path              
       ]);

        notify()->success('Category Successfully Created!');
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('category.show',['category'=>Category::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit',['category'=>Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->hasFile('new_category_photo')){
           //delete old photo
           $new_image_path = time().'-'.Auth::id().'.'.$request->new_category_photo->extension();
           unlink(public_path('uploads/categories_photo/'.Category::find($id)->image_path));
           //upload new photo
           //dd($new_image_path);
           $img = Image::make($request->new_category_photo)->resize(50,50);
           $img->save(public_path('uploads/categories_photo/'.$new_image_path));
           //update data base
           Category::find($id)->update([
            'image_path'=>$new_image_path 
           ]);
        }

    //     dd($request->all());
    //     dd($request->status);
       Category::find($id)->update([
           
           'category_name' => $request->category_name,
           'status'=>$request->status,
       ]);
       notify()->success('Category Successfully Updated!');    
       return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);
       unlink(public_path('uploads/categories_photo/'.$category->image_path));
       $category->delete();

       notify()->success('Category Successfully Deleted!');
       return redirect()->route('category.index');
    }
}
