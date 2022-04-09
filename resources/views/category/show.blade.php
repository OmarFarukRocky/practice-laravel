@extends('layouts.app')
@section('content')
<div class="">

    <div class="row">
        <div class="col-lg-6 m-auto">
          
            <div class="card mt-3">        
                <div class="card-body">
                   <p> Id: {{ $category->id }}</p>
                   <h4> User name: {{ $category->user->name }} </h4>
                   <p> Category name: {{ $category->category_name }}</p>
                   <p>Status: {{ $category->status == 'hide' ?'Hide':'Show' }}</p>
                   <p> Created at: {{ $category->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary w-100">Edit</a>
            </div>

            <div class="mt-3">
                <form action="{{ route('category.destroy',$category->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                </form>

            </div>

        </div>
    </div>
    
</div>
@endsection