@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-6 m-auto">
          
            <div class="card mt-3">        
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" id="" class="form-control" placeholder="" >             
                            @error('category_name')
                                <small>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </small>
                            @enderror
                          </div>

                        <div class="form-group mt-3 ">                            
                            <label for="">Choose a picture</label>
                            <br>
                            <input type="file" name="category_photo" id="" class="form-control"> 
                            @error('category_photo')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror                                            
                        </div>

                          <div class="form-group mt-3">
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>

                    </form>
                    
                </div>
            </div>

        </div>
    </div>
    
</div>
@endsection