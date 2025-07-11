@extends('layouts.index')


@section('main')  
<div class="btn-right">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
</div> 
        <div class="posts-grid">
            @foreach ($posts as $post)
                <div class="post-container">
                    <a class="title" href="{{  route('posts.show', $post->slug)  }}"> {{ $post->title }}</a> 
                    <p class="desc" > {!! $post->body !!} </p>
                    @if($post->img)
                    <img src="{{ asset('storage/' .  $post->img) }}" alt=""> 
                    @endif
                    <a  href="{{  route('posts.edit', $post->id)  }}" class="btn btn-primary btn-right">Edit</a> 
                </div> 
            @endforeach
        </div> 
{{-- <div class="pagination">
    {{ $posts->links() }}
</div> --}}
@endsection



@section('footer')
@endsection
