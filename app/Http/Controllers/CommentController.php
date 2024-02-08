<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ebook;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\PostCondition;

class CommentController extends Controller
{
    public function post($id,Request $request){
       
        $content = $request->comment;
        $post = Post::find($id);

        // Assuming 'comments' relationship is defined in your Post model
        $comment = new Comment([
            'content' => $content,
            'userId' => Auth::user()->id,
            'commentable_id' => $post->id
        ]);

        $post->comments()->save($comment);

        return redirect()->back()->with('success','comment added successfully!');

        // dd("ok");
    }

    public function ebook($id,Request $request){
       
        $content = $request->comment;
        $ebook = Ebook::find($id);

        // Assuming 'comments' relationship is defined in your Post model
        $comment = new Comment([
            'content' => $content,
            'userId' => Auth::user()->id,
            'commentable_id' => $ebook->id
        ]);

        $ebook->comments()->save($comment);

        return redirect()->back()->with('success','comment added successfully!');

        // dd("ok");
    }
}
