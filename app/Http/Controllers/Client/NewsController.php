<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::latest()->paginate(12);

        return view('pages.news-list', compact('newsList'));
    }

    public function show($slug)
    {
        $localizedSlugColumn = app()->getLocale() . '_slug';
        $news = News::published()->where($localizedSlugColumn, $slug)->firstOrFail();

        $key = 'news' . app()->getLocale() . $news->id;

        $localizedViewColumn = app()->getLocale() . '_views';

        if (!session()->has($key)) {
            $news->increment($localizedViewColumn, 1);
            session()->put($key, 1);
        }

        return view('pages.news-single', compact('news'));
    }
}
