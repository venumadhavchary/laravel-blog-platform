@extends('layouts.index')

@section('main') 
    <hr> 
    <a href="{{ route('categories.create') }}" class="btn btn-create">Create Category</a>
    <hr>
    @foreach ($categories as $category)
    <br>
        <ul>
            <li><a href="{{  route('categories.show', $category->slug)  }}"> {{ $category->name }}</a></li>
            <br>
            <li>{{ $category->description }}</li>
            <li><a href="{{ route('categories.edit', $category->id) }}">Edit</a></li>
        </ul>
        <hr>
    @endforeach
@endsection



@section('footer')
@endsection
