<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\Province;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $info = Setting::all();
        $province = Province::with('city')->get();
        $featured = Product::where('is_featured', true)->get();

        $data = [
            'info' => $info,
            'province' => $province,
            'featured' => $featured
        ];

        return view('admin.settings.index', $data);
    }

    public function update(Request $request)
    {
        if ($request->has('info')) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            Setting::where('key', 'name')->update(['value' => $request->name]);
            Setting::where('key', 'description')->update(['value' => $request->description]);

            if ($request->has('icon')) {
                $storeIcon = Setting::where('key', 'icon')->first();
                if (file_exists($storeIcon->value)) {
                    unlink(public_path($storeIcon->value));
                }

                $file = $request->file('icon');

                $iconGet = $file->getClientOriginalName();
                $iconName = 'icon';
                $iconExt = pathinfo($iconGet, PATHINFO_EXTENSION);
                $icon = $iconName . '.' . $iconExt;

                $file->move(public_path(), $icon);

                $storeIcon->update([
                    'value' => $icon
                ]);
            }

        } elseif ($request->has('banner')) {
            $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
            ]);

            Setting::where("key", 'title')->update(['value' => $request->title]);
            Setting::where("key", 'subtitle')->update(['value' => $request->subtitle]);
        } elseif ($request->has('contactSection')) {

            $request->validate([
                'sales' => 'required',
                'email' => 'required|email',
                'contact' => 'required|numeric',
                'whatsapp' => 'required',
                'instagram' => 'required',
                'youtube' => 'required',
                'city' => 'required|numeric',
                'postal' => 'required|digits:5|numeric',
                'address' => 'required'
            ]);

            Setting::where("key", 'sales')->update(['value' => $request->sales]);
            Setting::where("key", 'email')->update(['value' => $request->email]);
            Setting::where("key", 'contact')->update(['value' => $request->contact]);
            Setting::where("key", 'whatsapp')->update(['value' => $request->whatsapp]);
            Setting::where("key", 'instagram')->update(['value' => $request->instagram]);
            Setting::where("key", 'youtube')->update(['value' => $request->youtube]);
            Setting::where("key", 'city')->update(['value' => $request->city]);
            Setting::where("key", 'address')->update(['value' => $request->address]);
            Setting::where("key", 'postal')->update(['value' => $request->postal]);
        };

        return redirect()->back();
    }
}
