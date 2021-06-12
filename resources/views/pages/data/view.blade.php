@extends('welcome')
@section('content')
<div class="m-5 w-50"> 
    @if ($datas == null)
        <h1>
            sorry try again
            <br>
            there are no resutl for this link
        </h1>        
    @else
    {{-- <img src= class="card-img-top" style="width: 40px" alt=""> --}}
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="" style="max-width:100%;
                                display:block;
                                height:auto;"
             src="{{asset('/storage/image/'.$datas->image)}}" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$datas->name}}</h5>
              <p class="card-text">{{$datas->details}}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            <div class="mb-4">
            <a href="{{url('/edit_page/'.$datas->id)}}">
                <button class="btn btn-primary">
                    Edit
                </button>
            </a> 
            <a href="{{url('/delete/'.$datas->id)}}">
                <button class="btn btn-danger">
                    Delete
                </button>
            </a>  
            </div>
          </div>
        </div>
      </div>
    @endif
</div>
@endsection