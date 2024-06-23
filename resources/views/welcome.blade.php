<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- <h3>Welcome to Laravel new project...</h3> -->
    <div id="app"></div>
    @vite('resources/js/app.js')
</body>
</html>
