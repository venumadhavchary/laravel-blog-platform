@extends('layouts.index')

@section('main')
 
    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Title -->
        <div class="form-group">
            <label for="name" >Category Name</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                value="{{ old('name') }}">
        </div>

        <!-- Body -->
        <div class="form-group">
            <label for="description" >Description</label>
            <textarea id="description" 
                      name="description" 
                      rows="6"
                       value="{{ old('description') }}"
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
            <label for="image" >Image</label>
            <input type="file" 
                   id="image" 
                   name="image" 
                   value="{{ old('image') }}">
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="is_active" >Status</label>
            <select id="is_active" 
                    name="is_active"  value="{{ old('is_active') }}">
                <option value="1">Acrive</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                   > Create Category
            </button>
        </div>
    </form>
</div>
@endsection