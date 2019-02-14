<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('id')->get();
        return view('categories.index', ['categories' => $categories]);
    }

    public function show($slug)
    {
        $categoryProducts = Categories::where('slug', $slug)->with('products')->paginate(15);
        return view('products.index', ['categoryProducts' => $categoryProducts]);
    }

    public function addGet()
    {
       return view('categories.add');
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string',
            'slug' => 'required|string|max:255',
        ]);

        $category = new Categories;
        $category->status = $request->status;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect('categories');
    }

    public function editGet(string $slug)
    {
        $category = Categories::where('slug', $slug)->first();

        return view('categories.edit', ['category' => $category]);
    }

    public function editPost(string $slug, Request $request)
    {
        $category = Categories::where('slug', $slug)->first();
        $category->status = $request->status;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect('categories');
    }

    public function delete(string $slug)
    {
        $category = Categories::where('slug', $slug)->first();
        $category->delete();

        return redirect('categories');
    }
}
