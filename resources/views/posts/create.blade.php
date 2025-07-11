@extends('layouts.index')

@section('main')
<div class="container">
    <div class="card"> 
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
                <textarea id="editor" 
                        name="body" 
                        rows="6"
                        value="{{ old('body') }}"
                        required></textarea>
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
                <p class="text-sm text-gray-600 mt-1">Hold Ctrl/Cmd to select multiple tags</p>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" 
                    > Create Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection