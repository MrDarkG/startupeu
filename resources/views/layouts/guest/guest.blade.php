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
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-4">
            <div>
                <a class="navbar-brand d-none d-sm-none d-md-inline-block d-xl-inline-block" href="#">
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
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/browse/startups">Browse startups</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/browse/funding">Seek funding </a>
              </li>
              
              <li class="nav-item active">
                <a class="nav-link" href="/browse/mentors">Find mentors</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/browse/mentors">Find mentors</a>
              </li>
            </ul>
            <div class="d-sm-none d-xl-block">
                <form class="form-inline my-2 ">
                  <input class="form-control mr-sm-2 login-input-search" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            @guest
              <button class="btn btn-light login-btn">
                <a href="/login">Login</a>
                <span class="login-text-primary"> / </span>
                <a href="/register">Register</a>
              </button>
            @else
              <button class="btn btn-light login-btn">
                <a href="/home">Dashboard</a>
              </button>
            @endguest
          </div>
        </nav>
        <div id="app">
            @yield("content")
        </div>


    <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
