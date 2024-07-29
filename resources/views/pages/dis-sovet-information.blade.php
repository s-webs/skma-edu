@extends('layout.layout', ['kkLink' => 'dis-sovet/information', 'ruLink' => 'dis-sovet/information', 'enLink' => 'dis-sovet/information'])

@section('title')
    Диссертационный совет
@endsection

@push('header-styles')
    <link rel="stylesheet" href="/css/tiny-slider.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/lightgallery-bundle.min.css">
    <link rel="stylesheet" href="/css/lg-fullscreen.min.css">
    <link rel="stylesheet" href="/css/lg-thumbnail.min.css">
    <link rel="stylesheet" href="/css/dis-sovet.css">
@endpush

@section('content')
    <main class="main">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')
                <div class="content">
                    <h1 class="heading">Информация для претендентов</h1>
                    <div class="documents">
                        <div class="documents__list">
                            @foreach($documents as $document)
                                <div class="documents__item">
                                    <div class="documents__item-icon">
                                        <img src="/img/ext-icons/pdf.png" alt="">
                                    </div>
                                        <a class="documents__item-link"
                                           href="/{{ $document->getProperty('file') }}">{{$document->getProperty('title')}}
                                        </a>
                                </div>
                            @endforeach
                        </div>
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
