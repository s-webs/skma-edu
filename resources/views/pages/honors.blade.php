@extends('layout.layout', ['kkLink' => 'honors', 'ruLink' => 'honors', 'enLink' => 'honors', 'page' => request()->page ? '?page=' . request()->page : ''  ])

@section('title')
    {{__('utils.honors')}}
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css//accessible/news.css">
    @else
        <link rel="stylesheet" href="/css/tiny-slider.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/honors.css">
    @endif
    <link rel="stylesheet" href="/css/lightgallery-bundle.min.css">
    <link rel="stylesheet" href="/css/lg-fullscreen.min.css">
    <link rel="stylesheet" href="/css/lg-thumbnail.min.css">
@endpush

@section('content')
    <main class="main honors">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')
                <div class="content">
                    <div class="honors_inner">
                        <h1 class="heading">{{__('utils.honors')}}</h1>

                        <div id="slideshow">
                            @foreach ($honors as $honor)
                                <a href="{{$honor->getProperty('image')}}">
                                    <noscript class="loading-lazy">
                                        <img src="{{$honor->getProperty('image')}}" class="lazy"/>
                                    </noscript>
                                </a>
                            @endforeach
                        </div>
                        {{$honors->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('footer-scripts')
    <script src="/js/lightgallery.min.js"></script>
    <script src="/js/lg-thumbnail.min.js"></script>
    <script src="/js/lg-fullscreen.min.js"></script>
    <script src="/js/loading-attribute-polyfill.umd.js"></script>
    <script src="/js/slideshow.js"></script>
@endpush
