<div>
    <div class="form-group mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="input-title" name="post_title" value="{{ old('post_title', $post->post_title) }}" required>
    </div>
    @error('post_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group mb-3">
        <label for="exampleFormControlInput1" class="form-label">Image</label>
        <input type="text" class="form-control" id="input-cover" name="post_image" value="{{ old('post_image', $post->post_image) }}" required>
    </div>
    @error('post_image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

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
