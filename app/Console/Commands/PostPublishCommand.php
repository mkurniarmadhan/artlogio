<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use App\Jobs\UpdatePostStatusJob;

class PostPublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish post dari jobs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::where('is_active', false)->get();

        if ($posts->isEmpty()) {
            $this->info('Tidak ada post');
        }

        foreach ($posts as $post) {
            UpdatePostStatusJob::dispatch($post);
        }

        $count = $posts->count();
        $this->info("{$count} posts  successfully update.");

    }
}
