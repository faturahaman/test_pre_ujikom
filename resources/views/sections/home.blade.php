<div class="relative h-screen flex items-center justify-center text-white text-center" id="home">
            
  {{-- Hero Background --}}
  <div class="absolute inset-0 bg-cover bg-center brightness-[.3] md:bg-[20%_50%]" 
     style="background-image: url('{{ asset('asset/bgutama.jpeg') }}');"
     data-aos="fade"
     data-aos-duration="1500">
    
    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black to-transparent"></div>
  </div>
    
    <div class="relative z-10 flex flex-col items-center p-4">
        
        {{-- Main Title --}}
        <h1 class="text-5xl md:text-8xl italic font-light uppercase" style="letter-spacing: 2px;"
            data-aos="zoom-out"
            data-aos-duration="1000">
            Craft <br> Your Own <br> <span class="font-medium"> Vision</span>
        </h1>

        {{-- Subtitle / Description --}}
        <p class="mt-4 text-base opacity-90 w-full max-w-xl md:text-lg md:w-180"
           data-aos="fade-up"
           data-aos-delay="400">
            Experience the finest collection of professional cameras and equipment. Where artistry meets precision.
        </p>
        
        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-col sm:flex-row gap-4 sm:gap-12">
            <a href="/products" 
               class="w-full sm:w-auto border-2 border-white px-6 py-3 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors"
               data-aos="fade-up"
               data-aos-delay="600">
                Explore Product
            </a>

            <a href="#collection" 
               class="w-full sm:w-auto border-2 border-white px-6 py-3 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors"
               data-aos="fade-up"
               data-aos-delay="800">
                Collection
            </a>
        </div>
    </div>
    
</div>

{{-- Scroll Indicator --}}
<div class="py-10 md:py-20 flex flex-col items-center gap-2"
     data-aos="fade-in"
     data-aos-delay="1000"
     data-aos-offset="-50">
     
     <x-bi-mouse-fill class="animate-bounce" />
     <h2 class="text-base md:text-xl font-light">Scroll for more</h2>
</div>