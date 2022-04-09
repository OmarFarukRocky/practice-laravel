@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-6 m-auto">
          
            <div class="card mt-3">        
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-3 ">
                            <label for="">Status : {{ $category->status }}</label>
                                <select name="status" class="form-select">
                                    <option value="show" @if ($category->status=='show') selected @endif>Show</option>
                                    <option value="hide" @if ($category->status=='hide') selected @endif>Hide</option>                                    
                                </select>
                            
                      </div>
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" id="" class="form-control" value="{{ $category->category_name }}">             
                            @error('category_name')
                                <small>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </small>
                            @enderror
                          </div>

                        <div class="form-group mt-3 ">                            
                            <label for="">Old picture</label>
                            <br>
                            <img src="{{ asset('uploads/categories_photo/'.$category->image_path) }}" alt="">                                       
                        </div>


                        <div class="form-group mt-3 "> 

                            <label for="">Choose a new picture</label>
                            <br>
                            <input type="file" name="new_category_photo" id="" class="form-control"> 
                                @error('new_category_photo')
                                    <small>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </small>
                                @enderror  

                        </div>
                         
              
                          <div class="form-group mt-3">
                              <button type="submit" class="btn btn-success">Update Category</button>
                          </div>

                    </form>
                    
                </div>
            </div>

        </div>
    </div>
    
</div>
@endsection