<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroMart - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <i class="fas fa-microchip text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">ElectroMart</h2>
                <p class="text-gray-600">Your Ultimate Electronics Store</p>
                <h3 class="mt-6 text-2xl font-bold text-gray-800">Sign in to your account</h3>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-blue-600"></i>Email Address
                        </label>
                        <input id="email" name="email" type="email" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                               placeholder="Enter your email">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-blue-600"></i>Password
                        </label>
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                               placeholder="Enter your password">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" 
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                            Create one here
                        </a>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-8">
                <div class="text-center">
                    <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                        <i class="fas fa-shipping-fast text-blue-600 text-2xl mb-2"></i>
                        <p class="text-gray-700 text-sm">Free Shipping</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                        <i class="fas fa-shield-alt text-green-600 text-2xl mb-2"></i>
                        <p class="text-gray-700 text-sm">Secure Payment</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                        <i class="fas fa-headset text-purple-600 text-2xl mb-2"></i>
                        <p class="text-gray-700 text-sm">24/7 Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
