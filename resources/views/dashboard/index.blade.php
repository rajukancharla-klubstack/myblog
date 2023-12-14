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
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text">Author: {{ $post->user->name }}</p>
            <!-- Add more post details here -->

            {{-- Add buttons or forms for interaction (e.g., comments) --}}
        </div>
    </div>
    @empty
    <p>No posts found.</p>
    @endforelse
</div>
@endsection