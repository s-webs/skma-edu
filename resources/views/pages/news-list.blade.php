@extends('layout.layout', ['kkLink' => 'news', 'ruLink' => 'news', 'enLink' => 'news', 'page' => request()->page ? '?page=' . request()->page : ''  ])

@section('description')
    <meta name="description"
          content="Оңтүстік Қазақстан медицина академиясы (ОҚМА), Южно-Казахстанская медицинская академия (ЮКМА), South Kazakhstan Medical Academy (SKMA)">
@endsection

@section('title')
    {{__('utils.cademy_news')}}
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css//accessible/news.css">
    @else
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/news.css">
    @endif
    <link rel="stylesheet" href="/css/tiny-slider.css">
@endpush

@section('content')
    <main class="main news">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')

                <div class="content">
                    <div class="news">
                        <h1 class="heading">{{__('utils.cademy_news')}}</h1>

                        <div class="news_list">
                            @foreach ($newsList as $news)
                                <div class="news_item">
                                    <noscript class="loading-lazy">
                                        {{--                                        <img src="{{str_replace('//', '/', $news->image)}}" alt="" loading="lazy" class="news_img">--}}
                                        <img src="/{{ ltrim($news->image, '/') }}" alt="" loading="lazy"
                                             class="news_img">
                                    </noscript>
                                    <div class="news_item_inner_block">
                                        <div class="news_item_content">
                                            <h2 class="news_heading">{{$news->getProperty('title')}}</h2>
                                            <div
                                                class="news_description">{!!Str::words(strip_tags($news->getProperty('content')), 25, '...')!!}</div>
                                        </div>
                                        <div class="news_item_info">
                                            <div class="news_item_datetime">
                                                <span>{{$news->getDottedDate()}},</span>
                                                <span>9:25</span>
                                            </div>
                                            <div class="news_item_views">
                                                <img src="/img/view.png" alt="">
                                                <span>{{$news->getProperty('views')}} <span
                                                        class="news_item_views_text">
                                                        @if(session('accessibleMode'))
                                                        @else
                                                            {{__('utils.views')}}
                                                        @endif
                                                    </span></span>
                                            </div>
                                            <a href="/{{app()->getLocale()}}/news/{{$news->getProperty('slug')}}"
                                               class="news_item_link">
                                                <span>{{__('utils.see_more')}}</span>
                                                <img src="/img/view-arrow.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{$newsList->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('footer-scripts')
    <script src="/js/loading-attribute-polyfill.umd.js"></script>
@endpush
