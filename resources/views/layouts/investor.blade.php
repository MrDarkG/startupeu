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
<body>
    <div id="app" class="row">
        <div class="col-4 col-sm-3">
            @php
                $menu = [
//                    [
//                        'title' => 'Dashboard',
//                        'url' => '/investor/dashboard/index',
//                        'image' => '/assets/images/dashboard.svg',
//                        'is_active' => (str_contains(url()->current(), "/investor/dashboard/index")) ? true : false
//                    ],
                    [
                        'title' => 'Offers',
                        'icon' => 'bulb',
                        'url' => '/investor/dashboard/index',
                        'image' => '/assets/images/get-investment.svg',
                        'is_active' => (str_contains(url()->current(), "/investor/dashboard/index")) ? true : false
                    ],
                    [
                        'title' => 'Startups',
                        'icon' => 'rocket',
                        'url' => '/investor/dashboard/all/startups',
                        'image' => '/assets/images/get-investment.svg',
                        'is_active' => (str_contains(url()->current(), "/investor/dashboard/all/startups")) ? true : false
                    ],
                    [
                        'title' => 'My account',
                        'icon' => 'person',
                        'url' => '/investor/dashboard/account',
                        'image' => '/assets/images/myaccount.svg',
                        'is_active' => (str_contains(url()->current(), "/investor/dashboard/account")) ? true : false
                    ],
                ];
            @endphp
            <dashboard-menu
                class="pt-5 pb-5"
                :data="{{ json_encode($menu) }}"
            ></dashboard-menu>
        </div>
        <div class="col-8">
            @yield("content")
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
