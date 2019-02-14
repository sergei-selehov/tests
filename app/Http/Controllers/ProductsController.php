<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id')->paginate(15);

        return view('products.list', ['products' => $products]);
    }

    public function indexFilters(Request $request)
    {
        $products = Products::orderBy('id');
        if ($request->new)
        {
            $products->where('new', 1);
        }

        if ($request->popular)
        {
            $products->where('popular', 1);
        }
        if ($request->category_id)
        {
            $categoryProducts = DB::table('product_categories')
                ->where('category_id', $request->category_id)
                ->get(['product_id'])
                ->pluck('product_id')->toArray();

            $products->whereIn('id', $categoryProducts);
        }
        $products = $products->paginate(15);

        return view('products.list', ['products' => $products]);
    }

    public function show(int $id)
    {
        $product = Products::find($id);
        $categories = Products::where('id', $product->id)->with('categories')->paginate(15);
        return view('products.show', ['categories' => $categories, 'product' => $product]);
    }

    public function addGet()
    {
        return view('products.add');
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string',
            'article' => 'required|string|max:255',
            'new' => 'required|boolean',
            'popular' => 'required|boolean',
            'description' => 'required|string|max:255',
//            'additional_attributes' => 'required|string|max:255',
        ]);

        $product = new Products;
        $product->status = $request->status;
        $product->name = $request->name;
        $product->article = $request->article;
        $product->new = $request->new;
        $product->popular = $request->popular;

        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $image->move(public_path().'/images/', $name);
        $product->image = $name;

        $product->description = $request->description;
        $product->additional_attributes = $request->additional_attributes;
        $product->save();

        $categoryProdyct = DB::table('product_categories');
        foreach($request->category_id as $caregory){
            $categoryProdyct->insert(
                ['category_id' => $caregory, 'product_id' => $product->id]);
        }

        return redirect('products');
    }

    public function editGet(int $id)
    {
        $product = Products::find($id);

        return view('products.edit', ['product' => $product]);
    }

    public function editPost(int $id, Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
            'name' => 'required|string',
            'article' => 'required|string|max:255',
            'new' => 'required|boolean',
            'popular' => 'required|boolean',
            'description' => 'required|text|max:255',
//            'additional_attributes' => 'required|string|max:255',
        ]);

        $product = Products::find($id);
        $product->status = $request->status;
        $product->name = $request->name;
        $product->article = $request->article;
        $product->new = $request->new;
        $product->popular = $request->popular;

        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $image->move(public_path().'/images/', $name);
        $product->image = $name;

        $product->description = $request->description;
        $product->additional_attributes = $request->additional_attributes;
        $product->save();

        $categoryProdyct = DB::table('product_categories');
        foreach($request->category_id as $caregory){
            if ($categoryProdyct->get()->category_id != $caregory or $categoryProdyct->get()->product_id != $product->id){
                $categoryProdyct->insert(
                    ['category_id' => $caregory, 'product_id' => $product->id]);
            }
        }

        return redirect('products');
    }

    public function delete(int $id)
    {
        DB::table('product_categories')->where('product_id', $id)->delete();
        $product = Products::find($id);
        $product->delete();

        return redirect('products');
    }
}