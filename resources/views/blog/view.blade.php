@extends('layouts.index')

@section('main')
    
    <div class="container">
        <div class="card"> 
                <a  class="btn btn-category" href="{{ route('blog.category', $category->slug) }}" >{{ $category->name }}</a>
            <br>
            <br>
            <div class="post-title">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="post-body">
                {{ $post->body }}</li>
            </div>
                @if($post->img)
                <li> <img src="{{ asset('storage/' .  $post->img) }}" alt=""> </li>
                @endif
                
        </div>
    </div>
@endsection



@section('footer')
@endsection
