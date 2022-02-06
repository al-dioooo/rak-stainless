<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $address = DB::table('address')->where('address.user_id', $user->id)
            ->first();
        $order = DB::table('order')
            ->join('status', 'status.id', '=', 'order.status_id')
            ->select('order.*', 'status.name as status')
            ->where('order.user_id', $user->id)
            ->get();

        $data = [
            'user' => $user,
            'address' => $address,
            'order' => $order
        ];

        return view('user.profile.index', $data);
    }
}
