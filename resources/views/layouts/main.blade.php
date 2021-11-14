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
      <div class="col-3">
        <div class="sidebar">
          <div>
            <img src="/logo.svg">
          </div>
          <div class="menubar">
            menubar
          </div>
          <div>
            logout
          </div>
          
        </div>
        
      </div>
      <div id="app" class="col-9">
        @yield("content")
      </div>

    <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
