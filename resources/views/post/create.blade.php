<x-layout.master>
    <x-form title="Create Post" backRoute="post.index" action="post.store" :hasFile="true">

        <x-form.field label="Title" name="title" />
        <x-form.field label="Content" name="content" type="textarea" />
        <x-form.field label="Choose Thumbnail" name="thumbnail" type="file" />

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category" aria-label="category select">
                <option value="" disabled selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <x-form.error name="category_id" />
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tag</label>
            <div class="tag-wrapper">
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="checkbox" name="tag_ids[]"
                            value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}"
                            {{ in_array($tag->id, old('tag_ids', [])) ? 'checked' : '' }}
                            >
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
            <x-form.error name="tag_ids" />
        </div>
    </x-form>
</x-layout.master>
