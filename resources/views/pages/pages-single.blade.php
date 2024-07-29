@extends('layout.layout', ['kkLink' => 'pages/' . $pageSingle->kk_slug, 'ruLink' => 'pages/' . $pageSingle->ru_slug, 'enLink' => 'pages/' . $pageSingle->en_slug])

@section('title')
    {{$pageSingle->getProperty('title')}}
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css//accessible/news.css">
    @else
        <link rel="stylesheet" href="/css/tiny-slider.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/news.css">
    @endif
    <link rel="stylesheet" href="/css/edit-page-btn.css">
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
                                <a href="/crm/resource/page-resource/{{ $pageSingle->id }}/edit" target="_blank">
                                    <img src="/img/ext-icons/pencil.png" alt="Редактировать страницу">
                                </a>
                            </div>
                        @endif
                        <h1 class="heading">{{$pageSingle->getProperty('title')}}</h1>

                        <div class="news_single_content">
                            {!! $pageSingle->getProperty('content') !!}
                        </div>

                        <div class="news_single_info">
                            <div class="news_item_datetime">
                                <!--<span>{{$pageSingle->getDottedDate()}},</span>-->
                                <span>{{$pageSingle->getDottedDate()}},</span>
                                <span>{{$pageSingle->getTime()}}</span>
                            </div>
                            <div class="news_item_views">
                                <img src="/img/view.png" alt="">
                                <span>{{$pageSingle->getProperty('views')}} {{__('utils.views')}}</span>
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
