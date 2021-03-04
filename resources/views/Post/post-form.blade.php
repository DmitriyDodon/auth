@extends('layout')

@section('content')
    <form method="POST">
        @csrf

        @if($errors->has('title'))
            @foreach($errors->get('title') as $title)
                <div class="alert alert-danger  py-3" role="alert">
                    {{ $title }}
                </div>
            @endforeach
        @endif

        <div class="form-group py-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control  py-3" value="{{ old('title') ?? $post->title ?? ''}}" id="title" placeholder="Enter title">
        </div>

        @if($errors->has('category_id'))
            @foreach($errors->get('category_id') as $category_id)
                <div class="alert alert-danger py-3" role="alert">
                    {{ $category_id }}
                </div>
            @endforeach
        @endif

        <div class="form-group py-3">
            <label for="exampleFormControlSelect1">Select category</label>
            <select class="form-control py-3" name="category_id" id="exampleFormControlSelect1">
                @foreach($categories as $category)
                    <option @if(old('category_id') == $category->id ?? $post->category->id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        @if($errors->has('tags'))
            @foreach($errors->get('tags') as $tag)
                <div class="alert alert-danger py-3" role="alert">
                    {{ $tag }}
                </div>
            @endforeach
        @endif

        <div class="form-group py-3">
            <label for="exampleFormControlSelect1">Select tags</label>
            <select class="form-control py-3" name="tags[]" id="exampleFormControlSelect1" multiple>
                @foreach($tags as $tag)
                    <option  @if(in_array($tag->id , old('tags' , $post->tags->pluck('id')->toArray() ?? []) ?? [])) selected @endif  value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>


        @if($errors->has('body'))
            @foreach($errors->get('body') as $body)
                <div class="alert alert-danger  py-3" role="alert">
                    {{ $body }}
                </div>
            @endforeach
        @endif


        <div class="form-group py-3">
            <label for="exampleFormControlTextarea1">Body</label>
            <textarea class="form-control py-3" name="body" id="exampleFormControlTextarea1" rows="3">{{ old('body') ?? $post->body ?? ''}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary  py-3">Submit</button>
    </form>


@endsection
