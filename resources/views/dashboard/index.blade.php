@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    @auth
    <p>Welcome, {{ Auth::user()->name }}!</p>
    @endauth

    <h2>All Posts</h2>

    @forelse($posts as $post)
    <div class="card mb-3">
        <img src="{{ $post->image }}" class="card-img-top" alt="Post Image">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text">Author: {{ $post->user->name }}</p>

            {{-- Add buttons or forms for interaction (e.g., comments and likes) --}}
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form method="post" action="{{ route('likes.store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-success">Like</button>
                    </form>
                </div>
            </div>

            {{-- Display comments --}}
            <h4>Comments</h4>
            @forelse($post->comments as $comment)
            <p>{{ $comment->content }} - {{ $comment->user->name }}</p>
            @empty
            <p>No comments yet.</p>
            @endforelse
        </div>
    </div>
    @empty
    <p>No posts found.</p>
    @endforelse
</div>
@endsection