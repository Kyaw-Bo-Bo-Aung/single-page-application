<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css')}}">
        <title>Laravel Vue SPA</title>

    </head>
    <body class="antialiased">
        <div id="app">
            <vue-progress-bar></vue-progress-bar>
            <product-component></product-component>  
        </div>

        <script type="text/javascript" src="{{ mix('/js/app.js')}}"></script>
    </body>
</html>
