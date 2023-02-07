<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdtaePostRequest;
use App\Jobs\PruneOldPostsJob;

class PostController extends Controller
{
    public function index()
    {
        PruneOldPostsJob::dispatch();
        $allPosts = Post::paginate(10);
        
    //    dd($allPosts);
        return view('posts.index',[
            'posts' => $allPosts,
            
        ]);
    }

    public function create()
    {
        $users = User::get();
 
        return view('posts.create',[
            'users' => $users,
        ]);
        // return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        
        $input = $request-> all();
        // dd($input);
        // $id = $input['id'];
        $title = $input['title'];
        $posted_by = $input['posted_by'];
        $description = $input['description'];
        $userId = $input['posted_by'];
        $image = $input['image'];

        Post:: create([
            'user_id' => $userId,
            'title' => $title,
            'posted_by' => $posted_by,
            'description' => $description,
            'image' => $image
        ]);
        
        return redirect()->route('posts.index');
    }

    public function show($postid)
    {
        // dd($postid);
        $post = Post:: find($postid);
        $userid = $post['user_id'];
        $user = User:: find($userid);
        // dd($user);

        return view('posts.show',[
            'post' => $post,
            'user' => $user
        ]);
        // return $post->title;
    }
    
    public function edit($postid)
    {
        $post = Post:: find($postid);
        // dd($post);
        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    public function update($postid, UpdtaePostRequest $request)
    {
        $post = Post :: find($postid);
        $newdata= $request-> all();
        $post->update([
            'title'=> $newdata['title'],
            'description'=> $newdata['description']
        ]);
        // dd($newdata);
        // $request->validate([
        //                'title' => ['required', 'min:3'],
        //                'description' => ['required', 'min:5'],
        //            ]);

        return redirect()->route('posts.index');
    }

    public function destroy($postid)
    {
        $post= Post:: find($postid);
        $post->delete();
        return redirect()->route('posts.index');

    }
}