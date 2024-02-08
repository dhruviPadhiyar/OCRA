<?php

namespace App\Http\Controllers;

use App\Events\PostUpdated;
use App\Event\PostCreated;
use App\Http\Requests\PostsRequest;
use App\Models\Post;
use App\Services\PostService;
use Auth;
use Request;

class PostController extends Controller
{

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    protected $postService;

    public function save(PostsRequest $request, PostService $postService)
    {
        $this->postService->create($request);
        event(new PostCreated("Post Created Successfully!!"));
        return redirect()->route('index')->with('success', "Post has been created successfully!");

    }
    public function read($slug, PostService $postService)
    {
        // $post = $this->postService->read($slug);
        // $comments = Comment::where('commentable_id',$post->id)->get();
        $post = Post::with('comments')->where('slug', $slug)->first();
        return view('post.show', compact('post'));
    }

    public function manage()
    {
        $id = Auth::user()->id;
        $posts = Post::where('user_id', $id)->orderBy('id', 'desc')->get();

        return view('home.managePosts', compact('posts'));
    }

    public function display($id)
    {
        $post = Post::with('comments')->find($id);
        return view('home.displayPost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->postService->update($request, $id);
        event(new PostUpdated("Post has been modified Successfully!!"));
        return redirect()->back()->with("success", "Post has been modified successfully!");
    }

    public function delete($id)
    {
        $this->postService->delete($id);
    }

}
