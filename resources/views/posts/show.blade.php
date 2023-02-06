@extends('layouts.app')

@section('title') show @endsection

@section('content')
<section class="vh-80">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-top h-80">
      <div class="col-xl-10">
        <div class="card mb-5" style="border-radius: 15px;">
          <div class="card-body p-4">
            <h3 class="mb-3">Post Info</h3>
            <hr class="my-4">
            <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>Title</strong> <span class="mx-2">|</span> {{ $post['title'] }} </p>
            <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>Posted by</strong> <span class="mx-2">|</span> {{ $post['posted_by'] }} </p>
            <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>Created at</strong> <span class="mx-2">|</span> {{ $post['created_at'] }} </p>
            <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>Description</strong> <span class="mx-2">|</span> {{ $post['description'] }} </p>

          {{-- @dd($post['created_at'])   --}}
          </div>
          </div>
        </div>

        <div class="col-xl-10">
        <div class="card mb-5" style="border-radius: 15px;">
          <div class="card-body p-4">
            <h3 class="mb-3">Post Creator Info</h3>
            <hr class="my-4">
            <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>Name</strong> <span class="mx-2">|</span>{{ $user['name'] }}</p>
            <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>E-mail</strong> <span class="mx-2">|</span> {{ $user['email'] }}</p>
            
            </div>
          </div>
        </div>

        @if ($post->comments)
          @foreach ($post->comments as $comment)
            <div class="col-xl-10">
              <div class="card mb-5" style="border-radius: 15px;">
                <div class="card-body p-4">
                  <h3 class="mb-3">Comment #{{ $comment->id }}</h3>
                  <hr class="my-4">
                  <p class="small mb-0"><i class="far fa-star fa-lg"></i>{{ $comment->body }}</p>
                  <p class="small mb-0"><i class="far fa-star fa-lg"></i><strong>{{ $post->user->name }}, 
                    {{ $comment->created_at->format('20y-m-d') }}</strong></p>
                </div>
              </div>
            </div>
           @endforeach
        @endif

                    {{--  Create a comment --}}
         <div class="col-xl-10">
          <form method="POST" action="{{ route('comments.store', $post->id) }}">
            @csrf
            
            <textarea class="form-control" placeholder="Add your comment here" name="body" style="width: 70%; 
            height:100px; border-color:black"></textarea>
            
            <button type="submit" class=" btn mt-2 text-light" style="width:70%; border-color:#85586F ;
             background-color:black">Post Your Comment</button>
          </form>
         </div>



        
        <!-- <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <h3 class="mb-3">Company Culture</h3>
            <p class="small mb-0"><i class="fas fa-star fa-lg text-warning"></i> <span class="mx-2">|</span>
              Public <span class="mx-2">|</span> Updated by <strong>MDBootstrap</strong> on 11 April , 2021
            </p>
            <hr class="my-4">
            <div class="d-flex justify-content-start align-items-center">
              <p class="mb-0 text-uppercase"><i class="fas fa-cog me-2"></i> <span
                  class="text-muted small">settings</span></p>
              <p class="mb-0 text-uppercase"><i class="fas fa-link ms-4 me-2"></i> <span
                  class="text-muted small">program link</span></p>
              <p class="mb-0 text-uppercase"><i class="fas fa-ellipsis-h ms-4 me-2"></i> <span
                  class="text-muted small">program link</span>
                <span class="ms-3 me-4">|</span></p>
              <a href="#!">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp" alt="avatar"
                  class="img-fluid rounded-circle me-1" width="35">
              </a>
              <a href="#!">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar"
                  class="img-fluid rounded-circle me-1" width="35">
              </a>
              <a href="#!">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp" alt="avatar"
                  class="img-fluid rounded-circle me-1" width="35">
              </a>
              <a href="#!">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                  class="img-fluid rounded-circle me-3" width="35">
              </a>
              <button type="button" class="btn btn-outline-dark btn-sm btn-floating">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>
@endsection