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
        $query = $request->input('q');

        $status = $request->input('status');

        $posts = Post::query();
        if ($query):
            $posts->where('title', 'like', '%' . $query . '%');
        endif;

        switch ($status) {
            case 'draft':
                $posts->where('is_active', 0);
                break;
            case 'publish':
                $posts->where('is_active', 1);
                break;
            case 'sampah':
                $posts->onlyTrashed();
                break;
            case 'all':
                $posts->withTrashed();
                break;
            default:
                $posts->withTrashed();
                break;
        }

        $posts = $posts->latest()->paginate(5);

        return view('cms.posts.index', compact('posts', 'query', 'status'));
    }

    public function create()
    {

        return view('cms.posts.create');

    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());

        return to_route('posts.index');
    }

    public function show(Post $post)
    {

        return $post;

    }

    public function edit(Post $post)
    {


        return view('cms.posts.edit', compact('post'));

    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('posts.index');

    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }


    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('posts.index');
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect()->route('posts.index');
    }
}
