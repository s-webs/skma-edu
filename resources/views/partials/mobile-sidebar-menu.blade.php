<li class="header_mobile_menu_item">
  <div class="header_mobile_menu_item_header">
    <a href="{{$menu->getProperty('link')}}" class="header_mobile_menu_link">{{$menu->getProperty('title')}}</a>
    @if ($menu->hasChildren())
        <div class="header_menu_dropdown_icon"></div>
    @endif
  </div>

  @if (count($menu->childrenRecursive) > 0)
    <ul class="header_mobile_submenu d-none">
      @foreach($menu->childrenRecursive as $menu)
          @include('partials.mobile-sidebar-menu', $menu)
      @endforeach
    </ul>
  @endif
</li>