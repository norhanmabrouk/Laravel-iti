@extends('layouts.app')

@section('title') edit @endsection

@section('content')

<form method="post" action="{{route('posts.update', $post->id)}}" class="container ">
@csrf
@method('put')
  <div class="form-group">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $post['title'] }}">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $post['description'] }}">
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

@endsection