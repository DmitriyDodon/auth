@extends('layout')

@section('content')


    @foreach($request->session()->pull('status') ?? [] as $message)
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endforeach

    @forelse($tags as $tag)
    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>{{ $tag->title }}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Slug</h5>
                <p class="card-text">{{ $tag->slug }}</p>
                <h5 class="card-title">Posts</h5>
                <p class="card-text">{{ $tag->posts->implode('title', ' ')}}</p>
                <br>
                <a href="/tag/{{ $tag->id }}/delete" class="btn btn-primary">Delete this tag.</a>
                <a href="/tag/{{ $tag->id }}/edit" class="btn btn-primary">Edit this tag.</a>
            </div>
        </div>
    </div>


    @empty
        <div class="danger alert-success" role="alert">
            There is no tags.
        </div>
    @endforelse

    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>Create new tag</h2>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="/tag/create">Create new tag</a>
            </div>
        </div>
    </div>

    <div class="py-5">
        @include('pagination' , $tags);
    </div>
@endsection


