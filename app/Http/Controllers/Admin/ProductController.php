<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();

        return view('admin.product.index', ['product' => $product]);
    }

    public function add()
    {
        $category = Category::all();
        $featured = Product::where('is_featured', true)->count();
        $promo = Product::where('is_promo', true)->count();
        $best = Product::where('is_best', true)->count();

        $data = [
            'category' => $category,
            'featured' => $featured,
            'promo' => $promo,
            'best' => $best
        ];

        return view('admin.product.add', $data);
    }

    public function edit(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $category = Category::all();
        $featured = Product::where('is_featured', true)->count();
        $promo = Product::where('is_promo', true)->count();
        $best = Product::where('is_best', true)->count();

        $data = [
            'product' => $product,
            'category' => $category,
            'featured' => $featured,
            'promo' => $promo,
            'best' => $best
        ];

        return view('admin.product.edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pict' => 'required',
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required',
            'stock' => 'required|integer|min:0',
            'slug' => 'required',
            'key' => 'required',
            'meta_description' => 'required'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->meta_desc = $request->meta_description;
        $product->key = $request->key;
        $product->is_featured = $request->featured;
        $product->is_best = $request->best;
        $product->is_promo = $request->promo;

        $file = $request->file('pict');

        $pictGet = $file->getClientOriginalName();
        $pictName = Str::slug($request->name);
        $pictExt = pathinfo($pictGet, PATHINFO_EXTENSION);
        $pict = $pictName . '.' . $pictExt;

        $file->move('image/products/', $pict);

        $product->pict = $pict;

        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required',
            'stock' => 'required|integer|min:0',
            'slug' => 'required',
            'key' => 'required',
            'meta_description' => 'required'
        ]);

        $product = Product::findOrFail($request->id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->meta_desc = $request->meta_description;
        $product->key = $request->key;
        $product->is_featured = $request->featured;
        $product->is_best = $request->best;
        $product->is_promo = $request->promo;

        if ($request->has('pict')) {
            if (file_exists(public_path('image/products/' . $product->pict))) {
                unlink(public_path('image/products/' . $product->pict));
            }

            $file = $request->file('pict');

            $pictGet = $file->getClientOriginalName();
            $pictName = Str::slug($request->name);
            $pictExt = pathinfo($pictGet, PATHINFO_EXTENSION);
            $pict = $pictName . '.' . $pictExt;

            $file->move('image/products/', $pict);

            $product->pict = $pict;
        }

        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete(Request $request)
    {
        $product = Product::findOrFail($request->id);

        if (file_exists(public_path('image/products/' . $product->pict))) {
            unlink(public_path('image/products/' . $product->pict));
        }
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
