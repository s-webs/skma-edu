<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Honor;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::published()->latest()->get();
        $newsList = News::published()->latest()->take(6)->get();
        $galleryImages = Gallery::latest()->take(2)->get();
        $honors = Honor::published()->orderBy('order')->take(4)->get();

        return view('pages.home', compact('sliders', 'newsList', 'galleryImages', 'honors'));
    }
}
