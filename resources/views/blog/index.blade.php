@extends('layouts.index')


@section('main')   
<div class="right">
    <form action="{{ route('blog.search') }}" method="post">
        @csrf
        <input type="text" name="search" value="{{ old('search', $search ?? '') }}" placeholder="Search...">
        <button class="btn btn-action" type="submit">Search</button>
    </form>
</div>
    <div class="posts-grid">
        
    @foreach ($posts as $post)
        <div class="post-container">
             <a class="title" href="{{  route('blog.show', $post->slug)  }}"> {{ $post->title }}</a> 
            <p class="desc" > {!! $post->body !!} </p>
            @if($post->img)
            <img src="{{ asset('storage/' .  $post->img) }}" alt=""> 
            @endif
        </div> 
    @endforeach
</div>
{{-- <div class="pagination">
    {{ $posts->links() }}
</div> --}}
@endsection



@section('footer')
@endsection
