<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {

    }

    public function show($slug)
    {
        $localizedSlugColumn = app()->getLocale() . '_slug';
        $pageSingle = Page::query()->published()->where($localizedSlugColumn, $slug)->firstOrFail();

        $key = 'pages' . app()->getLocale() . $pageSingle->id;

        $localizedViewColumn = app()->getLocale() . '_views';

        if (!session()->has($key)) {
            $pageSingle->increment($localizedViewColumn, 1);
            session()->put($key, 1);
        }

        return view('pages.pages-single', compact('pageSingle'));
    }
}
