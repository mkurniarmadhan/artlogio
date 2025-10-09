<?php


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;




uses(RefreshDatabase::class);
beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user); // sudah otomatis login
});


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

    $this->post('/posts', $data)
        ->assertRedirect('/posts');

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





it('hapus semesntara', function () {


    $post = Post::factory()->create();

    $this->delete("/posts/{$post->id}")
        ->assertRedirect('/posts');

    $this->assertSoftDeleted('posts', ['id' => $post->id]);
});



it('kembali data yang di hapus', function () {
    $post = Post::factory()->create();
    $post->delete();

    $this->post("/posts/{$post->id}/restore")
        ->assertRedirect('/posts');

    $this->assertDatabaseHas('posts', ['id' => $post->id, 'deleted_at' => null]);

});


it('hapus data permanen', function () {
    $post = Post::factory()->create();
    $post->delete();

    $this->delete("/posts/{$post->id}/force-delete")
        ->assertRedirect('/posts');

    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});
