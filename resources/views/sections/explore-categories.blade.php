<div class="py-24 bg-black text-white" id="categories-explore">
    <div class="container mx-auto px-6">
        
        <div class="max-w-3xl mb-12">
            <p class="text-sm uppercase tracking-widest text-neutral-400">CATEGORIES</p>
            <h2 class="text-5xl md:text-6xl font-medium mt-3">Explore by Type</h2>
        </div>

        <div id="category-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- 4 kategori pertama --}}
            @foreach ($categories->take(4) as $category)
                <a href="{{ route('products') }}?category={{ urlencode($category['title']) }}"
                   class="relative block group overflow-hidden rounded-lg shadow-lg">

                    <img src="{{ $category['image'] }}" 
                         alt="{{ $category['title'] }}" 
                         class="w-full h-80 object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>

                    <div class="absolute bottom-6 left-6 right-6 text-white z-10">
                        <h3 class="text-3xl font-semibold">{{ $category['title'] }}</h3>
                    </div>
                </a>
            @endforeach

            {{-- sisanya --}}
            @foreach ($categories->skip(4) as $category)
                <a href="{{ route('products') }}?category={{ urlencode($category['title']) }}"
                   class="relative block group overflow-hidden rounded-lg shadow-lg hidden extra-category">

                    <img src="{{ $category['image'] }}" 
                         alt="{{ $category['title'] }}" 
                         class="w-full h-80 object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>

                    <div class="absolute bottom-6 left-6 right-6 text-white z-10">
                        <h3 class="text-3xl font-semibold">{{ $category['title'] }}</h3>
                    </div>
                </a>
            @endforeach

        </div>

        @if ($categories->count() > 4)
            <div class="text-center mt-12">
                <button id="toggleCategories"
                        class="px-8 py-3 border-2 border-white uppercase tracking-wider font-medium hover:bg-white hover:text-black transition">
                    View All Categories
                </button>
            </div>
        @endif

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("toggleCategories");
        const extraItems = document.querySelectorAll(".extra-category");
        let shown = false;

        btn.addEventListener("click", () => {
            shown = !shown;
            extraItems.forEach(item => item.classList.toggle("hidden", !shown));
            btn.textContent = shown ? "Show Less" : "View All Categories";
        });
    });
</script>
