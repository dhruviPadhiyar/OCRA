<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\Models\Ebook;
use App\Models\Post;
use App\Services\NotificationService;
use App\Services\PostService;
use App\Services\UserService;
use Artisan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\Attributes\TestWithJson;
use Storage;

class HomeController extends Controller
{
    protected $postService;
    protected $notificationService;

    public function __construct(UserService $userService, PostService $postService, NotificationService $notificationService)   {
        $this->userService = $userService;   
        $this->postService = $postService;
        $this->notificationService = $notificationService;
    }

    public function index(){
        TestJob::dispatch();
        // $posts = $this->postService->index(); // service

        $posts = Post::allPosts()->get();   // using query scope
        return view('home.index', compact('posts'));
    }

    public function post(){
        // $category = 
        return view('post.create');
    }    
    
    public function dashboard(){
        $id = Auth::user()->id;
        // dd($id);
        // $posts = Post::where('user_id',$id)->get()->sortByDesc('id')->paginate(6);
        $posts = Post::where('user_id',$id)->orderBy('id','desc')->get();
        $ebooks = Ebook::where('author_id',$id)->orderBy('id','desc')->get();
        return view('home.userDashboard',compact('posts','ebooks'));
    } 

    public function testpage(){
        return view('home.testpage');
    }

    public function emailArtisan(Request $request){
        $user = $request->user;
        Artisan::call('mail:send', [
            'user' => $user
        ]);
        return redirect()->back()->with('success',"Email has been sent to the $user successfully!");
    }

    public function testNotification(){
        $post = Post::find(12);
        $subject = "testing";

        $n = App::make(NotificationService::class);
        // dd($n);
        $n->create($post,$subject);
        return redirect()->back()->with('success','notication added!');

    }
}
