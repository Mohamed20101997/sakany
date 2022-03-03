<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
    </div>
  </div>
  <ul class="app-menu">

      <li><a class="app-menu__item  {{\Request::route()->getName() == 'admin' ? 'active' : ''}}" href="{{ route('welcome') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">الرئيسيه</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'owner.index' ? 'active' : ''}}" href="{{ route('owner.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">الملاك</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'user.index' ? 'active' : ''}}" href="{{ route('user.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">المستخدمين</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'home.index' ? 'active' : ''}}" href="{{ route('home.index') }}"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">الشقق</span></a></li>

{{--  <li><a class="app-menu__item  {{\Request::route()->getName() == 'setting.show' ? 'active' : ''}}" href="{{ route('setting.show') }}"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Settings</span></a></li>--}}

  </ul>
</aside>
