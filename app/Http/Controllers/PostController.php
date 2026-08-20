<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->orderBy('id', 'desc')->get();

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $tags = Tag::orderBy('id', 'desc')->get();

        return view('post.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use($data) {
            $thumbnail_path = null;

            if (! empty($data['thumbnail'])) {
                $thumbnail_path = $data['thumbnail']->store('posts', 'public');
            }
            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'] ?? null,
                'thumbnail' => $thumbnail_path,
                'category_id' => $data['category_id'],
            ]);

            if (! empty($data['tag_ids'])) {
                $post->tags()->attach($data['tag_ids']);
            }
        });

        return redirect()->route('post.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load(['category', 'tags']);
        $categories = Category::orderBy('id', 'desc')->get();
        $tags = Tag::orderBy('id', 'desc')->get();

        return view('post.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $post) {
            $thumbnail_path = $post->thumbnail;

            if (! empty($data['thumbnail'])) {
                if ($post->thumbnail) {
                    Storage::disk('public')->delete($post->thumbnail);
                }
                $thumbnail_path = $data['thumbnail']->store('posts', 'public');
            }

            $post->update([
                'title' => $data['title'],
                'content' => $data['content'] ?? null,
                'thumbnail' => $thumbnail_path,
                'category_id' => $data['category_id']
            ]);

            $post->tags()->sync($data['tag_ids'] ?? []);
        });


        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
