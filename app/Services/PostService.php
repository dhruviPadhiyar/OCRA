<?php

namespace App\Services;

use App\Http\Requests\PostsRequest;
use App\Models\Notification;
use App\Models\Post;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Request;

class PostService 
{
    public function __construct(NotificationService $notificationService){
        $this->notificationService  = $notificationService;
    }
    protected $notificationService;
    public function create(PostsRequest $request)
    {
        $userId = Auth::id();

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->user_id = $userId;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category = $request->category;

        if ($image = $request->file('thumbnail')) {
            Storage::disk('dropbox')->put('posts', $request->file('thumbnail'));
            $fileOriginalName = $request->file('thumbnail')->getClientOriginalExtension();
            $image = time() . $fileOriginalName;
            $request->thumbnail->move(public_path('images'), $image);
            $post->thumbnail = $image;

        } else {
            $post->thumbnail = "no-thumbnail";
        }
        $save = $post->save();
        if($save){
            $subject = "created";
            $notification  =App::make(NotificationService::class);
            $notification->create($post,$subject);
            // $this->notificationService->create($post,$subject);
        }
    }
    public function index()
    {

        Post::allPosts()->get();
    }
    public function read($slug)
    {
        $post = post::where('slug', $slug)->first();
        return $post;
    }
    public function update(Request $request, $id)
    {
       
        $post = Post::findOrFail($id);

        $post->title = request()->title;
        $post->excerpt = request()->newExcerpt;
        $post->body = request()->newBody;
        $post->category = request()->newCategory;

        if (request()->hasFile('newThumbnail')) {
            Storage::delete('/public/image/' . $post->thumbnail);
            $name = time() . '-' . request()->file('newThumbnail')
                ->getClientOriginalName();
            request()->newThumbnail->move(public_path('images'), $name);
            $post->thumbnail = $name;
            Storage::disk('dropbox')->put('posts', request()->file('newThumbnail'));
        }
        $save = $post->save();
        if($save){
            $subject = "updated";
            $notification = App::make(NotificationService::class);
            $notification->create($post,$subject); // after ->using bind method
            // $this->notificationService->create($post,$subject); //before
            // dd("ok");
        }   
        return redirect()->back()->with('success', 'Post has been updated!');
    }
    public function delete($id)
    {
        // dd(Post::find($id));
        $post = Post::findOrFail($id);
        Storage::delete('/public/thumbnail/' . $post->thumbnail);
        Storage::disk('dropbox')->delete('posts/' . $post->thumbnail);
        $post->delete();
        return redirect()->back()->with('error', 'Post has been deeted!');
    }
}
