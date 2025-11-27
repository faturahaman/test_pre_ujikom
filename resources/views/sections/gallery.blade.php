<div class="py-24 bg-black text-white overflow-hidden" id="collection">
    
    {{-- Section Title --}}
    <h2 class="text-3xl font-light text-center mb-16 font-inter"
        data-aos="fade-up"
        data-aos-duration="1000">
        Premium cameras And Lens
    </h2>
    
    <div class="space-y-8" 
         style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
                mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);">
        
        {{-- Row 1: Left Scroll --}}
        <div class="flex animate-scroll-left h-96"
             data-aos="fade-up"
             data-aos-delay="200"
             data-aos-offset="200">
            
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img src="{{ asset('storage/' . $img->image_url) }}" 
                         alt="{{ $img->name }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
            @endforeach
            
            {{-- Duplicate for Loop --}}
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img src="{{ asset('storage/' . $img->image_url) }}" 
                         alt="{{ $img->name }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
            @endforeach
            
        </div>
        
        {{-- Row 2: Right Scroll --}}
        <div class="flex animate-scroll-right h-96"
             data-aos="fade-up"
             data-aos-delay="400"
             data-aos-offset="200">
            
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img src="{{ asset('storage/' . $img->image_url) }}" 
                         alt="{{ $img->name }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
            @endforeach
            
            {{-- Duplicate for Loop --}}
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img 
                        src="{{ asset('storage/' . $img->image_url) }}" 
                        alt="{{ $img->name }}" 
                        class="w-full h-full object-cover rounded-lg"
                    >
                </div>
            @endforeach

        </div>

    </div>
</div>