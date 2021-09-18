@extends('layouts.app')


@section('content')

<h1 class="text-center text-info display-2"> List All Files</h1>
<div class="container col-6">
    <div class="card">
        <div class="crd-body">

           <table class="table table-dark">
               <tr>
                   <th>ID</th>
                   <th>Title</th>
                   <th colspan="3">Action</th>
               </tr>
               @foreach ($files as $data)
               <tr>
                <th>{{$data->id}}</th>
                <th>{{$data->title}}</th>
                <th><a href="{{ route('file.show',$data->id ) }}"><i class="fas fa-eye" style="font-size=25px;"></i></a></th>
                <th><a href="{{ route('file.edit',$data->id) }}"><i class="fas fa-edit"></i></a></th>
                <th><a href="{{ route('file.destroy',$data->id) }}" style="font-size=25px;"><i class="fas fa-trash-alt"></i></a></th>
               </tr>
               @endforeach
           </table>
        </div>
    </div>
</div>


@endsection
