@extends('layouts.index')

@section('main')
<div class="container">
    <div class="card">
        @include('layouts.errorsandsuccess')
        <h2 class="form-header">Create New Post</h2>
        <p class="form-subheader">Fill in the form below to create a new post</p>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="form-group">
                <label for="title" >Title</label>
                <input type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}">
            </div>

            <!-- Body -->
            <div class="form-group">
                <label for="body" >Body</label>
                <textarea 
                id="editor" name="body"
                rows="6" required>{{ old('body') }}</textarea>

            </div>

            <!-- Slug -->
            <div class="form-group">
                <label for="slug" >Slug</label>
                <input type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug') }}">
            </div>

            <!-- Image -->
            <div class="form-group">
                <label for="img" >Image</label>
                <input type="file"
                    id="img"
                    name="img"
                    value="{{ old('img') }}">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status" >Status</label>
                <select id="status"
                        name="status"  value="{{ old('status') }}">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category_id" >Category</label>
                <select id="category_id"
                        name="category_id"
                        value="{{ old('category_id') }}"
                        required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tags -->
            <div class="mb-6">
                <label for="tags" >Tags</label>
                <select id="tags"
                        name="tags[]"
                        multiple
                        value="{{ old('tags') }}">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                 </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary btn-big"> Create Post
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/fnt7rf3m280szqykscgc5k1ehrsrk6q9ma7jlftro65sx5ty/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#editor',
        plugins: 'lists link image code',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        height: 400,
        setup: (editor) => {
            // Ensure the underlying <textarea> is updated on every form submit
            editor.on('change', () => editor.save());      // keeps <textarea> fresh while typing
        }
    });
});
</script>
@endsection