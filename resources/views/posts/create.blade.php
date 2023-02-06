@extends('layouts.app')

@section('title') create @endsection

@section('content')

<form method="post" action="/posts" class="container ">
@csrf
  
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Posted by</label>
    <select name="posted_by" class="form-control">
      @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
  </select>
  </div>

<div class="form-group">
  <label for="exampleInputEmail1">Description</label>
  <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
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