<?php

namespace App\Jobs;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class UpdatePostStatusJob implements ShouldQueue
{
    use Queueable;
    protected Post $post;

    public $backoff = 3;
    public $tries = 3;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function handle(): void
    {
        $this->post->update([
            'is_active' => true,
            'published_at' => Carbon::now(),
        ]);

        Log::info("Berhasil publish ID :{$this->post->id}");
    }

    public function failed(\Throwable $exception): void
    {

        Log::channel('post_jobs')->error('Gagal publish job ID: ' . $this->post->id, [
            'error' => $exception->getMessage(),
        ]);

    }
}
