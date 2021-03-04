@extends('layout')

@section('content')
    <form method="post" action="">
        @csrf

        @if($errors->has('title'))
            @foreach($errors->get('title') as $title)
                <div class="alert alert-danger" role="alert">
                    {{ $title }}
                </div>
            @endforeach
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') ?? $category->title ?? ''}}" id="title" placeholder="Enter title">
        </div>

        @if($errors->has('slug'))
            @foreach($errors->get('slug') as $slug)
                <div class="alert alert-danger" role="alert">
                    {{ $slug }}
                </div>
            @endforeach
        @endif

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') ?? $category->slug ?? '' }}" placeholder="Enter slug">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
