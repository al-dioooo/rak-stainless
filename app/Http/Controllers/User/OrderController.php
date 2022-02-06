<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;

class OrderController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Order List');
        SEOTools::setDescription(Setting::where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(route('user.order.index'));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::twitter()->setSite(route('user.order.index'));
        SEOTools::jsonLd()->addImage(Setting::where('key', 'icon')->first()->value);

        $userId = Auth::user()->id;

        $order = DB::table('order')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->select('order.*', 'status.name as status')
            ->where('order.status_id', 1)
            ->where('order.user_id', $userId)
            ->get();

        $process = DB::table('order')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->select('order.*', 'status.name as status')
            ->where('order.status_id', '!=', 1)
            ->where('order.status_id', '!=', 5)
            ->where('order.status_id', '!=', 6)
            ->where('order.user_id', $userId)
            ->get();

        $history = DB::table('order')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->select('order.*', 'status.name as status')
            ->where('order.status_id', '!=', 1)
            ->where('order.status_id', '!=', 2)
            ->where('order.status_id', '!=', 3)
            ->where('order.status_id', '!=', 4)
            ->where('order.user_id', $userId)
            ->get();

        $checkAll = DB::table('order')->where('user_id', $userId)->count();

        $data = [
            'order' => $order,
            'process' => $process,
            'history' => $history,
            'check' => $checkAll,
        ];

        return view('user.order.index', $data);
    }

    public function detail(Request $request)
    {
        $invoice = $request->invoice;

        $orderDetail = DB::table('detail')
            ->join('product', 'product.id', '=', 'detail.product_id')
            ->join('order', 'order.id', '=', 'detail.order_id',)
            ->select('product.name as product', 'product.pict', 'product.price', 'product.discount', 'detail.*', 'order.*')
            ->where('order.invoice', $invoice)
            ->get();

        $order = DB::table('order')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->select('order.*', 'users.name as user', 'status.name as status')
            ->where('order.invoice', $invoice)
            ->firstOrFail();

        $storeAddress = Setting::where('key', 'address')->first()->value;

        $userAddress = DB::table('address')->where('user_id', Auth::user()->id)->first();

        $data = [
            'detail' => $orderDetail,
            'order' => $order,
            'total' => 0,
            'storeAddress' => $storeAddress,
            'userAddress' => $userAddress
        ];

        return view('user.order.detail', $data);
    }

    public function success()
    {
        $invoice = Cookie::get('invoice');
        $get = Order::where('invoice', $invoice)->select('due_at')->first();
        $date = Carbon::parse($get->due_at)->format('d F Y');
        $hour = Carbon::parse($get->due_at)->format('g.i A');

        $data = [
            'due' => $date . ' at ' . $hour
        ];
        return view('user.success', $data);
    }

    public function proof(Request $request, $id)
    {
        $request->validate([
            'proof' => 'required'
        ]);

        $order = Order::findOrFail($id);

        $file = $request->file('proof');
        $proofGet = $file->getClientOriginalName();
        $proofName = $order->invoice . '-PROOF';
        $proofExtension = pathinfo($proofGet, PATHINFO_EXTENSION);
        $proof = $proofName . '.' . $proofExtension;
        $file->move('image/payment-proofs/', $proof);

        $order->proof = $proof;
        $order->status_id = 2;

        $order->save();

        return redirect()->route('user.order.index');
    }

    public function payment($id)
    {
        $payment = Payment::all();
        $order = Order::findOrFail($id);

        $data = [
            'payment' => $payment,
            'order' => $order
        ];

        return view('user.order.payment', $data);
    }

    public function accept($id)
    {
        $order = Order::findOrFail($id);
        $order->status_id = 5;
        $order->save();

        return redirect()->route('user.order.index');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status_id = 6;
        $order->save();

        return redirect()->route('user.order.index');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|regex:/[\d+-]+$/',
            'address' => 'required',
            'postal' => 'required|digits:5|numeric',
            'province' => 'required',
            'city' => 'required',
            'courier' => 'required',
            'service' => 'required'
        ]);

        $invoice = 'INV' . Date('Ymdhi');
        $checkInvoice = DB::table('order')->where('invoice', $invoice)->count();
        $userId = Auth::user()->id;

        if ($checkInvoice < 1) {
            Order::create([
                'invoice' => $invoice,
                'user_id' => $userId,
                'status_id' => 1,
                'total_price' => $request->total_price,
                'total_weight' => $request->total_weight,
                'shipping' => $request->shipping,
                'courier' => $request->courier,
                'service' => $request->service,
                'contact' => $request->contact,
                'note' => $request->note,
                'due_at' => Carbon::now()->addHours(24)
            ]);
        }

        $getOrderId = DB::table('order')->where('invoice', $invoice)->first();

        $product = DB::table('cart')->where('user_id', $userId)->get();

        foreach ($product as $row) {
            Detail::create([
                'order_id' => $getOrderId->id,
                'product_id' => $row->product_id,
                'quantity' => $row->quantity
            ]);
        }

        DB::table('cart')->where('user_id', $userId)->delete();

        return redirect()->route('user.order.success')->withCookie(cookie('invoice', $invoice, 30));
    }
}
