@extends('layouts.guest')

@section('content')
    <header class="fixed top-0 left-0 w-full bg-white border-b border-gray-300 shadow-sm z-50">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4 py-3">
            <h1 class="text-2xl font-bold">🪙 Top Brands List in {{ $country }}</h1>
            <div class="flex space-x-3">
            <a href="{{ route('login') }}" class="bg-white hover:bg-gray-100 border border-gray-400 text-black px-4 py-2 rounded text-sm hover:bg-blue-700">Login</a>
            <a href="{{ route('register') }}" class="bg-white hover:bg-gray-100 border border-gray-400 text-black px-4 py-2 rounded text-sm hover:bg-blue-700">Register</a>


            </div>
        </div>
    </header>

    @if($brands->isEmpty())
        <p class="text-sm text-gray-500 mb-6">No data for this country. Showing default brands.</p>
    @endif

    <div class="max-w-6xl mx-auto space-y-4 px-2 sm:px-0">
        @foreach($brands->sortByDesc('rating') as $index => $brand)
            <div class="flex flex-col sm:flex-row sm:items-center border rounded p-4 bg-gray-50 hover:bg-gray-100 transition space-y-3 sm:space-y-0 sm:space-x-4">

                {{-- Number --}}
                <div class="text-lg font-semibold text-gray-700 sm:w-6 sm:text-right">
                    {{ $index + 1 }}.
                </div>

                {{-- Image --}}
                <div class="w-full sm:w-32 h-20 flex items-center justify-center overflow-hidden bg-white border rounded">
                    @if($brand->brand_image)
                        <img src="{{ asset('storage/' . $brand->brand_image) }}" alt="{{ $brand->brand_name }}" class="object-cover w-full h-full">
                    @else
                        <span class="text-sm text-gray-600">{{ $brand->brand_name }}</span>
                    @endif
                </div>

                {{-- Brand Info --}}
                <div class="flex-1">
                    <div class="font-semibold text-base mb-1">
                        {{ $brand->brand_name ?? 'Unnamed Brand' }}
                    </div>

                    @if($brand->url)
                        <span class="text-sm text-gray-700 break-words">{{ $brand->url }}</span>
                    @else
                        <span class="text-sm text-gray-400 italic">No URL provided</span>
                    @endif
                </div>

                {{-- Rating --}}
                <div class="text-left sm:w-28">
                    <div class="text-xs text-gray-500">Rating</div>
                    <div class="flex items-center space-x-1">
                        <span class="text-lg">⭐</span>
                        <span class="text-xl font-bold text-gray-900">{{ number_format($brand->rating, 1) }}</span>
                        <span class="text-sm text-gray-500">/5</span>
                    </div>
                </div>

                {{-- Button --}}
                <div class="sm:w-32 text-left sm:text-right">
                    @if($brand->url)
                        <button
                            onclick="openModal('{{ $brand->brand_name }}')"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded text-sm">
                            Play Here
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal --}}
    <div id="iframeModal"
         class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg relative shadow-lg">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
            <h2 class="text-xl font-bold mb-4">This should be the iFrame</h2>
            <p class="text-gray-700">Placeholder for casino iframe for <span id="modalBrandName" class="font-semibold"></span>.</p>
        </div>
    </div>

    <script>
        function openModal(brandName) {
            document.getElementById('modalBrandName').textContent = brandName;
            document.getElementById('iframeModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('iframeModal').classList.add('hidden');
        }
    </script>
@endsection
