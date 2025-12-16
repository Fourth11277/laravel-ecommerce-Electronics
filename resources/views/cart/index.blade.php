@extends('layouts.app')

@section('title', 'Shopping Cart - ElectroMart')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Shopping Cart</h1>

    @if($cartItems->count() > 0)
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">Product</th>
                        <th class="text-left py-3 px-4">Price</th>
                        <th class="text-left py-3 px-4">Quantity</th>
                        <th class="text-left py-3 px-4">Subtotal</th>
                        <th class="text-left py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr class="border-b">
                        <td class="py-4 px-4">
                            <div class="flex items-center">
                                <div class="h-16 w-16 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                    @if($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover rounded-lg">
                                    @else
                                        <i class="fas fa-image text-gray-400"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $item->product->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $item->product->category->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-semibold text-gray-800">₱{{ number_format($item->product->price, 2) }}</span>
                        </td>
                        <td class="py-4 px-4">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" 
                                       class="w-20 px-2 py-1 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                                       onchange="this.form.submit()">
                            </form>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-semibold text-gray-800">₱{{ number_format($item->quantity * $item->product->price, 2) }}</span>
                        </td>
                        <td class="py-4 px-4">
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 pt-6 border-t">
            <div class="flex justify-end">
                <div class="w-full md:w-1/3">
                    <div class="flex justify-between mb-4">
                        <span class="text-lg font-semibold text-gray-800">Total:</span>
                        <span class="text-2xl font-bold text-blue-600">₱{{ number_format($total, 2) }}</span>
                    </div>
                    <a href="{{ route('orders.create') }}" 
                       class="block w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold text-center">
                        <i class="fas fa-check mr-2"></i>Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <i class="fas fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Your cart is empty</h2>
        <p class="text-gray-600 mb-6">Start shopping to add items to your cart!</p>
        <a href="{{ route('products.index') }}" 
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
            <i class="fas fa-store mr-2"></i>Browse Products
        </a>
    </div>
    @endif
</div>
@endsection

