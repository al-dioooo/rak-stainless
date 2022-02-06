<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $income = DB::table('order')
            ->select(DB::raw('SUM(total_price) as income'))
            ->where('status_id', 5)
            ->first();
        $order = DB::table('order')
            ->select(DB::raw('COUNT(id) as total'))
            ->first();
        $customer = DB::table('users')
            ->select(DB::raw('COUNT(id) as total'))
            ->where('role', '=', 'customer')
            ->first();
        $newestOrder = DB::table('order')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->select('order.*', 'status.name as status', 'users.name as user')
            ->limit(5)
            ->orderBy('created_at', 'DESC')
            ->get();
        $data = [
            'income' => $income,
            'order'  => $order,
            'customer'  => $customer,
            'newOrder' => $newestOrder,
        ];

        return view('admin.dashboard', $data);
    }
}
