@extends('layouts.app')

@section('title', 'Dashboard - ElectroMart')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome to ElectroMart!</h1>
        <p class="text-gray-600">Discover the latest electronics and gadgets</p>
    </div>

    @if($categories->count() > 0)
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Shop by Category</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}" 
               class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow text-center">
                <div class="text-4xl mb-3">
                    <i class="fas fa-microchip text-blue-600"></i>
                </div>
                <h3 class="font-semibold text-gray-800">{{ $category->name }}</h3>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Featured Products</h2>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                    @else
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($product->description, 60) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-blue-600">₱{{ number_format($product->price, 2) }}</span>
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <i class="fas fa-box-open text-gray-400 text-5xl mb-4"></i>
            <p class="text-gray-600">No featured products available at the moment.</p>
        </div>
        @endif
    </div>
</div>
@endsection

