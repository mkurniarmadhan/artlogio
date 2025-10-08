<?php


use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;




uses(RefreshDatabase::class);

it('lihat semua post', function () {
    Post::factory()->count(3)->create();
    $this->get('/posts')
        ->assertStatus(200)
        ->assertSeeText(Post::first()->title);
});

it('Lihat Singel post ', function () {

    $post = Post::factory()->create();
    $this->get("/posts/{$post->id}")
        ->assertStatus(200)
        ->assertSeeText($post->title);
});
it('Buat post baru', function () {
    $data = [
        'title' => 'Buat post',
        'content' => 'Buat Post',
        'is_active' => true,
    ];

    $this->post('/posts', $data);

    $this->assertDatabaseHas('posts', ['title' => 'Buat post']);
});

it('validasi', function () {
    $this->post('/posts', [
        'title'
    ])
        ->assertSessionHasErrors(['title']);
});

it('Ubah post', function () {
    $post = Post::factory()->create();

    $this->put("/posts/{$post->id}", [
        'title' => 'Test',
    ])
    ;
    $this->assertDatabaseHas('posts', ['title' => $post->title]);
});

it('Hapus post', function () {
    $post = Post::factory()->create();

    $this->delete("/posts/{$post->id}")
    ;
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});