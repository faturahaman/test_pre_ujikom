@extends('layouts.app')

@section('content')
    {{-- pt-32 (padding-top) biar gak ketutupan navbar 'fixed' --}}
    <div class="bg-black pt-32 pb-24 text-white min-h-screen">
        <div class="container mx-auto px-6">
            
            <h1 class="text-5xl md:text-7xl font-medium text-center">Our Product</h1>

            <div class="mt-16 mb-12">
            
                {{-- Form nembak ke route 'products' (GET) --}}
                <form action="{{ route('products') }}" method="GET" class="flex justify-center">
                    <div class="flex w-full max-w-lg rounded-lg overflow-hidden border border-neutral-700">
                        <input type="text" 
                               name="search" 
                               placeholder="Search camera by name..." 
                               value="{{ request('search') }}" {{-- Biar teks search gak ilang --}}
                               class="w-full px-5 py-3 bg-neutral-800 focus:outline-none text-white placeholder-neutral-500">
                        
                        <button type="submit" 
                                class="px-6 py-3 bg-neutral-700 text-white font-semibold 
                                       hover:bg-neutral-600 transition-colors">
                            Search
                        </button>
                    </div>
                    
                    {{-- Input hidden biar filter-nya gak ilang pas lagi search --}}
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                </form>

                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    
                    {{-- 'search' => request('search') biar query search gak ilang pas ganti filter --}}
                    <a href="{{ route('products', ['search' => request('search')]) }}" 
                       class="px-5 py-2 rounded-full text-sm font-medium transition-colors
                              {{ !$activeCategory ? 'bg-white text-black' : 'bg-neutral-800 hover:bg-neutral-700' }}">
                        All
                    </a>
                    
                    @foreach ($categories as $category)
                        <a href="{{ route('products', ['category_id' => $category->id, 'search' => request('search')]) }}"
                           class="px-5 py-2 rounded-full text-sm font-medium transition-colors
                                  {{ $activeCategory == $category->id ? 'bg-white text-black' : 'bg-neutral-800 hover:bg-neutral-700' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if ($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    {{-- Loop data $products (udah difilter/search) --}}
                    @foreach ($products as $product)
                        {{-- Panggil component card lu --}}
                        <x-product-card 
                            :image="asset('storage/' . $product->image_url)" 
                            :title="$product->name" 
                            :price="($product->price_per_day / 1000)" 
                            :specifications="$product->specifications" 
                        />
                    @endforeach
                    
                </div>

                <div class="mt-16 text-white">
                    {{ $products->links() }}
                </div>
            @else
                <p class="text-center text-neutral-400 text-lg">No products found matching your criteria.</p>
            @endif
            
        </div>
    </div>
@endsection