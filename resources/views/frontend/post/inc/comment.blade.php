@if ($post->enable_comment)
    <div class="mt-12 pt-8 border-t border-white/10">

        {{-- Header Komentar --}}
        @if ($post->comments_count > 0)
            <div class="flex items-center gap-4 mb-8">
                <h4 class="font-heading text-2xl font-bold text-white">
                    {{ $post->comments_count }} Komentar
                </h4>
                <div class="flex-grow h-px bg-white/10"></div>
            </div>

            {{-- Daftar Komentar --}}
            <ul class="space-y-6">
                @foreach ($post->comments as $comment)
                    <li class="comment-item">
                        <div
                            class="flex gap-4 p-4 bg-dark-800/30 rounded-2xl border border-white/5 hover:border-primary-500/20 transition-colors">

                            {{-- Avatar --}}
                            <div class="flex-shrink-0">
                                <img src="{{ asset('uploads/author/' . ($comment->user && $comment->user->profile ? $comment->user->profile : 'default.webp')) }}"
                                    alt="{{ $comment->user->name ?? $comment->name }}"
                                    class="w-12 h-12 rounded-full object-cover border border-white/10" />
                            </div>

                            {{-- Konten Komentar --}}
                            <div class="flex-grow">
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    {{-- Nama Penulis --}}
                                    @if ($comment->user)
                                        <a href="{{ route('frontend.user', $comment->user->username) }}"
                                            class="font-semibold text-white hover:text-primary-400 transition-colors">
                                            {{ $comment->user->name }}
                                        </a>
                                    @else
                                        <span class="font-semibold text-white">{{ $comment->name }}</span>
                                    @endif

                                    {{-- Badge Post Creator --}}
                                    @if ($comment->user && $comment->user == $post->user)
                                        <span
                                            class="px-2 py-0.5 text-xs font-bold rounded-full bg-primary-600 text-white uppercase tracking-wider">
                                            Pemilik
                                        </span>
                                    @endif

                                    {{-- Waktu --}}
                                    <span class="text-white/40 text-sm">•
                                        {{ $comment->created_at->diffForHumans() }}</span>
                                </div>

                                <p class="text-white/70 mb-3 leading-relaxed">{{ $comment->message }}</p>

                                {{-- Tombol Reply --}}
                                <button type="button" data-comment-id="{{ $comment->id }}"
                                    class="inline-flex items-center gap-1.5 text-sm font-medium text-primary-400 hover:text-primary-300 transition-colors btn-reply">
                                    <span class="iconify" data-icon="mdi:reply"></span>
                                    Balas
                                </button>
                            </div>
                        </div>

                        {{-- Balasan (Replies) --}}
                        @if (count($comment->replies) > 0)
                            <ul class="ml-8 md:ml-16 mt-4 space-y-4 border-l-2 border-primary-900/30 pl-4">
                                @foreach ($comment->replies as $reply)
                                    <li class="comment-item">
                                        <div class="flex gap-3">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('uploads/author/' . ($reply->user && $reply->user->profile ? $reply->user->profile : 'default.webp')) }}"
                                                    alt="{{ $reply->user->name ?? $reply->name }}"
                                                    class="w-8 h-8 rounded-full object-cover border border-white/10" />
                                            </div>
                                            <div class="flex-grow bg-dark-800/20 p-3 rounded-xl">
                                                <div class="flex items-center gap-2 mb-1 text-sm">
                                                    @if ($reply->user)
                                                        <span
                                                            class="font-semibold text-white">{{ $reply->user->name }}</span>
                                                    @else
                                                        <span
                                                            class="font-semibold text-white">{{ $reply->name }}</span>
                                                    @endif
                                                    @if ($reply->user && $reply->user == $post->user)
                                                        <span
                                                            class="px-1.5 py-0.5 text-[10px] font-bold rounded bg-primary-600 text-white">Pemilik</span>
                                                    @endif
                                                    <span class="text-white/40 text-xs">•
                                                        {{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-white/60 text-sm">{{ $reply->message }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Form Komentar --}}
        <div id="comment-form-location" class="mt-12">
            <div class="comments-form bg-dark-800/30 p-6 md:p-8 rounded-3xl border border-white/10" id="comment-form">

                <h4 class="font-heading text-xl font-bold text-white mb-6">
                    @guest
                        Berikan Komentar
                    @else
                        Berikan Komentar
                    @endguest
                </h4>

                <form action="{{ route('frontend.comment', $post->id) }}" method="POST" id="main_contact_form">
                    @csrf

                    {{-- Notifikasi Sukses --}}
                    @if (session('success'))
                        <div
                            class="mb-6 p-4 rounded-lg bg-green-500/20 border border-green-500/30 text-green-300 flex items-center gap-3">
                            <span class="iconify text-2xl" data-icon="mdi:check-circle"></span>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Notifikasi Error --}}
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-lg bg-red-500/20 border border-red-500/30 text-red-300">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="iconify text-2xl" data-icon="mdi:alert-circle"></span>
                                <p class="font-semibold">Ada Kesalahan</p>
                            </div>
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @guest
                            <div>
                                <label class="block text-white/60 text-sm mb-2">Nama *</label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="John Doe" required value="{{ old('name') }}" />
                            </div>
                            <div>
                                <label class="block text-white/60 text-sm mb-2">Email *</label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all"
                                    placeholder="john@example.com" required value="{{ old('email') }}" />
                            </div>
                        @endguest

                        <div class="md:col-span-2">
                            <label class="block text-white/60 text-sm mb-2">Komentar *</label>
                            <textarea name="message" id="message" rows="5"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none text-white placeholder-white/30 transition-all resize-none"
                                placeholder="Tulis komentar Anda di sini..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit"
                                class="px-8 py-3 bg-primary-600 hover:bg-primary-500 text-white font-medium rounded-xl shadow-lg shadow-primary-900/30 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:send"></span>
                                Kirim Komentar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            var replyUrl = '{{ route('frontend.comment.reply') }}';
        </script>
    @endsection
@endif
