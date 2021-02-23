<!DOCTYPE html>
<html  lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kalonge') }}</title>

        <link rel="stylesheet" href="{{secure_asset('vendors/css/vendors.min.css')}}">

        <link href="{{secure_asset('dist/css/app.css')}}" rel="stylesheet"/>
        <link href=" {{secure_asset('css/app.css')}}" rel="stylesheet" />
        @routes
        <script src="{{secure_asset('js/app.js')}} "></script>
        <script src="{{secure_asset('dist/js/app.js')}}"></script>
    </head>
    <body >
        @inertia
    </body>

</html>
