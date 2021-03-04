<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController
{
    public function show(Request $request)
    {
        $tags = Tag::paginate(5);
        return view('Tag/tag-list', compact('tags', 'request'));
    }


    public function delete(Tag $tag, Request $request)
    {
        $tag->delete();
        $request->session()->push('status', "Tag with title \"" . $tag->title . "\" was deleted.");
        return new RedirectResponse('/tag');
    }

    public function create()
    {
        return view('Tag/tag-form');
    }

    public function store(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:tags,title', 'max:255'],
            'slug' => ['required', 'min:5', 'unique:tags,slug', 'max:255']
        ]);

        Tag::create($data);
        $request->session()->push('status', "Tag with title " . $data['title'] . "  was created.");
        return new RedirectResponse('/tag');
    }

    public function edit(Tag $tag)
    {
        return view('Tag/tag-form' , compact('tag'));
    }


    public function update(Request $request ,Tag $tag)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', "unique:categories,title,$tag->id", 'max:255'],
            'slug' => ['required', 'min:5', "unique:categories,slug,$tag->id", 'max:255']
        ]);

        $tag->update($data);
        $request->session()->push('status' , 'Tag with title ' . $data['title'] . " was updated.");
        return new RedirectResponse('/tag');
    }




}
