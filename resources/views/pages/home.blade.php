@extends('layout.layout', ['kkLink' => null, 'ruLink' => null, 'enLink' => null])

@section('description')
    <meta name="description"
          content="Оңтүстік Қазақстан медицина академиясы (ОҚМА), Южно-Казахстанская медицинская академия (ЮКМА), South Kazakhstan Medical Academy (SKMA)">
@endsection

@section('title')
    {{__('utils.home_page')}}
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css/accessible/index.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
    @else
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/index.css">
        <link rel="stylesheet" href="/css/slider.css">
    @endif
    <link rel="stylesheet" href="/css/tiny-slider.css">
    <link rel="stylesheet" href="/css/loading-attribute-polyfill.css">
    <style>
        .partners_slider_list {
            margin: 30px 0;
            cursor: pointer;
        }

        .partners_slider_item {
            max-width: 100%;
        }

        .partners_slider_img {
            max-width: 100%;
            height: 105px;
        }
    </style>
@endpush

@section('content')
    <section class="slider">
        <div class="slider_list">
            @foreach ($sliders as $slider)
                <div class="slider_item">
                    <noscript class="loading-lazy">
                        <img src="{{$slider->getProperty('image')}}" class="slider_img lazy" loading="lazy" alt="">
                    </noscript>

                    <img src="/img/effect.png" class="slider_img slider_effect" alt="">

                    <div class="container">
                        <div class="slider_content">
                            <div class="slider_text">
                                <h2 class="slider_main_text">
                                    {{$slider->getProperty('title') ?? ''}}
                                </h2>
                                <div class="slider_secondary_text">
                                    {{$slider->getProperty('description' ?? '')}}
                                </div>
                            </div>

                            @if ($slider->getProperty('link'))
                                <a href="{{$slider->getProperty('link')}}" class="btn_more"
                                   id="btn_more">{{__('utils.read_more')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="slider_arrows">
            <img src="/img/left-arrow.png" class="slider_arrow slider_left_arrow" alt="">
            <img src="/img/right-arrow.png" class="slider_arrow slider_right_arrow" alt="">
        </div>
    </section>

    <main class="main" style="overflow: hidden;">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')

                <div class="content">
                    <div class="content_news content_block">
                        <h2 class="heading">{{__('utils.cademy_news')}}</h2>

                        <div class="content_inner content_inner_news">
                            @foreach ($newsList as $news)
                                <a href="/{{app()->getLocale()}}/news/{{$news->getProperty('slug')}}"
                                   class="content_inner_news_item">
                                    <noscript class="loading-lazy">
                                        <img src="{{$news->image}}" class="lazy" loading="lazy" alt="">
                                    </noscript>
                                    <div class="overlay"></div>
                                    <div class="content_inner_news_info">
                                        <h2 class="content_inner_news_title">{{$news->getProperty('title')}}</h2>

                                        <div class="content_inner_news_date">
                                            <p>{{$news->getDate()}}</p>
                                            <p>{{$news->getTime()}}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <a href="/{{app()->getLocale()}}/news" class="btn_all">
                            <span>{{__('utils.see_all')}}</span>
                            <img src="/img/view-arrow.png" alt="">
                        </a>
                    </div>

                    <div class="content_gallery content_block content_margin_top">
                        <h2 class="heading">{{__('utils.cademy_gallery')}}</h2>

                        <div class="content_inner content_inner_gallery">
                            <div class="content_inner_gallery_images">
                                @foreach ($galleryImages as $galleryImage)
                                    <div class="content_inner_gallery_item">
                                        <noscript class="loading-lazy">
                                            <img src="{{$galleryImage->image}}" class="lazy" loading="lazy" alt="">
                                        </noscript>
                                    </div>
                                @endforeach
                            </div>

                            <div class="content_inner_text">{!! $information->getProperty('gallery_intro') !!}</div>
                        </div>

                        <a href="/{{app()->getLocale()}}/gallery" class="btn_all">
                            <span>{{__('utils.see_all')}}</span>
                            <img src="/img/view-arrow.png" alt="">
                        </a>
                    </div>

                    <div class="content_honors content_block content_margin_top">
                        <h2 class="heading">{{__('utils.honors')}}</h2>

                        <div class="content_inner content_inner_honors">
                            <div class="content_inner_honors_background"></div>
                            <div class="content_inner_honors_list">
                                @foreach ($honors as $honor)
                                    <div class="content_inner_honors_item">
                                        <noscript class="loading-lazy">
                                            <img src="{{$honor->getProperty('image')}}" class="lazy" loading="lazy"
                                                 alt="">
                                        </noscript>

                                        <p class="content_inner_honors_text">{{$honor->getProperty('title')}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="/{{app()->getLocale()}}/honors" class="btn_all">
                            <span>{{__('utils.see_all')}}</span>
                            <img src="/img/view-arrow.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="bottom_slider">
        <div class="container">
            <div class="bottom_slider_inner">
                <div class="sidebar"></div>

                <div class="bottom_slider_block">
                    <div class="bottom_slider_list">
                        @foreach ($bottomBanners as $banner)
                            <a href="{{$banner->getProperty('link')}}"
                               {{$banner->external ? 'target="_blank"' : ''}} class="bottom_slider_item">
                                <noscript class="loading-lazy">
                                    <img src="{{$banner->getProperty('image')}}" class="bottom_slider_img lazy"
                                         loading="lazy" alt="">
                                </noscript>
                            </a>
                        @endforeach
                    </div>

                    @if($aboveFooterBanner)
                        <a href="{{$aboveFooterBanner->getProperty('link')}}" target="_blank"
                           class="bottom_slider_item">
                            <noscript class="loading-lazy">
                                <img src="{{$aboveFooterBanner->getProperty('image')}}" class="bottom_slider_last lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="bottom_slider">
        <div class="container">
            <div class="bottom_slider_inner">
                <div class="sidebar"></div>

                <div class="bottom_slider_block">
                    <h2 class="heading">
                        @if(app()->getLocale() === 'kk')
                            Оңтүстік Қазақстан медицина академиясының серіктестері
                        @elseif(app()->getLocale() === 'ru')
                            Партнеры Южно-Казахстанской Медицинской академии
                        @else
                            Partners of the South Kazakhstan Medical Academy
                        @endif
                    </h2>
                    <div class="partners_slider_list">
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/1.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/2.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/3.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/4.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/5.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/6.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/7.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/8.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/9.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/10.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/11.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/12.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/13.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/14.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/15.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/16.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/17.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/18.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/19.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/20.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                        <a class="partners_slider_item">
                            <noscript class="loading-lazy">
                                <img src="/files/partners/21.png" class="partners_slider_img lazy"
                                     loading="lazy" alt="">
                            </noscript>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('footer-scripts')
    <script src="/js/tiny-slider.js"></script>
    <script src="/js/loading-attribute-polyfill.umd.js" async></script>
    <script src="/js/index.js"></script>
@endpush
