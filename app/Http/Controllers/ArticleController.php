<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::published();
        if ($query):
            $posts->where('title', 'like', '%' . $query . '%');
        endif;

        $posts = $posts->latest()->paginate(14);
        $latestPost = Post::published()->latest('published_at')->limit(5)->get();

        return view('article.index', compact('posts', 'latestPost', 'query'));
    }
    public function show(Post $post)
    {

        return view('article.show', compact('post'));

    }

}
