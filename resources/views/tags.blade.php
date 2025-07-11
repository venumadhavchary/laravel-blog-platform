@extends('layouts.index')

@section('main')
    <h1>All Posts</h1>
    <hr>
    @foreach ($posts as $post)
    <br>
        <ul>
            <li>Title =><a href="{{  route('posts.show', $post->slug)  }}"> {{ $post->title }}</a></li>
            <li>Body =>{{ $post->body }}</li>
            @if($post->img)
            <li> <img src="{{ asset('storage/' .  $post->img) }}" alt=""> </li>
            @endif
            <li><a href="{{  route('posts.edit', $post->id)  }}">Edit</a></li>
        </ul>
        <hr>
    @endforeach
@endsection



@section('footer')
@endsection
