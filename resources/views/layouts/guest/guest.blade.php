<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Startup Central Eurasia</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/costum.css">
        <style>
            footer .countries{
                color: #04d1be;
                font-size: 23px;
            }
            footer .countries span{
                color: white!important;
            }
        </style>
    </head>
    <body style="height: 100%!important;" class="d-flex flex-column justify-content-between">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164883851-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-164883851-1');
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1763993,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
        <div >
            <div id="app" style="height: 100%;">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-4" style="z-index: 1">
                    <div>
                        <a class="navbar-brand d-none d-sm-none d-md-inline-block d-xl-inline-block" href="/">
                            <img src="/assets/images/logo.svg" id="logo">
                        </a>
                        <a class="navbar-brand d-xl-none d-md-none d-sm-inline-block" href="#">
                            <img src="/assets/images/res_logo.svg" id="logo">
                        </a>
                        <a class="navbar-brand" href="#">
                            <img src="/assets/images/lil-logo.svg" id="logo">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <welcome-menu
                        ></welcome-menu>
                        <div class="d-sm-none d-xl-block">
                            <form class="form-inline my-2 ">
                                <input class="form-control mr-sm-2 login-input-search" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                        @guest
                            {{--                  <button class="btn btn-light login-btn">--}}
                            {{--                    <a href="/login">Login</a>--}}
                            {{--                    <span class="login-text-primary"> / </span>--}}
                            {{--                    <a href="/register">Register</a>--}}
                            {{--                  </button>--}}
                        @else
                            <button class="btn btn-light login-btn">
                                @php
                                    $user_type = Auth::user()->user_type;
                                @endphp
                                @if($user_type !== null)
                                    <a href="{{$user_type}}/dashboard/index">Dashboard</a>
                                @else
                                    <a href="/home">Dashboard</a>
                                @endif
                            </button>
                        @endguest
                    </div>
                </nav>
                @yield("content")
            </div>
        </div>
        <footer id="footer" class="c-footer dark pt-4 pb-4">
            <div class="container">
                <div class="countries mt-3 pt-4">
                    <span>Startup Central Eurasia is active in:</span>
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/8">Ukraine</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/9">Belarus</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/3">Azerbaijan</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/1">Georgia</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/2">Armenia</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/4">Kazakhstan</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/7">Kyrgyzstan</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/5">Uzbekistan</a>
                        </div>
                        <div>
                            <a href="https://startupcentraleurasia.com/en/faq/v/6">Tajikistan</a>
                        </div>
                    </div>
                </div>
                <div class="pt-2 pb-4 mt-3 text-white d-flex align-items-center">
                    <div class="f-logo">
                        <a href="https://startupcentraleurasia.com/en/"><img src="https://startupcentraleurasia.com/themes/application/Components/svg/f-logo.svg" alt=""></a>
                    </div>
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="pl-2 pr-2">
                            <a href="https://startupcentraleurasia.com/en/about">About</a>
                        </div>
                        <div class="pl-2 pr-2">
                            <a href="">Privacy</a>
                        </div>
                        <div class="pl-2 pr-2">
                            <a href="">Terms</a>
                        </div>
                        <div class="pl-2 pr-2">
                            <a href="https://startupcentraleurasia.com/en/news">News</a>
                        </div>
                        <div class="pl-2 pr-2">
                            <a href="">Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
{{--        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
