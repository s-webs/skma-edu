<aside class="sidebar">
  <h2 class="heading">{{__('utils.menu')}}</h2>

  <ul class="sidebar_menu_list">
    @each('partials.sidebar-menu', $sidebarMenus, 'menu', 'partials.no-sidebar-menu')
  </ul>

  @foreach ($underSidebarMenuBanners as $banner)
    <a href="{{$banner->getProperty('link')}}" {{$banner->external ? 'target="_blank"' : ''}} class="sidebar_banner_link">
      <noscript class="loading-lazy">
          <img src="{{$banner->getProperty('image')}}" class="sidebar_banner_img lazy" alt="">
      </noscript>
    </a>
  @endforeach

  <div class="question">
      <h2 class="heading">{{__('utils.question-answer')}}</h2>
      
      <ul class="question_list">
        @foreach ($sidebarQuestions as $question)
          <li class="question_item">
            <a href="/{{app()->getLocale()}}/faq" class="question_link">
              <span>В</span>
                <div class="question_text">{{Str::limit($question->text, 100, '...')}}</div>
            </a>
          </li>
        @endforeach     
      </ul>

      <a href="/{{app()->getLocale()}}/faq" class="question_ask">{{__('utils.ask-question')}}</a>
  </div>

  @foreach ($underQuestionBanners as $banner)
    <a href="{{$banner->getProperty('link')}}" {{$banner->external ? 'target="_blank"' : ''}} class="sidebar_banner_link">
      <noscript class="loading-lazy">
          <img src="{{$banner->getProperty('image')}}" class="sidebar_banner_img lazy" alt="">
      </noscript>
    </a>
  @endforeach
</aside>