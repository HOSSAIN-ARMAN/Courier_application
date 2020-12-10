{{--        <li class="{{ strpos($routeName, 'backend.admin') === 0 ? 'active open' : ''}}">--}}
<li class="">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-asterisk"></i>
        <span class="menu-text">
                   Parcel-Info
                </span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        <li class="{{ $routeName === 'parcel.index' ? 'open' : ''}}">
            <a href="{{ route('parcel.index') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Add Parcel
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ $routeName === 'parcel.details' ? 'open' : ''}}">
            <a href="{{ route('parcel.details') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Parcel Details
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>

{{--        <li class="{{ strpos($routeName, 'backend.admin') === 0 ? 'active open' : ''}}">--}}
