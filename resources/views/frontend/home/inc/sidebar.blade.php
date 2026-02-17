<aside class="lg:col-span-1">
    <!-- Sticky Container: Hentinya 100px dari atas (top-24/96px) dengan padding top 32px (pt-8) -->
    <div class="sticky top-24 pt-8 space-y-8">

        <!-- Widget 1: Search -->
        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
            <x-frontend.sidebar-search />
        </div>

        <!-- Widget 2: Categories -->
        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
            <x-frontend.sidebar-category />
        </div>

        <!-- Widget 3: Popular Posts -->
        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
            <x-frontend.popular-posts />
        </div>

        <!-- Widget 4: Social Media -->
        {{-- <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
            <x-frontend.sidebar-social />
        </div> --}}

        <!-- Widget 5: Tags -->
        <div class="p-6 bg-dark-800/50 border border-white/10 rounded-2xl">
            <x-frontend.tags />
        </div>

    </div>
</aside>
