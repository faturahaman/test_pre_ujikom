<div class="py-24 bg-black text-white" id="categories-explore">
    <div class="container mx-auto px-6">
        
        <div class="max-w-3xl mb-12">
            <p class="text-sm uppercase tracking-widest text-neutral-400"
               data-aos="fade-right"
               data-aos-duration="800">
               CATEGORIES
            </p>
            <h2 class="text-5xl md:text-6xl font-medium mt-3"
                data-aos="fade-up"
                data-aos-delay="200"
                data-aos-duration="1000">
                Explore by Type
            </h2>
        </div>

        <div id="category-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- Loop untuk 4 Item Pertama (Visible) --}}
            @foreach ($categories->take(4) as $category)
                {{-- Bungkus dengan DIV agar animasi grid aman & delay bertahap --}}
                <div data-aos="fade-up" 
                     data-aos-delay="{{ $loop->iteration * 100 }}" 
                     data-aos-offset="100">
                     
                    <x-category-card
                        :id="$category['id']"
                        :image="$category['image']"
                        :title="$category['title']"
                    />
                </div>
            @endforeach
            
            {{-- Loop untuk Item Sisanya (Hidden) --}}
            @foreach ($categories->skip(4) as $category)
                {{-- 
                    PENTING: Class 'hidden extra-category' dipindah ke Wrapper DIV 
                    supaya struktur grid tetap rapi saat di-hide/show.
                --}}
                <div class="hidden extra-category" 
                     data-aos="fade-up" 
                     data-aos-offset="50">
                     
                    <x-category-card
                        :id="$category['id']"
                        :image="$category['image']"
                        :title="$category['title']"
                        {{-- Hapus class hidden dari komponen ini, karena sudah ada di parent div --}}
                    />
                </div>
            @endforeach

        </div>

        @if ($categories->count() > 4)
            <div class="text-center mt-12"
                 data-aos="fade-in"
                 data-aos-delay="600">
                 
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
        
        if (btn) { 
            // Kita targetkan DIV wrapper yang memiliki class .extra-category
            const extraItems = document.querySelectorAll(".extra-category");
            let shown = false;

            btn.addEventListener("click", () => {
                shown = !shown;
                
                extraItems.forEach(item => {
                    item.classList.toggle("hidden", !shown);
                });
                
                btn.textContent = shown ? "Show Less" : "View All Categories";
                setTimeout(() => {
                    AOS.refresh();
                }, 300);
            });
        }
    });
</script>