<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $cart = DB::table('cart')
            ->join('users', 'users.id', '=', 'cart.user_id')
            ->join('product', 'product.id', '=', 'cart.product_id')
            ->select('users.name as user', 'product.name as product', 'product.weight', 'product.pict', 'product.price', 'product.discount', 'cart.*')
            ->where('cart.user_id', $userId)
            ->get();

        $province = Province::all();
        $courier = Courier::all();

        $userAddress = DB::table('address')->where('address.user_id', $userId)
            ->first();

        $data = [
            'cart' => $cart,
            'totalP' => 0,
            'totalW' => 0,
            'address' => $userAddress,
            'user_id' => $userId,
            'province' => $province,
            'courier' => $courier,
            'tax' => 10
        ];

        // return response()->json($cost);

        return view('user.checkout.index', $data);
    }
}
