@extends('layout.layout', ['kkLink' => 'dis-sovet', 'ruLink' => 'dis-sovet', 'enLink' => 'dis-sovet'])

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
                    <h1 class="heading">Диссертационный совет</h1>
                    <div class="dis-sovet">
                        <div class="dis-sovet__list">
                            <a class="dis-sovet__item-link" href="{{ route('dis-sovet.documents') }}">Документы
                                диссертационного совета</a>
                            <a class="dis-sovet__item-link" href="{{ route('dis-sovet.information') }}">Информация для претендентов</a>
                            <a class="dis-sovet__item-link" href="{{ route('dis-sovet.eduPrograms') }}">Обявления о защитах диссертации</a>
                            <a class="dis-sovet__item-link" href="##">Состав диссертационного совета</a>
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
