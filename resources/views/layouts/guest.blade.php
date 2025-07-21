<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Casino Brands</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center">

    <main class="py-8 px-6 max-w-4xl w-full" style="padding-top: 80px;">
        @yield('content')
    </main>

</body>

</html>
