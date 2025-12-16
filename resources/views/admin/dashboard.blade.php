@extends('layouts.app')

@section('title', 'Admin Dashboard - ElectroMart')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
        <p class="text-gray-600">Manage your e-commerce store</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Products</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalProducts }}</p>
                </div>
                <i class="fas fa-box text-blue-600 text-4xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Categories</p>
                    <p class="text-3xl font-bold text-green-600">{{ $totalCategories }}</p>
                </div>
                <i class="fas fa-tags text-green-600 text-4xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Orders</p>
                    <p class="text-3xl font-bold text-purple-600">{{ $totalOrders }}</p>
                </div>
                <i class="fas fa-shopping-bag text-purple-600 text-4xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Users</p>
                    <p class="text-3xl font-bold text-red-600">{{ $totalUsers }}</p>
                </div>
                <i class="fas fa-users text-red-600 text-4xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Quick Actions</h2>
            </div>
            <div class="space-y-3">
                <a href="{{ route('admin.products.create') }}" class="block w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-colors text-center">
                    <i class="fas fa-plus mr-2"></i>Add New Product
                </a>
                <a href="{{ route('admin.categories.create') }}" class="block w-full bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition-colors text-center">
                    <i class="fas fa-plus mr-2"></i>Add New Category
                </a>
                <a href="{{ route('admin.products.index') }}" class="block w-full bg-gray-600 text-white px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors text-center">
                    <i class="fas fa-box mr-2"></i>Manage Products
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block w-full bg-gray-600 text-white px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors text-center">
                    <i class="fas fa-tags mr-2"></i>Manage Categories
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Orders</h2>
            @if($recentOrders->count() > 0)
            <div class="space-y-3">
                @foreach($recentOrders as $order)
                <div class="border-b pb-3">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $order->order_number }}</p>
                            <p class="text-sm text-gray-600">{{ $order->user->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-800">₱{{ number_format($order->total_amount, 2) }}</p>
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">{{ ucfirst($order->status) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-600">No orders yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
