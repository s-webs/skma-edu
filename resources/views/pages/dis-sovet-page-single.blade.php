@extends('layout.layout',
[
    'kkLink' => 'dis-sovet/pages/' . $pageSingle->kk_slug,
    'ruLink' => 'dis-sovet/pages/' . $pageSingle->ru_slug,
    'enLink' => 'dis-sovet/pages/' . $pageSingle->en_slug
])

@section('title')
    {{$pageSingle->getProperty('title')}}
@endsection

@push('header-styles')
    <link rel="stylesheet" href="/css/tiny-slider.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/dis-sovet.css">
    <link rel="stylesheet" href="/css/news.css">
@endpush

@section('content')
    <main class="main news_single">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')

                <div class="content">
                    <div class="news_single_inner">
                        <h1 class="heading">{{$pageSingle->getProperty('title')}}</h1>

                        <div class="news_single_content">
                            {!! $pageSingle->getProperty('content') !!}
                        </div>
                        <div class="documents">
                            <div class="documents__list">
                                <div class="documents__item">
                                    <div class="documents__item-icon">
                                        <img src="/img/ext-icons/folder.png"
                                             alt="">
                                    </div>
                                    @if(app()->getLocale() === 'kk')
                                        <a class="documents__item-link" style="padding: 0 20px"
                                           href="/kk/pages/dissertaciialyq-kenestin-esepteri-1">
                                            Есептер
                                        </a>
                                    @elseif(app()->getLocale() === 'ru')
                                        <a class="documents__item-link" style="padding: 0 20px"
                                           href="/ru/pages/otcety-dissertacionnogo-soveta-1">
                                            Отчеты
                                        </a>
                                    @else
                                        <a class="documents__item-link" style="padding: 0 20px"
                                           href="/en/pages/dissertation-council-reports-1">
                                            Reports
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="documents">
                            <div class="documents__list">
                                @foreach(json_decode($pageSingle->getProperty('files')) as $file)
                                    <div class="documents__item">
                                        <div class="documents__item-icon">
                                            <img src="/img/ext-icons/word.png"
                                                 alt="{{ str_replace(['.docx', '.pdf', '.doc', app()->getLocale() . 'files/dis_sovet/files/'], '', $file) }}">
                                        </div>
                                        <a class="documents__item-link" href="/{{ $file }}">
                                            {{ str_replace(['.docx', '.pdf', '.doc', 'files/dis_sovet/files/' . app()->getLocale() . '/'], '', $file) }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('footer-scripts')
    <script src="/js/loading-attribute-polyfill.umd.js"></script>
@endpush
