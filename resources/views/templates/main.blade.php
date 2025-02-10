<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/icon/logo2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    @stack('css')

    <title>@yield('title') Ayo Cerita!</title>
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    @stack('script')
</body>
</html>
