<div>
    <div class="form-group mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="input-title" name="post_title"
            value="{{ old('post_title', $post->post_title) }}" required>
    </div>
    @error('post_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group mb-3">
        <label for="exampleFormControlInput1" class="form-label">Image</label>
        <input type="text" class="form-control" id="input-cover" name="post_image"
            value="{{ old('post_image', $post->post_image) }}" required>
    </div>
    @error('post_image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-check-inline mt-4 mb-5">
        <label for="exampleFormControlInput1" class="form-label m-0">Tags:</label>
        <div class="m-4">
            @foreach ($tags as $tag)
                @if ($errors->any())
                    <input class="form-check-input m-0" type="checkbox" name="tags[]" id="input-tags"
                        value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                @else
                    <input class="form-check-input m-0" type="checkbox" name="tags[]" id="input-tags"
                        value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                @endif
                <label class="form-check-label mx-2" for="input-tags">{{ $tag->name }}</label>
            @endforeach
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea class="form-control" id="input-description" rows="3" name="post_content">{{ old('ost_content', $post->post_content) }}</textarea>
    </div>
    @error('post_content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Save your post</button>
    </div>
</div>
