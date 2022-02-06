<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $cart = DB::table('cart')
            ->join('users', 'users.id', '=', 'cart.user_id')
            ->join('product', 'product.id', '=', 'cart.product_id')
            ->select('users.name as user', 'product.name as product', 'product.pict', 'product.price', 'product.discount', 'product.weight', 'product.stock', 'cart.*')
            ->where('cart.user_id', $userId)
            ->latest()
            ->get();

        $cartCount = $cart->count();

        $address = DB::table('address')->where('user_id', $userId)->count();

        $data = [
            'cart' => $cart,
            'count' => $cartCount,
            'address' => $address,
            'subtotal' => 0,
            'subtotalW' => 0,
        ];

        return view('user.cart.index', $data);
    }

    public function save(Request $request)
    {
        $findProduct = Product::findOrFail($request->product);
        $max = $findProduct->stock;

        $request->validate([
            'user' => 'required|numeric',
            'quantity' => 'required|numeric|max:{$max}',
            'product' => 'required|numeric'
        ]);

        $findCart = Cart::where('product_id', $request->product)->where('user_id', $request->user)->first();

        if ($findCart == null) {
            Cart::create([
                'user_id' => $request->user,
                'product_id' => $request->product,
                'quantity' => $request->quantity
            ]);
        } else {
            $findCart->quantity += $request->quantity;
            $findCart->save();
        }

        return redirect()->route('user.cart.index');
    }

    public function update(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json();
    }

    public function delete($id)
    {
        Cart::destroy($id);

        return redirect()->route('user.cart.index');
    }
}
