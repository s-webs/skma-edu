@extends('layout.layout', ['kkLink' => 'news/' . $news->kk_slug, 'ruLink' => 'news/' . $news->ru_slug, 'enLink' => 'news/' . $news->en_slug])

@section('title')
    {{$news->getProperty('title')}}
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css//accessible/news.css">
    @else
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/news.css">
    @endif
    <link rel="stylesheet" href="/css/edit-page-btn.css">
    <link rel="stylesheet" href="/css/tiny-slider.css">
@endpush

@section('content')
    <main class="main news_single">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')

                <div class="content">
                    <div class="news_single_inner">
                        @if(auth()->guard('moonshine')->user())
                            <div class="edit-page">
                                <a href="/crm/resource/news-resource/{{ $news->id }}/edit" target="_blank">
                                    <img src="/img/ext-icons/pencil.png" alt="Редактировать страницу">
                                </a>
                            </div>
                        @endif
                        <h1 class="heading">{{$news->getProperty('title')}}</h1>

                        <div class="news_single_content">
                            {!! $news->getProperty('content') !!}
                        </div>

                        <div class="news_single_info">
                            <div class="news_item_datetime">
                                <span>{{$news->getDottedDate()}},</span>
                                <span>{{$news->getTime()}}</span>
                            </div>
                            <div class="news_item_views">
                                <img src="/img/view.png" alt="">
                                <span>{{$news->getProperty('views')}} {{__('utils.views')}}</span>
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
