<!DOCTYPE html>
<html  lang="en" class="light">
{{-- lang="{{ str_replace('_', '-', app()->getLocale()) }}" --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}} -->

        <!-- Styles -->
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"> -->
        <link rel="stylesheet" href="/vendors/css/vendors.min.css">

        <!-- <link rel="stylesheet" href="{{ asset('vendors/css/ui/prism.min.css') }}"> -->
        <link href="/dist/css/app.css" rel="stylesheet"/>
        <link href="/css/app.css" rel="stylesheet" />
        <!-- <link href="{{ asset('css/icons.css ')}}" rel="stylesheet" type="text/css"> -->
        
        <!-- Scripts -->
        @routes
        <!-- <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script> -->
        <script src="/js/app.js"></script>
        <script src="/dist/js/app.js"></script>
    </head>
    {{-- class=" font-sans antialiased" --}}
    <body >
        @inertia
    </body>

</html>
