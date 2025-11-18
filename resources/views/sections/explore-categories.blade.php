<div class="py-24 bg-black text-white" id="categories-explore">
    <div class="container mx-auto px-6">
        
        <div class="max-w-3xl mb-12">
            <p class="text-sm uppercase tracking-widest text-neutral-400">CATEGORIES</p>
            <h2 class="text-5xl md:text-6xl font-medium mt-3">Explore by Type</h2>
        </div>

        <div id="category-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @foreach ($categories->take(4) as $category)
                <x-category-card
                    :id="$category['id']"
                    :image="$category['image']"
                    :title="$category['title']"
                />
            @endforeach
            
            @foreach ($categories->skip(4) as $category)
                <x-category-card
                    :id="$category['id']"
                    :image="$category['image']"
                    :title="$category['title']"
                    class="hidden extra-category" {{-- <-- Kelasnya di-passing ke komponen --}}
                />
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

{{-- 
  Script lu udah bener, nggak perlu diubah.
  Dia bakal tetep nemuin '.extra-category'
--}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("toggleCategories");
        if (btn) { // <-- Saya tambahin 'if (btn)' biar lebih aman
            const extraItems = document.querySelectorAll(".extra-category");
            let shown = false;

            btn.addEventListener("click", () => {
                shown = !shown;
                extraItems.forEach(item => item.classList.toggle("hidden", !shown));
                btn.textContent = shown ? "Show Less" : "View All Categories";
            });
        }
    });
</script>