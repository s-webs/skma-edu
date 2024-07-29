<li class="sidebar_menu_item">
  <a href="{{$menu->getProperty('link')}}" class="sidebar_menu_link">
    {{$menu->getProperty('title')}}
  </a>

  @if (count($menu->childrenRecursive) > 0)
    <div class="sidebar_submenu_icon"></div>
  @endif
</li>

@if (count($menu->childrenRecursive) > 0)
<ul class="sidebar_menu_list sidebar_submenu_list d-none">
  @foreach($menu->childrenRecursive as $menu)
      @include('partials.sidebar-menu', $menu)
  @endforeach
</ul>
@endif