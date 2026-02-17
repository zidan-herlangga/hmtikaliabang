<!-- Tags Widget -->
<div class="w-full">
    <!-- Widget Title -->
    <div class="mb-6">
        <h5 class="font-heading text-lg font-semibold text-white relative inline-block">
            Tags
            <span
                class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full -mb-1"></span>
        </h5>
    </div>

    <!-- Tags Cloud -->
    <div class="flex flex-wrap gap-2">
        @forelse ($tags as $tag)
            <a href="{{ route('frontend.tag', $str::slug($tag->name)) }}"
                class="group inline-flex items-center px-4 py-2 rounded-full bg-white/5 border border-white/10 text-sm text-white/70 font-medium transition-all duration-300 hover:bg-primary-600 hover:border-primary-600 hover:text-white hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary-500/20">

                <!-- Hash Icon (Optional Aesthetic) -->
                <span class="iconify mr-1 text-xs text-white/40 group-hover:text-white/80 transition-colors"
                    data-icon="mdi:pound"></span>

                {{ $tag->name }}
            </a>
        @empty
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-8 text-center w-full">
                <span class="iconify text-4xl text-white/20 mb-3" data-icon="mdi:tag-multiple-outline"></span>
                <p class="text-white/40 text-sm">No tags found</p>
            </div>
        @endforelse
    </div>
</div>
