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
      <th scope="col">Slug</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    

    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post['title'] }}</td>
      
      <td>{{ $post->user->name}}</td>
      <td>{{ $post['created_at'] }}</td>
      <td>{{ $post['slug'] }}</td>
      <td>
        <a href="{{route('posts.show', $post->id)}}" class="btn btn-info ">view</a>
        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning ">edit</a>
        <form style="display: inline" action="{{route('posts.destroy', $post->id)}}" method="POST">
          @csrf
          @method('delete')
          <button class="btn btn-danger" type="submit">delete</button>
        </form>
        
      </td>
    </tr>
    @endforeach
    {{ $posts->links('pagination::bootstrap-5') }}
  </tbody>
</table>
</div>
@endsection

