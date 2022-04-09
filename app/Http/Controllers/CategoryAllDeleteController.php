<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAllDeleteController extends Controller
{
   public function deleteMarkAll(Request $request)
   {
     //  dd('ok');
      // dd($request->check);
       foreach($request->check as $id){      
        
            $category = Category::find($id);
            unlink(public_path('uploads/categories_photo/'.$category->image_path));
            $category->delete();

       }
       notify()->success('Delete mark all message successfully!');
       return back();
   } 
}
