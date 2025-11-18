{{-- 
  File: resources/views/sections/product.blade.php
  (Atau di mana pun file section produk Anda berada)
--}}

<div 
    class="py-16 md:py-24 bg-black text-white" 
    id="product"
    x-data="{ isModalOpen: false, selectedProductId: null, selectedProductName: '' }"
>
    <div class="container mx-auto px-4 sm:px-6">
        
        <div class="max-w-3xl">
            <p class="text-sm uppercase tracking-widest text-neutral-400">
                EXPLORE
            </p>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-medium mt-3">
                All Our Cameras
            </h2>
            <p class="text-base md:text-lg text-neutral-300 mt-5">
                Dive into our complete collection of professional cameras and find the perfect match for your creative vision.
            </p>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            
            @foreach ($allCameras as $product)
                <x-product-card 
                    :product="$product" {{-- Passing seluruh data produk --}}
                    
                    {{-- ✨ PERBAIKAN DI SINI: Ganti '/' menjadi '.' ✨ --}}
                    :image="asset('storage/' . $product->image_url)" 

                    :title="$product->name" 
                    :price="($product->price_per_day / 1000)" 
                    :specifications="$product->specifications"                
                />
            @endforeach

        </div>

        <div class="text-center mt-16 md:mt-20">
            <a href="/products" class="inline-block border-2 border-white px-8 py-3 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors">
                VIEW ALL PRODUCTS
            </a>
        </div>

    </div>

    {{-- Panggil komponen modal di sini --}}
    <x-rent-modal />

</div>