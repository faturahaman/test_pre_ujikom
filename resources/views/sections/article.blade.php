<div class="py-16 md:py-24 bg-black text-white" id="article">
    <div class="container mx-auto px-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 md:mb-12 gap-4">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-medium">Latest Articles</h2>

            <a href="{{ route('article') }}"
               class="w-full md:w-auto text-center border border-white px-6 py-2 text-sm font-semibold uppercase tracking-wider
                      hover:bg-white hover:text-black transition-colors">
                View More Article
            </a>
        </div>

        @if ($featuredArticle)
            <x-article-card-featured :article="$featuredArticle" />
        @endif

        @if ($otherArticles->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($otherArticles as $article)
                    <x-article-card-secondary :article="$article" />
                @endforeach
            </div>
        @elseif (!$featuredArticle)
            <p class="text-neutral-500">No articles found.</p>
        @endif

    </div>
</div>
