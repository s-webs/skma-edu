@extends('layout.layout', ['kkLink' => 'search', 'ruLink' => 'search', 'enLink' => 'search', 'page' => request()->header_search ? '?header_search=' . request()->header_search : ''  ])

@section('title')
    Вопросы-ответы
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/search.css">
    @else
        <link rel="stylesheet" href="/css/tiny-slider.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/lightgallery-bundle.min.css">
        <link rel="stylesheet" href="/css/lg-fullscreen.min.css">
        <link rel="stylesheet" href="/css/lg-thumbnail.min.css">
        <link rel="stylesheet" href="/css/search.css">
    @endif
@endpush

@section('content')
    <main class="main search">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')

                <div class="content">
                    <div class="search_inner">
                        <h1 class="heading">{{__('utils.search_results')}}</h1>

                        <div class="search_result_block">
                            <h2 class="search_result_header">{{__('utils.result_title_news')}} ({{$titleNews->count()}}
                                )</h2>

                            <div class="search_result_list">
                                @if (count($titleNews) > 0)
                                    @foreach ($titleNews as $result)
                                        <div class="search_result_item">
                                            <a href="/{{app()->getLocale()}}/news/{{$result->getProperty('slug')}}"
                                               class="search_result_link">
                                                <h2 class="search_result_item_header">{!! $result->getProperty('title') !!}</h2>
                                            </a>

                                            <div
                                                class="search_result_text">{!!Str::words(strip_tags($result->getProperty('content')), 25, '...')!!}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="search_result_item">
                                        <div class="search_result_link">
                                            Ничего не найдено
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="search_result_block">
                            <h2 class="search_result_header">{{__('utils.result_title_pages')}}
                                ({{$titlePages->count()}})</h2>

                            <div class="search_result_list">
                                @if (count($titlePages) > 0)
                                    @foreach ($titlePages as $result)
                                        <div class="search_result_item">
                                            <a href="/{{app()->getLocale()}}/pages/{{$result->getProperty('slug')}}"
                                               class="search_result_link">
                                                <h2 class="search_result_item_header">{!! $result->getProperty('title') !!}</h2>
                                            </a>

                                            <div
                                                class="search_result_text">{!!Str::words(strip_tags($result->getProperty('content')), 25, '...')!!}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="search_result_item">
                                        <div class="search_result_link">
                                            Ничего не найдено
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="search_result_block">
                            <h2 class="search_result_header">{{__('utils.result_content_news')}}
                                ({{$contentNews->count()}})</h2>

                            <div class="search_result_list">
                                @if (count($contentNews) > 0)
                                    @foreach ($contentNews as $result)
                                        <div class="search_result_item">
                                            <a href="/{{app()->getLocale()}}/news/{{$result->getProperty('slug')}}"
                                               class="search_result_link">
                                                <h2 class="search_result_item_header">{!! $result->getProperty('title') !!}</h2>
                                            </a>

                                            <div
                                                class="search_result_text">{!!Str::words(strip_tags($result->getProperty('content')), 25, '...')!!}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="search_result_item">
                                        <div class="search_result_link">
                                            Ничего не найдено
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="search_result_block">
                            <h2 class="search_result_header">{{__('utils.result_content_pages')}}
                                ({{$contentPages->count()}})</h2>

                            <div class="search_result_list">
                                @if (count($contentPages) > 0)
                                    @foreach ($contentPages as $result)
                                        <div class="search_result_item">
                                            <a href="/{{app()->getLocale()}}/pages/{{$result->getProperty('slug')}}"
                                               class="search_result_link">
                                                <h2 class="search_result_item_header">{!! $result->getProperty('title') !!}</h2>
                                            </a>

                                            <div
                                                class="search_result_text">{!!Str::words(strip_tags($result->getProperty('content')), 25, '...')!!}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="search_result_item">
                                        <div class="search_result_link">
                                            Ничего не найдено
                                        </div>
                                    </div>
                                @endif
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
