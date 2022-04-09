@extends('layouts.app')
@section('content')
<div class="">

    <div class="row">
        <div class="col-lg-6 m-auto">
          
            <div class="card mt-3">   
               <div class="card-header">Sub Category</div> 
                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select name="category_id" id="" class="form-control">
                                <option >-- Select Category --</option>
                                @foreach ($categories as $category)                                    
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>                                
                                @endforeach
                            </select>
                            @error('category_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="subcategory">Sub Category</label>                           
                            <input type="text" name="sub_category" class="form-control">
                            @if (session('exists'))
                            <strong class="text-danger">{{ session('exists') }}</strong>
                            @endif
                            @error('sub_category')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>                    
         
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Add subCategory</button>
                        </div>

                    </form>
                    
                </div>
            </div>

        </div>
    </div>
    
</div>
@endsection