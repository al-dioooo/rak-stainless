<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class ProductController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Product List');
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.index'));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.index'));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $product = Product::orderBy('created_at', 'DESC')->paginate(20);
        return view('user.product.index', ['product' => $product]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $id = $category->id;
        $product = Product::where('category_id', $id)->paginate(20);

        SEOTools::setTitle($category->name);
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.product.category', ['slug' => $category->slug]));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.product.category', ['slug' => $category->slug]));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $data = [
            'product' => $product,
            'category' => $category
        ];

        return view('user.product.category', $data);
    }

    public function best()
    {
        SEOTools::setTitle('Best Seller');
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.product.best'));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.product.best'));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $best = Product::where('is_best', 1)->orderBy('created_at', 'DESC')->paginate(20);

        $data = [
            'product' => $best
        ];

        return view('user.product.best', $data);
    }

    public function promo()
    {
        $promo = Product::where('is_promo', 1)->orderBy('created_at', 'DESC')->paginate(20);

        $data = [
            'product' => $promo
        ];

        return view('user.product.promo', $data);
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(5)->get();

        SEOTools::setTitle($product->name);
        SEOTools::setDescription($product->meta_desc);
        SEOTools::opengraph()->setUrl(route('user.product.detail', ['slug' => $product->slug]));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.product.detail', ['slug' => $product->slug]));
        SEOTools::jsonLd()->addImage(asset('img') . '/' . $product->pict);
        SEOMeta::addKeyword([$product->key]);

        $data = [
            'product' => $product,
            'related' => $related
        ];

        return view('user.product.detail', $data);
    }

    public function search(Request $request)
    {
        $product = Product::whereLike(['name', 'description', 'category.name'], $request->q)->paginate(20);
        $total = $product->count();

        SEOTools::setTitle('Search result' . ($total > 1 ? 's' : '') . ' for ' . $request->q);
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.product.search'));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.product.search'));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $data = [
            'product' => $product,
            'query' => $request->q,
            'total' => $total
        ];

        return view('user.product.search', $data);
    }
}
