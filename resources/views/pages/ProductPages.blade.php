@extends('layouts.app')

@section('content')
   
    <div class="bg-black pt-32 pb-24 text-white min-h-screen"
         x-data="{ isModalOpen: false, selectedProductId: null, selectedProductName: '' }">
         
        <div class="container mx-auto px-6">
            
            <h1 class="text-5xl md:text-7xl font-medium text-center">Our Product</h1>

            <div class="mt-16 mb-12">
            
                {{-- Form Search --}}
                <form action="{{ route('products') }}" method="GET" class="flex justify-center">
                    <div class="flex w-full max-w-lg rounded-lg overflow-hidden border border-neutral-700">
                        <input type="text" 
                               name="search" 
                               placeholder="Search camera by name..." 
                               value="{{ request('search') }}"
                               class="w-full px-5 py-3 bg-neutral-800 focus:outline-none text-white placeholder-neutral-500">
                        
                        <button type="submit" 
                                class="px-6 py-3 bg-neutral-700 text-white font-semibold 
                                       hover:bg-neutral-600 transition-colors">
                            Search
                        </button>
                    </div>
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                </form>

                {{-- Filter Categories --}}
                <div class="mt-8 flex flex-wrap justify-center gap-3">
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                    
                    @foreach ($products as $product) 
                        <x-product-card 
                            :product="$product" 
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
                <p class="text-center text-neutral-400 text-lg">
                    No products found.
                </p>
            @endif
            
        </div>

       
        <x-rent-modal 
    productName="selectedProductName" 
    productId="selectedProductId"
    productPrice="selectedProductPrice"
/>


    </div>
@endsection