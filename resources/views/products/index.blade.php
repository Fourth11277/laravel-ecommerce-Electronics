@extends('layouts.app')

@section('title', 'Products - ElectroMart')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">All Products</h1>

    <div class="flex flex-col md:flex-row gap-6">
        <aside class="md:w-1/4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Filter</h2>
                
                <form method="GET" action="{{ route('products.index') }}" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search products..." 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Apply Filters
                    </button>
                    <a href="{{ route('products.index') }}" class="block text-center text-gray-600 hover:text-gray-800 mt-2">
                        Clear Filters
                    </a>
                </form>
            </div>
        </aside>

        <div class="md:w-3/4">
            @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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
                        <span class="text-xs text-blue-600 font-semibold">{{ $product->category->name }}</span>
                        <h3 class="font-semibold text-gray-800 mb-2 mt-1">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($product->description, 80) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">₱{{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products.show', $product->slug) }}" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
            @else
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <i class="fas fa-search text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600">No products found matching your criteria.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

