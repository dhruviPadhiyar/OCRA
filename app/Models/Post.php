<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static $categories = [
        'Food',
        'Travel',
        'Health & Fitness',
        'Lifestyle',
        'Fashion & Beauty',
        'Personal',
        'Craft',
        'Music',
        'News',
        'Movie',
        'Religion',
        'Political',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
 
    public function scopeAllPosts($query){
        //return all posts in descending order of most recent post first.
        return $query->orderBy('created_at','DESC');
    }
}
