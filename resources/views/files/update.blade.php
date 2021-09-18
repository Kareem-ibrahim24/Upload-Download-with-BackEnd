
@extends('layouts.app')


@section('content')

<h1 class="text-center text-info display-2"> Edit File  :{{$file->id}}  </h1>
<div class="container col-6">
    <div class="card">
        <div class="crd-body">

            <form action="{{ route('file.update',$file->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Title</label>
                    <input type="text" value="{{$file->title}}" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>File Description</label>
                    <input type="text"  value="{{$file->desc}}"  name="desc" class="form-control">
                </div>
                <div class="form-group">
                    <label>Upload File :{{$file->mainFile}}</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <button class="btn btn-primary"> Update Data</button>
            </form>
        </div>
    </div>
</div>


@endsection
