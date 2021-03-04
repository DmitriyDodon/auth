@extends('layout')

@section('content')


    @foreach($request->session()->pull('status') ?? [] as $message)
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endforeach

    @forelse($categories as $category)
    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>{{ $category->title }}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Slug</h5>
                <p class="card-text">{{ $category->slug}}</p>
                <h5 class="card-title">Posts</h5>
                <p class="card-text">{{ $category->posts->implode('title', ' ')}}</p>
                <br>
                <a href="category/{{ $category->id }}/delete" class="btn btn-primary">Delete this category</a>
                <a href="category/{{ $category->id }}/edit" class="btn btn-primary">Edit this category</a>
            </div>
        </div>
    </div>


    @empty
        <div class="danger alert-success" role="alert">
            There is no categories.
        </div>
    @endforelse

    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>Create new category</h2>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="/category/create">Create new category</a>
            </div>
        </div>
    </div>

    <div class="py-5">
        @include('pagination' , $categories);
    </div>
@endsection


