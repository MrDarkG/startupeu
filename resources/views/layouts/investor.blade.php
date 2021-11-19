<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Startup Central Eurasia</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/costum.css">
    </head>
    <body class="row">
        <div class="col-3">
            <div class="sidebar pl-4">
              <div class="logo-container">
                <img src="/logo.svg" class="logo">
                <img src="/mini-logo.svg" class="logo-min">
              </div>
              <div class="menubar">
                <div>
                    <ul class="das-menu">
                        <li>
                            <a href="https://www.startupcentraleurasia.com/en/dashboard/" @if(str_contains(url()->current(), "/investor/dashboard")) class="active" @endif>
                                <img src="https://www.startupcentraleurasia.com/themes/application/Components/svg/dashboard/dashboard.svg" alt="">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" @if(str_contains(url()->current(), "/investor/offers")) class="active" @endif>
                                <img src="https://www.startupcentraleurasia.com/themes/application/Components/svg/dashboard/get-investment.svg" alt="">
                                <span>Offers</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" @if(str_contains(url()->current(), "/investor/startups")) class="active" @endif>
                                <img src="https://www.startupcentraleurasia.com/themes/application/Components/svg/dashboard/get-investment.svg" alt="">
                                <span>Startups</span>
                            </a>
                        </li>
                        <li>
                            <a href="/startup/dashboard/account" @if(str_contains(url()->current(), "/investor/account")) class="active" @endif>
                                <img src="https://www.startupcentraleurasia.com/themes/application/Components/svg/dashboard/myaccount.svg" alt="">
                                <span>My account</span>
                            </a>
                        </li>
                    </ul>
                </div>
              </div>
              <div class="sidebar-logout">
                <img src="/assets/images/power-off.png" alt="" height="30px" style="opacity:0.6">
                <span class="logout-btn">
                    Logout
                </span>
              </div>
            </div>
        </div>
        <div id="app" class="col-9">
            @yield("content")
        </div>
    <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
