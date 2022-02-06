<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::with('product')->get();

        $data = [
            'category' => $category
        ];

        return view('user.category.index', $data);
    }
}
