<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('admin.category.index', ['category' => $category]);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pict' => 'required',
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;

        $file = $request->file('pict');

        $pictGet = $file->getClientOriginalName();
        $pictName = Str::slug($request->name);
        $pictExt = pathinfo($pictGet, PATHINFO_EXTENSION);
        $pict = $pictName . '.' . $pictExt;

        $file->move('image/categories/', $pict);

        $category->pict = $pict;

        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->has('pict')) {
            if (file_exists(public_path('image/categories/' . $category->pict))) {
                unlink(public_path('image/categories/' . $category->pict));
            }

            $file = $request->file('pict');

            $pictGet = $file->getClientOriginalName();
            $pictName = Str::slug($request->name);
            $pictExt = pathinfo($pictGet, PATHINFO_EXTENSION);
            $pict = $pictName . '.' . $pictExt;

            $file->move('image/categories/', $pict);

            $category->pict = $pict;
        }

        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function edit(Request $request)
    {
        $category = Category::findOrFail($request->id);

        return view('admin.category.edit', ['category' => $category]);
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);

        if (file_exists(public_path('image/categories/' . $category->pict))) {
            unlink(public_path('image/categories/' . $category->pict));
        }
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
