<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DisSovetDocument;
use App\Models\DisSovetInformation;
use App\Models\DisSovetPages;
use App\Models\EducationProgram;
use Illuminate\Http\Request;

class DisSovetController extends Controller
{
    public function pages()
    {
        $pagesList = DisSovetPages::all();

        return view('pages.dis-sovet-pages', compact('pagesList'));
    }

    public function single($slug)
    {
        $localizedSlugColumn = app()->getLocale() . '_slug';
        $pageSingle = DisSovetPages::query()->where($localizedSlugColumn, $slug)->firstOrFail();

        return view('pages.dis-sovet-page-single', compact('pageSingle'));
    }

    public function index()
    {
        return view('pages.dis-sovet');
    }

    public function documents()
    {
        $documents = DisSovetDocument::all();

        return view('pages.dis-sovet-documents', compact('documents'));
    }

    public function information()
    {
        $documents = DisSovetInformation::all();

        return view('pages.dis-sovet-information', compact('documents'));
    }

    public function eduPrograms()
    {
        $programs = EducationProgram::all();

        return view('pages.dis-sovet-programs', compact('programs'));
    }

    public function announcement($id)
    {
        $program = EducationProgram::query()->findOrFail($id);

        return view('pages.dis-sovet-announcement', compact('program'));
    }
}
