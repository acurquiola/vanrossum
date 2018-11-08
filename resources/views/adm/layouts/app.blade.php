<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel='shortcut icon' href='{{asset('favicon.png')}}' type='image/png' />
    <link rel='icon' href='{{asset('favicon.png')}}' type='image/png' />
        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href=" {{ asset('css/materialize.css')}} ">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/fontawesome/css/all.css') }}" rel="stylesheet">

</head>
<body>


        @yield('content')

</body>
</html>