<!DOCTYPE html>
<html  lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kalonge') }}</title>

        <link rel="stylesheet" href="/vendors/css/vendors.min.css">

        <link href="/dist/css/app.css" rel="stylesheet"/>
        <link href="/css/app.css" rel="stylesheet" />
        @routes
        <script src="/js/app.js"></script>
        <script src="/dist/js/app.js"></script>
    </head>
    <body >
        @inertia
    </body>

</html>
