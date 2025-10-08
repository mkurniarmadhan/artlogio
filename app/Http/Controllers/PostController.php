<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index(Request $request)
    {
        $posts = Post::all();

        return $posts;
    }

    public function create()
    {

        return 'create';

    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());
    }

    public function show(Post $post)
    {

        return $post;

    }

    public function edit(Post $post)
    {

        return $post;

    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

    }


    public function destroy(Post $post)
    {
        $post->delete();
    }
}
