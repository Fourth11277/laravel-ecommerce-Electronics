@extends('layouts.app')

@section('title', 'Checkout - ElectroMart')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Shipping Information</h2>
                
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="shipping_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" name="shipping_name" id="shipping_name" required
                                   value="{{ old('shipping_name', auth()->user()->name) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="shipping_email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="shipping_email" id="shipping_email" required
                                   value="{{ old('shipping_email', auth()->user()->email) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="shipping_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone *</label>
                        <input type="text" name="shipping_phone" id="shipping_phone" required
                               value="{{ old('shipping_phone') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="mb-4">
                        <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('shipping_address') }}</textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="shipping_city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                            <input type="text" name="shipping_city" id="shipping_city" required
                                   value="{{ old('shipping_city') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="shipping_state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                            <input type="text" name="shipping_state" id="shipping_state" required
                                   value="{{ old('shipping_state') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="shipping_postal_code" class="block text-sm font-medium text-gray-700 mb-2">Postal Code *</label>
                            <input type="text" name="shipping_postal_code" id="shipping_postal_code" required
                                   value="{{ old('shipping_postal_code') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="shipping_country" class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                        <input type="text" name="shipping_country" id="shipping_country" required
                               value="{{ old('shipping_country', 'United States') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Order Notes (Optional)</label>
                        <textarea name="notes" id="notes" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('notes') }}</textarea>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        <i class="fas fa-check mr-2"></i>Place Order
                    </button>
                </form>
            </div>
        </div>
        
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h2>
                
                @php
                    $cartItems = \App\Models\Cart::with('product')->where('user_id', auth()->id())->get();
                    $subtotal = $cartItems->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    });
                @endphp
                
                <div class="space-y-3 mb-4">
                    @foreach($cartItems as $item)
                    <div class="flex justify-between text-sm">
                        <span>{{ $item->product->name }} x{{ $item->quantity }}</span>
                        <span>₱{{ number_format($item->quantity * $item->product->price, 2) }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div class="border-t pt-4">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Subtotal:</span>
                        <span>₱{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Shipping:</span>
                        <span class="text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold pt-2 border-t">
                        <span>Total:</span>
                        <span class="text-blue-600">₱{{ number_format($subtotal, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

