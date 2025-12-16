<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroMart - Admin Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-red-600 to-pink-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <i class="fas fa-user-shield text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">ElectroMart</h2>
                <p class="text-gray-600">Admin Registration</p>
                <h3 class="mt-6 text-2xl font-bold text-gray-800">Create Admin Account</h3>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <form class="space-y-6" action="{{ route('admin.register') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user mr-2 text-red-600"></i>Full Name
                        </label>
                        <input id="name" name="name" type="text" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300"
                               placeholder="Enter your full name"
                               value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-red-600"></i>Email Address
                        </label>
                        <input id="email" name="email" type="email" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300"
                               placeholder="Enter your email"
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-red-600"></i>Password
                        </label>
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300"
                               placeholder="Create a password">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-red-600"></i>Confirm Password
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300"
                               placeholder="Confirm your password">
                    </div>

                    <div>
                        <label for="admin_key" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-key mr-2 text-red-600"></i>Admin Registration Key
                        </label>
                        <input id="admin_key" name="admin_key" type="password" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300"
                               placeholder="Enter admin registration key">
                        <p class="mt-1 text-xs text-gray-500">Contact system administrator for the registration key.</p>
                        @error('admin_key')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                            <i class="fas fa-user-shield mr-2"></i>
                            Create Admin Account
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-500 transition-colors">
                            Sign in here
                        </a>
                    </p>
                    <p class="text-gray-600 mt-2">
                        Need a regular account? 
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                            Register as user
                        </a>
                    </p>
                </div>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                    <p class="text-sm text-red-800">
                        <strong>Admin Access:</strong> This registration is for administrators only. You must have a valid admin registration key to proceed.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

