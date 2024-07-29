<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $questions = Question::published()->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.faq', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required'
        ]);

        Question::create($request->all());

        $request->session()->flash('question_success', __('utils.question_processing'));

        return redirect()->back();
    }
}
