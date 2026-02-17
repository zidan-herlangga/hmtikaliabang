@extends('frontend.master')

@section('title', 'Log In - ' . config('app.name'))

@section('content')
    <section class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background Effects (Opsional, biar mirip hero section) -->
        <div class="absolute inset-0 bg-dark-900">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-accent-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative w-full max-w-md">
            <!-- Card Container -->
            <div class="bg-dark-800/50 backdrop-blur-md border border-white/10 rounded-3xl p-8 sm:p-10 shadow-2xl">

                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="font-heading text-3xl font-bold text-white mb-2">Selamat Datang</h2>
                    <p class="text-white/60">Masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-500/30 text-red-300">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="iconify text-2xl" data-icon="mdi:alert-circle"></span>
                            <p class="font-semibold">Error!</p>
                        </div>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('auth.login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email/Username Input -->
                    <div>
                        <label class="block text-white/70 text-sm font-medium mb-2">Email atau Username</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="iconify text-xl text-white/40" data-icon="mdi:account-outline"></span>
                            </span>
                            <input type="text" name="email_or_username" value="{{ old('email_or_username') }}"
                                class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                placeholder="Masukkan email atau username Anda">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label class="block text-white/70 text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="iconify text-xl text-white/40" data-icon="mdi:lock-outline"></span>
                            </span>
                            <input type="password" name="password"
                                class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                placeholder="Masukkan password Anda">
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password (Optional) -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="rememberMe" name="remember" type="checkbox" value="1"
                                class="h-4 w-4 rounded border-gray-600 bg-gray-900 text-primary-600 focus:ring-primary-500 focus:ring-offset-gray-900">
                            <label for="rememberMe" class="ml-2 block text-sm text-white/60">
                                Ingat Saya
                            </label>
                        </div>
                        {{-- <a href="#" class="text-sm text-primary-400 hover:text-primary-300">Forgot password?</a> --}}
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full py-3 px-6 bg-gradient-to-r from-primary-600 to-primary-500 text-white font-semibold rounded-xl shadow-lg shadow-primary-900/30 hover:shadow-primary-500/25 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                            <span>Log In</span>
                            <span class="iconify" data-icon="mdi:arrow-right"></span>
                        </button>
                    </div>

                    <!-- Sign Up Link -->
                    <div class="text-center pt-4 border-t border-white/10">
                        <p class="text-white/60 text-sm">
                            Belum punya akun?
                            <a href="{{ route('auth.signup') }}"
                                class="text-primary-400 font-medium hover:text-primary-300 transition-colors">
                                Sign Up
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
