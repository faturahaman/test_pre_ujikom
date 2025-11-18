{{--
  File: resources/views/components/article-card-featured.blade.php
--}}
@props(['article'])

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-16">

    <div class="w-full h-80 md:h-96 rounded-lg overflow-hidden">
        <img src="{{ asset('storage/' . $article->image_url) }}"
             alt="{{ $article->title }}"
             class="w-full h-full object-cover">
    </div>

    <div class="border border-neutral-700 p-6 md:p-8 rounded-lg h-auto md:h-96 flex flex-col justify-center">
        
        <h3 class="text-3xl md:text-4xl font-semibold leading-snug">
            {{ $article->title }}
        </h3>

        <p class="text-neutral-400 mt-4 mb-6">
            {{ $article->excerpt }}
        </p>

        {{-- ✨ GANTI href="#" JADI INI: ✨ --}}
        <a href="{{ route('article.show', $article) }}"
           class="bg-white text-black px-6 py-2.5 rounded font-semibold text-sm self-start">
            Read More
        </a>
    </div>

</div>