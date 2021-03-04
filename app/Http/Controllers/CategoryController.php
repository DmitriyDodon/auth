<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController
{
    public function show(Request $request)
    {
        $categories = Category::paginate(5);
        $users = User::all();

        return view('Category/category-list', compact('categories', 'request' , 'users'));
    }


    public function delete(Category $category, Request $request)
    {
        $category->delete();
        $request->session()->push('status', "Category with title \"" . $category->title . "\" was deleted.");
        return new RedirectResponse('/category');
    }

    public function create()
    {
        return view('Category/category-form');
    }

    public function store(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:categories,title', 'max:255'],
            'slug' => ['required', 'min:5', 'unique:categories,slug', 'max:255']
        ]);

        Category::create($data);
        $request->session()->push('status', "Category with title " . $data['title'] . "  was created.");
        return new RedirectResponse('/category');
    }

    public function edit(Category $category)
    {
        return view('Category/category-form' , compact('category'));
    }


    public function update(Request $request ,Category $category)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', "unique:categories,title,$category->id", 'max:255'],
            'slug' => ['required', 'min:5', "unique:categories,slug,$category->id", 'max:255']
        ]);

        $category->update($data);
        $request->session()->push('status' , 'Category with title ' . $data['title'] . " was updated.");
        return new RedirectResponse('/category');
    }




}
