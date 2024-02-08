<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class AddPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Post';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->info("Create Post command");
        $post = Post::factory()->create();
        if ($post) {
            $this->info("New Post $post->title created successfully!");
        }
        else{
            $this->error("Error: New Post has encoutered an error!");
        }
    }
}
