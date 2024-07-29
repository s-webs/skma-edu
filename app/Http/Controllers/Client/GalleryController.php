<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryImages = Gallery::query()->orderBy('id', 'desc')->paginate(21);

        return view('pages.gallery', compact('galleryImages'));
    }
}
