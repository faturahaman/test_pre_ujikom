@extends('layouts.app')

@section('content')
    <div class="bg-black pt-32 pb-24 text-white min-h-screen">
        <div class="container mx-auto px-6">
            
            <h1 class="text-5xl md:text-7xl font-medium text-center">Latest Article</h1>

            <div class="mt-16 mb-12 flex justify-center">
              
                <form action="{{ route('article') }}" method="GET" class="flex justify-center w-full">
                    <div class="flex w-full max-w-lg rounded-lg overflow-hidden border border-neutral-700">
                        
                        <input type="text" 
                               name="search" 
                               placeholder="Search article by title..." 
                               value="{{ request('search') }}" {{-- Menjaga teks agar tidak hilang setelah enter --}}
                               class="w-full px-5 py-3 bg-neutral-800 focus:outline-none text-white placeholder-neutral-500">
                        
                        <button type="submit" 
                                class="px-6 py-3 bg-neutral-700 text-white font-semibold 
                                       hover:bg-neutral-600 transition-colors">
                            Search
                        </button>
                    </div>
                </form>
            </div>
            
            @if ($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    @foreach ($articles as $article)
                        {{-- Menggunakan komponen card yang sudah ada --}}
                        <x-article-card-secondary :article="$article" />
                    @endforeach
                    
                </div>

                {{-- Pagination --}}
                <div class="mt-16 text-white">
                    {{ $articles->links() }}
                </div>

            @else
                <div class="text-center py-12">
                    <p class="text-neutral-400 text-lg mb-4">
                        @if(request('search'))
                            No articles found matching "<span class="text-white font-semibold">{{ request('search') }}</span>".
                        @else
                            No articles found available at the moment.
                        @endif
                    </p>
                    
                    @if(request('search'))
                        <a href="{{ route('article') }}" 
                           class="inline-block px-6 py-2 border border-neutral-600 rounded-full hover:bg-white hover:text-black transition-colors text-sm">
                            Clear Search
                        </a>
                    @endif
                </div>
            @endif
            
        </div>
    </div>
@endsection