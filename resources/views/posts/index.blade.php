@extends('layouts.app')

@section('title') index @endsection

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tilte</th>
      
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    

    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post['title'] }}</td>
      
      <td>{{ $post['posted_by'] }}</td>
      <td>{{ $post['created_at'] }}</td>
      <td>
        <a href="/show/{{$post['id']}}" class="btn btn-info ">view</a>
        <a href="{{route('posts.edit')}}" class="btn btn-warning ">edit</a>
        <a href="/#" class="btn btn-danger ">delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection

