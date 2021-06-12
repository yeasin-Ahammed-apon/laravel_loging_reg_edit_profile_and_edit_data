@extends('welcome')
@section('content')
    <div class="m-5">
        @if (session()->has('message'))
            <p class="alert alert-primary {{session()->get('color')}}">
                {{session()->get('message')}}
            </p>
        @endif
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection