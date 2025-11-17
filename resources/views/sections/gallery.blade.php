<div class="py-24 bg-black text-white overflow-hidden" id="collection">
    <h2 class="text-3xl font-light text-center mb-16 font-inter">Premium cameras And Lens</h2>
    
    <div class="space-y-8" 
         style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
                mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);">
        
        <div class="flex animate-scroll-left h-96">
            
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img src="{{ asset('storage/' . $img->image_url) }}" 
                         alt="{{ $img->name }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
            @endforeach
            
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img src="{{ asset('storage/' . $img->image_url) }}" 
                         alt="{{ $img->name }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
            @endforeach
            
        </div>
        
        <div class="flex animate-scroll-right h-96">
            
            @foreach($marqueeCameras as $img)
                <div class="flex-none w-72 md:w-96 mx-4">
                    <img src="{{ asset('storage/' . $img->image_url) }}" 
                         alt="{{ $img->name }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
            @endforeach
            
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
