<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = DB::table('order')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->select('order.*', 'status.name as status', 'users.name as user')
            ->get();

        return view('admin.order.index', ['order' => $order]);
    }

    public function detail($id)
    {
        $validation = Order::findOrFail($id);

        $orderDetail = DB::table('detail')
            ->join('product', 'product.id', '=', 'detail.product_id')
            ->join('order', 'order.id', '=', 'detail.order_id',)
            ->select('product.name as product', 'product.pict', 'product.price', 'product.discount', 'detail.*', 'order.*')
            ->where('order.id', $id)
            ->get();

        $order = DB::table('order')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->select('order.*', 'users.name as user', 'status.name as status')
            ->where('order.id', $id)
            ->first();

        $data = [
            'detail' => $orderDetail,
            'order' => $order
        ];

        return view('admin.order.detail', $data);
    }

    public function confirm($id)
    {
        $order = Order::findOrFail($id);
        $order->status_id = 3;
        $order->save();

        $stock = DB::table('detail')->where('order_id',$id)->get();
        foreach($stock as $row){
            $product = DB::table('product')->where('id',$row->product_id)->first();
            $newStock = $product->stock - $row->quantity;

            Product::where('id', $row->product_id)->update([
                'stock' => $newStock
            ]);
        }
        return redirect()->back();
    }

    public function receipt(Request $request)
    {
        $order = Order::findOrFail($request->id);

        $order->receipt = $request->receipt;
        $order->status_id = 4;

        $order->save();

        return redirect()->back();
    }

    public function delete(Request $request) {
        Order::destroy($request->id);
        Detail::where('order_id', $request->id)->delete();

        return redirect()->back();
    }
}
