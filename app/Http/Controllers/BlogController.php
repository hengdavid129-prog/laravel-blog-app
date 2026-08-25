<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request) {
        $posts = Post::with('category', 'tags')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category_id', $request->query('category'));
            })
            ->orderBy('id', 'desc')->get();

        $activeCategory = $request->filled('category')
            ? Category::find($request->query('category'))
            : null;

        $tags = Tag::orderBy('id', 'desc')->get();


        return view('blog.index', [
            'posts' => $posts,
            'activeCategory' => $activeCategory,
            'tags' =>$tags
        ]);
    }

    public function show(Post $post) {
        $post->load(['category', 'tags']);
        return view('blog.detail', [
            'post' => $post
        ]);
    }
}
