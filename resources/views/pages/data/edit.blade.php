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
    <form action="/update" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id"  value="{{$datas->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" value="{{$datas->name}}" name="name" class="form-control" >            
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">image</label>
            <input class="form-control" type="file" name="image" id="formFile">
          </div>
        <div class="mb-3">
            <label class="form-label">Details</label>
            <input type="text" value="{{$datas->details}}" name="details" class="form-control" >
        </div>          
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection