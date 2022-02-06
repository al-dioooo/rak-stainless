<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        // $user = DB::table('users')
        // ->join('address', 'address.user_id', '=', 'users.id')
        // ->join('city', 'city.city_id', '=', 'address.city_id')
        // ->join('province', 'province.id', '=', 'city.province_id')
        // ->select('users.*', 'address.address', 'city.name as city', 'province.name as province')
        // ->get();

        $user = User::with('address')->get();

        return view('admin.user.index', ['user' => $user]);
    }
}
