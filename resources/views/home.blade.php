@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User list  <span>Total: {{ $users->total() }}</span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  You are login {{ Auth::user()->name }}
                  
                  <form action="{{ route('sendAllEmail') }}" method="post">
                    @csrf
                  <table class="table">
                      <thead>
                          <tr>
                              <th>
                                  <input class="form-check-input" type="checkbox" id="MarkAll">
                                  <span>Mark all</span>
                                </th>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($users as $user)
                          <tr>
                              <td>
                                <input class="form-check-input" type="checkbox" value="{{ $user->id }}" name="check[]">
                              </td>
                            <td>{{ $users->firstitem() + $loop->index}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('sendEmail',$user->id) }}" class="btn btn-primary">Send Email</a>
                            </td>
                        </tr>
                          @empty
                          <p class="text-danger">Nothing found</p>
                              
                          @endforelse
   
                      </tbody>
                     
                  </table>
                <button type="submit" class="btn btn-primary mb-3">Send all select email</button>
            </form>
                  {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#MarkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

@endsection

