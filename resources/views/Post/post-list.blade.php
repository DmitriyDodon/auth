@extends('layout')

@section('content')


    @foreach($request->session()->pull('status') ?? [] as $message)
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endforeach

    @forelse($posts as $post)
    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Tags</h5>
                <p class="card-text">{{ $post->tags->implode('title', ' ')}}</p>
                <h5 class="card-title">User</h5>
                <p class="card-text">{{ $post->user->name ?? '' }}</p>
                <h5 class="card-title">Category</h5>
                <p class="card-text">{{ $post->category->title ?? '' }}</p>
                <h5 class="card-title">Body</h5>
                <p class="card-text">{{ $post->body ?? '' }}</p>
                <br>
                <a href="/post/{{ $post->id }}/delete" class="btn btn-primary">Delete this post</a>
                <a href="/post/{{ $post->id }}/edit" class="btn btn-primary">Edit this post</a>
            </div>
        </div>
    </div>


    @empty
        <div class="danger alert-success" role="alert">
            There is no posts.
        </div>
    @endforelse

    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>Create new post</h2>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="/post/create">Create new post</a>
            </div>
        </div>
    </div>

    <div class="py-5">
        @include('pagination' , $posts);
    </div>
@endsection


