{{--
  File: resources/views/components/article-card-secondary.blade.php
--}}
@props(['article'])
<a href="{{ route('article.show', $article) }}" 
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