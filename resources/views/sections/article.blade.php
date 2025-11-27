<div class="py-16 md:py-24 bg-black text-white" id="article">
    <div class="container mx-auto px-6">

        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 md:mb-12 gap-4">
            
            {{-- Judul: Muncul dari kiri --}}
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-medium"
                data-aos="fade-right"
                data-aos-duration="1000">
                Latest Articles
            </h2>

            {{-- Tombol: Muncul dari kanan (counterbalance judul) + delay sedikit --}}
            <a href="{{ route('article') }}"
               class="w-full md:w-auto text-center border border-white px-6 py-2 text-sm font-semibold uppercase tracking-wider
                      hover:bg-white hover:text-black transition-colors"
               data-aos="fade-left"
               data-aos-delay="200"
               data-aos-offset="10">
                View More Article
            </a>
        </div>

        {{-- Featured Article (Big Card) --}}
        @if ($featuredArticle)
            {{-- Bungkus component blade dengan div agar bisa dikasih AOS --}}
            <div data-aos="fade-up" 
                 data-aos-duration="1200"
                 class="mb-12"> {{-- Tambah margin bottom biar ada jarak dengan grid bawah --}}
                <x-article-card-featured :article="$featuredArticle" />
            </div>
        @endif

        {{-- Grid Secondary Articles --}}
        @if ($otherArticles->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($otherArticles as $article)
                
                    <div data-aos="fade-up" 
                         data-aos-delay="{{ $loop->iteration * 150 }}"
                         data-aos-offset="100">
                        <x-article-card-secondary :article="$article" />
                    </div>
                @endforeach
            </div>
        @elseif (!$featuredArticle)
            <p class="text-neutral-500" data-aos="fade-in">No articles found.</p>
        @endif

    </div>
</div>