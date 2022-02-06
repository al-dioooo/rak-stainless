<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faq = FAQ::all();

        $data = [
            'faq' => $faq
        ];

        return view('admin.faq.index', $data);
    }

    public function add()
    {
        return view('admin.faq.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = new FAQ();

        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();

        return redirect()->route('admin.faq.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = FAQ::findOrFail($request->id);

        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();

        return redirect()->route('admin.faq.index');
    }

    public function edit(Request $request)
    {
        $faq = FAQ::findOrFail($request->id);

        $data = [
            'faq' => $faq
        ];

        return view('admin.faq.edit', $data);
    }

    public function delete(Request $request)
    {
        FAQ::destroy($request->id);

        return redirect()->route('admin.faq.index');
    }
}
