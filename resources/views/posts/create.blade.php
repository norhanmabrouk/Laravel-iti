@extends('layouts.app')

@section('title') create @endsection

@section('content')

<form method="post" action="/posts" class="container ">
@csrf
  <div class="form-group ">
    <label for="exampleInputEmail1">#</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div><div class="form-group">
    <label for="exampleInputEmail1">Psted by</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div><div class="form-group">
    <label for="exampleInputEmail1">Created at</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection