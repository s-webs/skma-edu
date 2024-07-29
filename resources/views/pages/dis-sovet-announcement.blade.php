@extends('layout.layout', ['kkLink' => 'dis-sovet/programs/' . $program->id, 'ruLink' => 'dis-sovet/programs/' . $program->id, 'enLink' => 'dis-sovet/programs/' . $program->id])

@section('title')
    {{ __('utils.dis_sovet_announcements') }} | {{ $program->getProperty('title') }}
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
                    <h1 class="heading"> {{ __('utils.dis_sovet_announcements') }}
                        | {{ $program->getProperty('title') }}</h1>

                    <div class="disSovet-announcements">
                        @foreach($program->announcements as $item)
                            <div class="disSovet-announcements-item">
                                <button onclick="toggleDropdown(event)"> {{ $item->getProperty('title') }} </button>
                                <div class="disSovet-announcements__content">
                                    {!! $item->getProperty('content') !!}
                                    <div class="disSovet-announcements__files">
                                        @foreach($item->files as $file)
                                            <div class="disSovet-announcements__file">
                                                <div class="disSovet-announcements__icon">
                                                    <img src="/img/ext-icons/word.png" alt="">
                                                </div>
                                                <div class="disSovet-announcements__link">
                                                    <a href="/{{ $file }}">
                                                        {{ str_replace(['.docx', '.pdf', '.doc', 'files/dis_sovet/announcements/'], '', $file) }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
    <script>
        function toggleDropdown(event) {
            var dropdownContent = event.target.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>
@endpush
