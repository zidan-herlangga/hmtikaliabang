<!-- Search Widget -->
<div class="w-full">
    <!-- Widget Title -->
    <div class="mb-6">
        <h5 class="font-heading text-lg font-semibold text-white relative inline-block">
            Search
            <span
                class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-primary-500 to-accent-400 rounded-full -mb-1"></span>
        </h5>
    </div>

    <!-- Search Form -->
    <form action="{{ route('frontend.search') }}" class="relative group">
        <input type="search" name="q"
            value="{{ request()->route()->getName() == 'frontend.search' ? request()->q : '' }}"
            placeholder="Search posts..."
            class="w-full px-4 py-3.5 pl-12 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 outline-none transition-all duration-300 focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 focus:bg-white/10">

        <!-- Search Icon -->
        <span
            class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-xl text-white/40 group-focus-within:text-primary-400 transition-colors duration-300"
            data-icon="mdi:magnify"></span>

        <!-- Submit Button (Optional: appears on focus or always visible) -->
        <button type="submit"
            class="absolute right-2 top-1/2 -translate-y-1/2 p-2 rounded-lg bg-primary-600 text-white opacity-0 group-focus-within:opacity-100 hover:bg-primary-500 transition-all duration-300 transform hover:scale-105">
            <span class="iconify text-lg" data-icon="mdi:arrow-right"></span>
        </button>
    </form>
</div>
