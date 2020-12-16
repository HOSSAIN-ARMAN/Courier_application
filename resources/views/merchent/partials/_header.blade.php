<?php

if (Auth::check()){
    $id = auth('merchent')->id();
    $merchent = \App\Merchent::where('id', $id)->first();
}

?>

<div id="navbar" class="navbar navbar-default ace-save-state bg-dark">
    <div class="navbar-container ace-save-state" id="navbar-container">

        <div class="navbar-header pull-left">
{{--            <a href="{{ route('backend.dashboard.index') }}" class="navbar-brand">--}}
            <a href="#" class="navbar-brand">
                <small class="text-success font-weight-bold" style="font-weight: 600">
                    <span class="item-black">
                        <i class="fa fa-maxcdn"></i>
{{--                        {{ $info->name }}--}}
                        Merchent
                    </span>
                </small>
            </a>
        </div>

        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-buttons navbar-header bg-secondary" style="float: right !important; background: #1a1a1a" role="navigation">

            <ul class="nav ace-nav" style="border-top-width: 0; background: aliceblue">

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        @if(Auth::check())

                            @if(isset($merchent->image) )
                                <img class="nav-user-photo" src="{{ asset($merchent->image) }}">
                            @else
                                <img class="nav-user-photo" src="{{ asset('assets/images/defult-img/admin-default-img.png') }}">
                            @endif
                        @else
                        <img class="nav-user-photo" src="{{ asset('assets/images/defult-img/admin-default-img.png') }}">
                        @endif
                        <span class="user-info">
                                    <small>Welcome,</small>
                                {{ Auth::user()->name }}
                                </span>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('profile.index') }}">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a class="dropdown-item" href="{{ route('merchent.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('merchent.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
