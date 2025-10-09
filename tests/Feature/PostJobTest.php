<?php

use App\Models\Post;
use App\Jobs\UpdatePostStatusJob;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('jalankan queue unutk post yang tidak aktif', function () {

    Queue::fake();
    Post::factory()->count(10)->create(['is_active' => false]);
    Post::factory(4)->create(['is_active' => true]);

    Artisan::call('post:publish');
    Queue::assertPushed(UpdatePostStatusJob::class, 10);


});

it('update post lewat job', function () {
    $post = Post::factory()->create([
        'is_active' => false,
        'published_at' => null,
    ]);

    dispatch_sync(new UpdatePostStatusJob($post));

    $post->refresh();

    expect($post->is_active)->toBeTrue()
        ->and($post->published_at)->not()->toBeNull();
});

it('cek pesan post yang tidak di queue', function () {
    Post::factory()->create(['is_active' => true]);
    Artisan::call('post:publish');

    expect(Artisan::output())->toContain('No unpublished posts found.');
});