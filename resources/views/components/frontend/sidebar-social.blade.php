<!-- Stay Connected Widget -->
@if ($socialmedia->count() > 0)
    <div class="w-full">
        <!-- Widget Title -->
        <div class="mb-6">
            <h5 class="font-heading text-lg font-semibold text-white relative inline-block">
                Stay Connected
                <span
                    class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full -mb-1"></span>
            </h5>
        </div>

        <!-- Social Links Grid -->
        <div class="grid grid-cols-2 gap-3">
            @foreach ($socialmedia as $media)
                <a href="{{ $media->link }}" target="_blank" rel="noopener noreferrer"
                    class="group relative flex items-center justify-center p-4 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-lg"
                    style="background-color: {{ $media->color }}">

                    <!-- Hover Overlay -->
                    <div
                        class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <!-- Content -->
                    <div class="relative flex items-center space-x-2 text-white">
                        <i class="{{ $media->icon }} text-xl"></i>
                        <span class="font-medium text-sm">{{ $media->title }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
