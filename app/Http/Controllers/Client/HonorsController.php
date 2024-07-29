<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Honor;

class HonorsController extends Controller
{
    public function index()
    {
        $honors = Honor::published()->orderBy('order')->paginate(12);

        return view('pages.honors', compact('honors'));
    }
}
