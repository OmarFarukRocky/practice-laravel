@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-8 m-auto">
            <a  href="{{ route('category.create') }}" class="btn btn-primary">Add Categories</a>

            <form action="{{ route('deleteMarkAll') }}" method="post">
            @csrf
            @method('DELETE')
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox"  id="checkAll" class="form-check-input ">
                            <span>Mark all</span>
                        </th>
                        <th>SL</th>
                        <th>Added By</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>category photo</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                           
                    @if ($categories->count())
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" name="check[]" value="{{ $category->id }}" class="form-check-input">
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->status == 'hide' ? 'Hide':'Show' }}</td>
                                <td>
                                    <img src="{{ asset('uploads/categories_photo').'/'.$category->image_path }}" width="100" alt="">
                                </td>
                                <td>{{ $category->created_at->format('F j, Y, g:i a') }}</td>
                                <td>
                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p class="text-danger">Nothing found!</p>
                    @endif                   
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger btn-sm">Delete mark all</button>
        </form>

        </div>
    </div>
    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>



@endsection
 