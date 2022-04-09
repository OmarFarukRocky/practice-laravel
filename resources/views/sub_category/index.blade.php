@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-8 m-auto">
            <a  href="{{ route('subcategory.create') }}" class="btn btn-primary">Add Sub Categories</a>

           
            <table class="table">
                <thead>
                    <tr>                     
                        <th>SL</th>
                        <th>Sub Categoty</th>
                        <th>Category Name</th> 
                        <th>Created_at</th>
                        <th>Action</th>                       
                    </tr>
                </thead>
                <tbody>                           
                
                        @foreach ($subcategories as $subcategory)
                            <tr>
                               
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $subcategory->subcategory_name }}</td>
                                <td>{{ $subcategory->category->category_name}}</td>
                                <td>{{ $subcategory->created_at->diffForHumans()}}</td>
                                <td>Details</td>
                              
                                
                            </tr>
                        @endforeach
                                    
                </tbody>
            </table>
           

        </div>
    </div>
    
</div>




@endsection
 