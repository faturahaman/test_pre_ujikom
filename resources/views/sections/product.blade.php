{{-- 
  File: resources/views/sections/product.blade.php
--}}

<div 
    class="py-16 md:py-24 bg-black text-white" 
    id="product"
    x-data="{ isModalOpen: false, selectedProductId: null, selectedProductName: '' }"
>
    <div class="container mx-auto px-4 sm:px-6">
        
        {{-- HEADER SECTION --}}
        <div class="max-w-3xl">
            <p class="text-sm uppercase tracking-widest text-neutral-400"
               data-aos="fade-right"
               data-aos-duration="800">
                EXPLORE
            </p>
            
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-medium mt-3"
                data-aos="fade-up"
                data-aos-delay="200"
                data-aos-duration="1000">
                All Our Cameras
            </h2>
            
            <p class="text-base md:text-lg text-neutral-300 mt-5"
               data-aos="fade-up"
               data-aos-delay="300"
               data-aos-duration="1000">
                Dive into our complete collection of professional cameras and find the perfect match for your creative vision.
            </p>
        </div>

        {{-- PRODUCT GRID --}}
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            
            @foreach ($allCameras as $product)
                <div data-aos="fade-up"
                     data-aos-delay="{{ $loop->iteration * 100 }}"
                     data-aos-offset="100">
                     
                    <x-product-card 
                        :product="$product" 
                        :image="asset('storage/' . $product->image_url)" 
                        :title="$product->name" 
                        :price="($product->price_per_day / 1000)" 
                        :specifications="$product->specifications"                
                    />
                </div>
            @endforeach

        </div>

        {{-- VIEW ALL BUTTON --}}
        <div class="text-center mt-16 md:mt-20"
             data-aos="fade-in"
             data-aos-delay="600"
             data-aos-offset="50">
             
            <a href="/products" class="inline-block border-2 border-white px-8 py-3 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors">
                VIEW ALL PRODUCTS
            </a>
        </div>

    </div>

    <x-rent-modal />

</div>