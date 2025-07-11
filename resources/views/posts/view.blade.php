@extends('layouts.index')

@section('main')
    
    <br>
        <ul>
            <li>Title =>  {{ $post->title }}</li>
            <li>Body =>{{ $post->body }}</li>
            @if($post->img)
            <li> <img src="{{ asset('storage/' .  $post->img) }}" alt=""> </li>
            @endif
            <li><a href="{{  route('posts.edit', $post->id)  }}">Edit</a></li>
        </ul>
        <hr> 
@endsection



@section('footer')
@endsection
