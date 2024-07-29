<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Page;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        if (!$request->header_search) {
            return redirect()->back();
        }

        $titleNews = News::searchTitle($request->header_search)->get();
        $titlePages = Page::searchTitle($request->header_search)->get();
        $contentNews = News::searchContent($request->header_search)->get();
        $contentPages = Page::searchContent($request->header_search)->get();

        return view('pages.search', compact('titleNews', 'titlePages', 'contentNews', 'contentPages'));
    }
}
