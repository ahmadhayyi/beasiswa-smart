<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/css/style.css">
    @vite('resources/css/app.css')
    @yield('title')
</head>

<body class="bg-gray-100">
    @include('dashboard.layout.navbar')
    <div class="flex h-screen flex-row flex-wrap">
        @include('dashboard.layout.sidebar')
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/dashboard/js/script.js"></script>
</body>

</html>
