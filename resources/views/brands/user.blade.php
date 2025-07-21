<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Brands</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 m-0">

    <!-- Top Bar -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Top Brands by Country</h1>

        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline mr-4">Login</a>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
            @endauth
        </div>
    </header>

    <!-- Country Info & Brand List -->
    <main class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-2">Brands for: {{ $country }}</h2>

        @if($brands->isEmpty())
            <p class="text-gray-600">No specific brands for your country. Showing default list.</p>
        @endif

        <ul class="mt-4 space-y-2">
            @foreach ($brands as $item)
                <li class="border p-3 rounded bg-gray-50">
                    {{ $item->brand->name ?? 'Unnamed Brand' }}
                    @if($item->rating)
                        <span class="text-sm text-gray-500">(Rating: {{ $item->rating }}/5)</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </main>

</body>
</html>
