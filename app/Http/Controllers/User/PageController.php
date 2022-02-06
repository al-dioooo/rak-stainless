<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PageController extends Controller
{
    public function index() {

        SEOTools::setTitle('Home');
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.index'));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.index'));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $product = Product::take(10)->orderBy('created_at', 'DESC')->get();
        $promo = Product::where('is_promo', 1)->take(5)->orderBy('created_at', 'DESC')->get();
        $best = Product::where('is_best', 1)->take(5)->orderBy('created_at', 'DESC')->get();
        $featured = Product::where('is_featured', 1)->take(3)->orderBy('created_at', 'DESC')->get();
        $category = Category::take(6)->get();

        $title = Setting::where('key', 'title')->first()->value;
        $subtitle = Setting::where('key', 'subtitle')->first()->value;

        $data = [
            'product' => $product,
            'featured' => $featured,
            'best' => $best,
            'promo' => $promo,
            'category' => $category,
            'index' => 0,
            'title' => $title,
            'subtitle' => $subtitle,
        ];

        return view('index', $data);
    }

    public function contact() {
        SEOTools::setTitle('Contact');
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.contact'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite(route('user.contact'));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $info = Setting::all();

        $data = [
            'info' => $info
        ];

        return view('contact', $data);
    }

    public function faq() {
        SEOTools::setTitle('FAQs');
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.faq'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite(route('user.faq'));
        SEOTools::jsonLd()->addImage(asset('') . Setting::where('key', 'icon')->first()->value);

        $faq = FAQ::all();

        $data = [
            'faq' => $faq
        ];

        return view('faq', $data);
    }
}
