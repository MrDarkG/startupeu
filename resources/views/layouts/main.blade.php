<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Startup Central Eurasia</title>
        <link rel='stylesheet' href="/assets/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/costum.css">
    </head>
    <body>
    <div id="app" class="row m-0" style="background: #efeff4!important;">
        <div class="col-3">
            @php
                $menu = [
                    [
                        'title' => 'Dashboard',
                        'url' => '/startup/dashboard/index',
                        'image' => '/assets/images/dashboard.svg',
                        'is_active' => (str_contains(url()->current(), "/startup/dashboard")) ? true : false
                    ],
                    [
                        'title' => 'Offers',
                        'url' => '#',
                        'image' => '/assets/images/get-investment.svg',
                        'is_active' => (str_contains(url()->current(), "/startup/calendar")) ? true : false
                    ],
                    [
                        'title' => 'My account',
                        'url' => '/startup/dashboard/account',
                        'image' => '/assets/images/myaccount.svg',
                        'is_active' => (str_contains(url()->current(), "/startup/account")) ? true : false
                    ],
                ];
            @endphp
            <dashboard-menu
                class="pt-5 pb-5"
                :data="{{ json_encode($menu) }}"
            />
        </div>
        <div  class="col-9">
            @yield("content")
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
