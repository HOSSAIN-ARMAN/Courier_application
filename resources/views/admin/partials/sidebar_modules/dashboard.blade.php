
{{--<li class="{{$routeName === 'backend.dashboard.index' ? 'active' : ''}}">--}}
<li>
{{--    <a href="{{ route('backend.dashboard.index') }}">--}}
    <a href="#">
        <i class="menu-icon fa fa-dashboard"></i>
        <span class="menu-text"> Dashboard </span>
    </a>
    <b class="arrow"></b>
</li>

<li class="">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-archive"></i>
        <span class="menu-text">
                   Pick-up Request
                </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'parcel.request.index' ? 'open' : ''}}">
            <a href="{{ route('parcel.request.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Manage Request
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>

