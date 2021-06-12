@extends('welcome')
@section('content')
<div class="m-5 text-center" >
    @if (session()->has('message'))
    <div class="alert alert-primary {{session()->get('color')}}" role="alert">
        {{session()->get('message')}}
      </div>
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
                                <a href="{{url('/view/'.$data->id)}}">
                                    <button class="btn btn-success">
                                        View
                                    </button>
                                </a>  
                                <a href="{{url('/edit_page/'.$data->id)}}">
                                    <button class="btn btn-primary">
                                        Edit
                                    </button>
                                </a> 
                                <a href="{{url('/delete/'.$data->id)}}">
                                    <button class="btn btn-danger">
                                        Delete
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