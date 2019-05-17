<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
      <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
      <meta name="author" content="PIXINVENT">
      <title>App Name - @yield('title')</title>
      <link rel="apple-touch-icon" href="{{ URL::asset('assets/images/ico/apple-icon-120.png')}}">
      <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/images/ico/favicon.ico')}}">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
      <link href="{{ URL::asset('assets/css/vendors.css') }}" type="text/css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/app.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/pages/timeline.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/vendors/css/charts/chartist.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/core/menu/components.min.css')}}">
      <link href="{{ URL::asset('assets/css/plugins/forms/wizard.min.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

   </head>
   <body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
            <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="index.html">
                        <img class="brand-logo" alt="modern admin logo" src="{{ URL::asset('assets/images/logo/logo.png')}}">
                        <h3 class="brand-text">Vat Accounting</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <!--<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>-->
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">Hello,<span class="user-name text-bold-700"> {{ Auth::user()->name }}</span></span>
                                <span class="avatar avatar-online"><img src="{{ URL::asset('assets/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('/companies')}}"><i class="ft-user"></i> Company Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            </div>
        </nav>
        @guest
            <hr/>
        @else
            @include('layouts.sidebar') 
        @endguest

        <div class="app-content content">
            @yield('content')
        </div>
        <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2019 <a class="text-bold-800 grey darken-2" href="#" target="_blank">Admin </a>, All rights reserved. </span></p>
        </footer>
        <!-- BEGIN VENDOR JS-->
        <script src="{{ URL::asset('assets/vendors/js/vendors.min.js')}}"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script src="{{ URL::asset('assets/vendors/js/ui/jquery.sticky.js')}}"></script>
        <script src="{{ URL::asset('assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
        <script src="{{ URL::asset('assets/vendors/js/charts/chartist.min.js')}}"></script>
        <script src="{{ URL::asset('assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/vendors/js/charts/raphael-min.js')}}"></script>
        <script src="{{ URL::asset('assets/vendors/js/charts/morris.min.js')}}"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN MODERN JS-->
        <script src="{{ URL::asset('assets/js/core/app-menu.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/core/app.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/scripts/customizer.min.js')}}"></script>
        <!-- END MODERN JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="{{ URL::asset('assets/js/scripts/ui/breadcrumbs-with-stats.min.js')}}"></script>
        <script src="{{ URL::asset('assets/vendors/js/forms/tags/form-field.js')}}"></script>
        <!-- END PAGE LEVEL JS-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function(){
    $(".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

$( function() {
    var availableTags = ["1","Satnam","2","Singh"];
    $( "#tags" ).autocomplete({
        source: availableTags
    });
    $( ".client" ).autocomplete({
        source: function(request, response) {
            var name = jQuery("input.suggest-user").val();
            jQuery.get(
                '{!! route('client') !!}',
                function(data) {
                    console.log(data.data);  // Ok, I get the data. Data looks like that:
                    test = data.data;        // ["one@abc.de", "onf@abc.de","ong@abc.de"]
                    return test;        // But what now? How do I display my data?
                }
            );
        }
    });
} );

</script>
    </body>
</html>