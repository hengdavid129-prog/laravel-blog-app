<x-layout.master>
    <x-form title="Edit Post" backRoute="post.index" method="PUT" action="post.update" :param="$post" :hasFile="true">
        <x-form.field label="Title" name="title" :value="$post->title" />
        <x-form.field label="Content" name="content" type="textarea" :value="$post->content" />

        @if ($post->thumbnail)
            <div class="mb-3">
                <label class="form-label">Current Thumbnail</label>
                <div class="w-25 ratio ratio-4x3">
                    <img class="w-100 h-100 object-fit-cover" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                </div>
            </div>
        @endif

        <x-form.field label="Choose New Thambnail" name="thumbnail" type="file" />

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id" aria-label="category select">
                <option value="" disabled selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tag</label>
            <div class="tag-wrapper">
                @php
                    $selectedTags = old('tag_ids', $post->tags->pluck('id')->toArray());
                @endphp
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="tag_ids[]"
                            value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}"
                            {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}
                            >
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </x-form>
</x-layout.master>
