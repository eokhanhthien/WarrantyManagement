<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WarrantyManagement</title>
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    </head>
    <body>
    <p>Day la trang home</p>
    <!----------------- Include ----------->
    @yield('home')
    </body>
</html>
