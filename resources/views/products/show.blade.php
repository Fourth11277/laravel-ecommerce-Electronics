@extends('layouts.app')

@section('title', $product->name . ' - ElectroMart')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <div class="h-96 bg-gray-200 rounded-lg flex items-center justify-center mb-4">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover rounded-lg">
                    @else
                        <i class="fas fa-image text-gray-400 text-6xl"></i>
                    @endif
                </div>
            </div>
            
            <div>
                <span class="text-sm text-blue-600 font-semibold">{{ $product->category->name }}</span>
                <h1 class="text-3xl font-bold text-gray-900 mt-2 mb-4">{{ $product->name }}</h1>
                
                <div class="mb-4">
                    <span class="text-3xl font-bold text-blue-600">₱{{ number_format($product->price, 2) }}</span>
                </div>
                
                <div class="mb-6">
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>
                
                <div class="mb-6">
                    <p class="text-sm text-gray-600 mb-2">
                        <strong>Stock:</strong> 
                        @if($product->stock > 0)
                            <span class="text-green-600 font-semibold">{{ $product->stock }} available</span>
                        @else
                            <span class="text-red-600 font-semibold">Out of Stock</span>
                        @endif
                    </p>
                    @if($product->sku)
                    <p class="text-sm text-gray-600">
                        <strong>SKU:</strong> {{ $product->sku }}
                    </p>
                    @endif
                </div>
                
                @auth
                @if($product->stock > 0)
                <form action="{{ route('cart.store') }}" method="POST" class="mb-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center space-x-4 mb-4">
                        <label for="quantity" class="text-sm font-medium text-gray-700">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" 
                               class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                    </button>
                </form>
                @else
                <button disabled class="w-full bg-gray-400 text-white px-6 py-3 rounded-lg cursor-not-allowed font-semibold">
                    Out of Stock
                </button>
                @endif
                @else
                <a href="{{ route('login') }}" 
                   class="block w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold text-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login to Add to Cart
                </a>
                @endauth
            </div>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($relatedProduct->image)
                        <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="h-full w-full object-cover">
                    @else
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $relatedProduct->name }}</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-blue-600">₱{{ number_format($relatedProduct->price, 2) }}</span>
                        <a href="{{ route('products.show', $relatedProduct->slug) }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection

