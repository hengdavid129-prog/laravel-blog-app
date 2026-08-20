<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::orderBy('id', 'desc')->get();
        return view('tag.index', [
            'tags' => $tags
        ]);
    }

    public function create() {
        return view('tag.create');
    }

    public function store(TagRequest $request) {
        $data = $request->validated();
        Tag::create($data);

        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag) {
        return view('tag.edit', [
            'tag' => $tag
        ]);
    }

    public function update(TagRequest $request, Tag $tag) {
        $data = $request->validated();
        $tag->update($data);

        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
