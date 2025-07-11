@extends('layouts.index')

@section('main')
 
    <form method="POST" action="{{ route('categories.update' , $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
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
            <textarea id="body" 
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

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                   > Create Post
            </button>
        </div>
    </form>
</div>
@endsection