<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <title>Laravel Vue SPA</title>

    </head>
    <body class="antialiased">
        <h1>This is welcome blade</h1>
        <div id="app">
            <example-component></example-component>  
        </div>

        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
