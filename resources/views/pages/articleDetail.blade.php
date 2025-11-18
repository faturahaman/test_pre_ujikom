 @extends('layouts.app')

@section('content')
    <div class="bg-black pt-32 pb-24 text-white min-h-screen">
        <div class="container mx-auto px-6">
            
            {{-- Kontainer untuk membatasi lebar teks agar mudah dibaca --}}
            <article class="max-w-4xl mx-auto">

                {{-- Tombol Kembali --}}
                <div class="mb-8">
                    <a href="{{ route('article') }}" 
                       class="inline-flex items-center text-neutral-400 hover:text-white transition-colors group">
                        
                        {{-- Ikon panah (Heroicon) --}}
                        <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Articles
                    </a>
                </div>

                {{-- Header Artikel (Judul & Tanggal) --}}
                <header class="mb-8">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium leading-tight mb-4">
                        {{ $article->title }}
                    </h1>
                    <p class="text-lg text-neutral-400">
                        {{-- Format tanggal agar mudah dibaca --}}
                        Published on {{ $article->published_at->format('F j, Y') }}
                    </p>
                </header>

                {{-- Gambar Utama Artikel --}}
                <div class="w-full h-80 md:h-[450px] rounded-lg overflow-hidden shadow-lg mb-12">
                    <img src="{{ asset('storage/' . $article->image_url) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-full object-cover">
                </div>

                
                <div class="prose prose-lg prose-invert max-w-none">
                    {!! $article->content !!}
                </div>

            </article>
            
        </div>
    </div>
@endsection