<div class="py-16 md:py-24 bg-black text-white" id="article">
    <div class="container mx-auto px-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 md:mb-12 gap-4">
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-medium">Latest Articles</h2>

            <a href="#"
               class="w-full md:w-auto text-center border border-white px-6 py-2 text-sm font-semibold uppercase tracking-wider
                      hover:bg-white hover:text-black transition-colors">
                View More Article
            </a>
        </div>

        @if ($featuredArticle)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-16">

                <div class="w-full h-80 md:h-96 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $featuredArticle->image_url) }}"
                         alt="{{ $featuredArticle->title }}"
                         class="w-full h-full object-cover">
                </div>

                <div class="border border-neutral-700 p-6 md:p-8 rounded-lg h-auto md:h-96 flex flex-col justify-center">
                    
                    <h3 class="text-3xl md:text-4xl font-semibold leading-snug">
                        {{ $featuredArticle->title }}
                    </h3>

                    <p class="text-neutral-400 mt-4 mb-6">
                        {{ $featuredArticle->excerpt }}
                    </p>

                    <a href="#"
                       class="bg-white text-black px-6 py-2.5 rounded font-semibold text-sm self-start">
                        Read More
                    </a>
                </div>

            </div>
        @endif

        @if ($otherArticles->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @foreach ($otherArticles as $article)
                    <a href="#"
                       class="relative block group rounded-lg overflow-hidden shadow-lg h-80 md:h-96">

                        <img src="{{ asset('storage/' . $article->image_url) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent"></div>

                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <h3 class="text-xl md:text-2xl font-semibold leading-tight">
                                {{ $article->title }}
                            </h3>
                        </div>

                    </a>
                @endforeach

            </div>

        @elseif (!$featuredArticle)
            <p class="text-neutral-500">No articles found.</p>
        @endif

    </div>
</div>