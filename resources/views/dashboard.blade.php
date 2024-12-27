<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Navigation Bar Additions -->
            <nav class="bg-white shadow sm:rounded-lg mb-4 p-4">
                <ul class="flex space-x-4">
                    <li><a href="/cart" class="text-blue-500 hover:underline">Cart</a></li>
                    <li><a href="/orders" class="text-blue-500 hover:underline">Order History</a></li>
                </ul>
            </nav>

            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold">Welcome back, {{ auth()->user()->name }}!</h3>
                </div>
            </div>

            <!-- Products Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Recommended Products</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @forelse ($recommendedProducts as $product)
                            <div class="border rounded-lg shadow p-4">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded mb-4">
                                <h4 class="font-bold text-lg">{{ $product->name }}</h4>
                                <p class="text-gray-700">Price: {{ $product->price }} LKR</p>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500">No products available at the moment.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
