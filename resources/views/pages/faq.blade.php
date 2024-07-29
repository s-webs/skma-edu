@extends('layout.layout', ['kkLink' => 'faq', 'ruLink' => 'faq', 'enLink' => 'faq', 'page' => request()->page ? '?page=' . request()->page : ''  ])

@section('title')
    {{__('utils.question-answer')}}
@endsection

@push('header-styles')
    @if(session('accessibleMode'))
        <link rel="stylesheet" href="/css/accessible/header.css">
        <link rel="stylesheet" href="/css/accessible/slider.css">
        <link rel="stylesheet" href="/css/accessible/style.css">
        <link rel="stylesheet" href="/css/accessible/faq.css">
    @else
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/slider.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/faq.css">
    @endif
    <link rel="stylesheet" href="/css/lightgallery-bundle.min.css">
    <link rel="stylesheet" href="/css/lg-fullscreen.min.css">
    <link rel="stylesheet" href="/css/lg-thumbnail.min.css">
    <link rel="stylesheet" href="/css/tiny-slider.css">
@endpush

@section('content')
    <main class="main faq">
        <div class="container">
            <div class="main_inner">
                @include('partials.sidebar')

                <div class="content">
                    <div class="faq_inner">
                        <h1 class="heading">{{__('utils.question-answer')}}</h1>

                        @if (session()->get('question_success'))
                            <div class="question_success">{{__('utils.question_processing')}}</div>
                        @endif

                        @if ($errors->any())
                            <div class="question_error_block">
                                @foreach ($errors->all() as $error)
                                    <div class="question_error">{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <ul class="faq_questions">
                            @foreach ($questions as $question)
                                <li class="faq_question_item">
                                    <div class="faq_question_header">
                                        <h2 class="faq_question_title">
                                            {{$question->text}}
                                        </h2>
                                    </div>

                                    <div class="faq_question_body">
                                        <div class="faq_question_body_text">
                                            {!!$question->answer ?? ''!!}
                                        </div>

                                        <div class="faq_question_info">
                                            <div class="faq_question_datetime">{{__('utils.date')}}
                                                : {{$question->getDottedDate()}} {{$question->getTime()}}</div>
                                            <div class="faq_question_author">{{__('utils.author')}}
                                                : {{$question->name}}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="faq_add">+</div>

        <div class="faq_modal_wrapper">
            <form action="/faq" method="POST" class="faq_modal d-none">
                @csrf
                <h2 class="faq_title">{{__('utils.ask-question')}}</h2>

                <input type="text" name="name" value="{{old('name')}}" placeholder="{{__('utils.name')}}">

                <input type="text" name="email" value="{{old('email')}}" placeholder="{{__('utils.email')}}">

                <textarea name="text" placeholder="{{__('utils.your_question')}}">{{old('text')}}</textarea>

                <button class="faq_modal_button">{{__('utils.send')}}</button>

                <div class="faq_modal_close">
                    <div class="faq_modal_close_inner">
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('footer-scripts')
    <script src="/js/loading-attribute-polyfill.umd.js"></script>
    <script src="/js/faq.js"></script>
@endpush
