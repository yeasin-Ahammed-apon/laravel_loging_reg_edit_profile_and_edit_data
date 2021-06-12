@extends('welcome')
@section('content')
<div class="m-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    {{-- messages --}}
    <form action="/registration" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label  class="form-label">Name</label>
          <input type="text" name="name" class="form-control">          
        </div>
        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email" name="email" class="form-control">          
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" name="password" class="form-control">          
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input class="form-control" type="file" name='image'>
        </div>        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection