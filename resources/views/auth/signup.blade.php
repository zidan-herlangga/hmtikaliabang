@extends('frontend.master')

@section('title', 'Sign Up - ' . config('app.name'))

@section('content')
    <section class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-dark-900">
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-primary-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-1/4 w-72 h-72 bg-accent-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative w-full max-w-md">
            <!-- Card Container -->
            <div class="bg-dark-800/50 backdrop-blur-md border border-white/10 rounded-3xl p-8 sm:p-10 shadow-2xl">

                @if ($enable_registration)
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="font-heading text-3xl font-bold text-white mb-2">Buat Akun</h2>
                        <p class="text-white/60">Join HMTI Kaliabang now</p>
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
                    <form action="{{ route('auth.signup') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- Full Name -->
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="iconify text-xl text-white/40" data-icon="mdi:account-box-outline"></span>
                                </span>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="Masukkan nama lengkap Anda">
                            </div>
                        </div>

                        <!-- Username -->
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="iconify text-xl text-white/40" data-icon="mdi:at"></span>
                                </span>
                                <input type="text" name="username" value="{{ old('username') }}"
                                    class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="Masukkan username Anda">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="iconify text-xl text-white/40" data-icon="mdi:email-outline"></span>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="Masukkan alamat email Anda">
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="iconify text-xl text-white/40" data-icon="mdi:lock-outline"></span>
                                </span>
                                <input type="password" name="password"
                                    class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="Buat password Anda">
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block text-white/70 text-sm font-medium mb-2">Confirm Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="iconify text-xl text-white/40" data-icon="mdi:lock-check-outline"></span>
                                </span>
                                <input type="password" name="password_confirmation"
                                    class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="Konfirmasi password Anda">
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start">
                            <input id="rememberMe" name="agree" type="checkbox" value="1"
                                class="h-4 w-4 mt-1 rounded border-gray-600 bg-gray-900 text-primary-600 focus:ring-primary-500 focus:ring-offset-gray-900">
                            <label for="rememberMe" class="ml-2 block text-sm text-white/60">
                                Setuju dengan <a href="#"
                                    class="text-primary-400 hover:text-primary-300 hover:underline">syarat & ketentuan</a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full py-3 px-6 bg-gradient-to-r from-primary-600 to-primary-500 text-white font-semibold rounded-xl shadow-lg shadow-primary-900/30 hover:shadow-primary-500/25 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                                <span>Buat Akun</span>
                                <span class="iconify" data-icon="mdi:arrow-right"></span>
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center pt-4 border-t border-white/10">
                            <p class="text-white/60 text-sm">
                                Sudah punya akun?
                                <a href="{{ route('auth.login') }}"
                                    class="text-primary-400 font-medium hover:text-primary-300 transition-colors">
                                    Log In
                                </a>
                            </p>
                        </div>
                    </form>
                @else
                    <!-- Registration Disabled Message -->
                    <div class="text-center py-8">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-red-500/20 flex items-center justify-center">
                            <span class="iconify text-4xl text-red-400" data-icon="mdi:close-circle-outline"></span>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-white mb-3">Pendaftaran Dinonaktifkan</h3>
                        <p class="text-white/60 mb-6">Pendaftaran pengguna saat ini tidak diizinkan.</p>
                        <a href="{{ route('auth.login') }}"
                            class="inline-flex items-center gap-2 px-6 py-2.5 border border-white/20 rounded-full font-medium hover:bg-white/10 transition-all duration-300">
                            <span class="iconify" data-icon="mdi:arrow-left"></span>
                            Kembali ke Login
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
