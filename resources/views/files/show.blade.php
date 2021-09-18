@extends('layouts.app')


@section('content')

<h1 class="text-center text-info display-2"> Show File :{{$file->id}} </h1>
<div class="container col-6">
    <div class="card">
        {{$file->title}}
        <div class="card-body">
            description {{$file->description}}
          <img width="250px" src="{{ asset("uploades/$file->mainFile") }}" alt="">
            <a href="{{ route('file.download', $file->id) }}"class="btn btn-primary btn-block mx-2">Download</a>

        </div>
    </div>
</div>


@endsection
