@extends('welcome')
@section('content')
<div class="m-5">
    @if (session()->has('message'))
        <p class="alert alert-primary {{session()->get('color')}}">
            {{session()->get('message')}}
        </p>
    @endif
    @if ($datas->isEmpty())
        <h1>
            No data added yeat
        </h1>        
    @else
        <table class="table ">
            <thead>
            <tr>                    
                <th scope="col">Name</th>
                <th scope="col">Image</th>            
                <th scope="col">Action</th>            
            </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)            
                        <tr>                            
                            <td><img src="{{asset('/storage/image/'.$data->image)}}" style="width: 40px" alt=""></td>                    
                            <td>{{$data->name}}</td>
                            <td>
                                <a href="{{url('/view_public/'.$data->id)}}">
                                    <button class="btn btn-success">
                                        View
                                    </button>
                                </a>                                  
                            </td>
                        </tr>                  
                    @endforeach
            </tbody>
        </table>
    @endif
</div>
    
@endsection