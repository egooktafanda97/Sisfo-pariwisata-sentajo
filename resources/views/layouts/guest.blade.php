<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('Admin') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('Admin') }}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('Admin') }}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('Admin') }}/css/style.css" rel="stylesheet">
</head>
<body class="login-page">



    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>




    <!-- Jquery Core Js -->
    <script src="{{ asset('Admin') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('Admin') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('Admin') }}/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('Admin') }}/js/admin.js"></script>
    <script src="{{ asset('Admin') }}/js/pages/examples/sign-in.js"></script>
</body>
</html>
