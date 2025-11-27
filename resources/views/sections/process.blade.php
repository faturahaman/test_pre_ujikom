@php
    $testimonials = $Comments;
@endphp

<div class="py-24 bg-black text-white" id="process">
    <div class="container mx-auto px-6">

        {{-- HEADER SECTION --}}
        <div class="text-center mb-20 max-w-3xl mx-auto">
            <p class="text-sm uppercase tracking-widest text-neutral-400"
               data-aos="fade-right"
               data-aos-duration="800">
               Simple Process
            </p>
            <h2 class="text-5xl md:text-6xl font-medium mt-3"
                data-aos="fade-up"
                data-aos-delay="200"
                data-aos-duration="1000">
                How It Works?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16 lg:gap-y-0">

            {{-- STEP 1: Delay 0ms --}}
            <div class="text-center flex flex-col items-center"
                 data-aos="fade-up"
                 data-aos-delay="0">
                <div class="relative w-full flex items-center justify-center" style="height: 200px;">
                    <div class="w-full h-full border border-neutral-700"></div>
                    <svg class="w-16 h-16 text-white absolute" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                    {{-- Angka dikasih zoom-in biar nge-pop --}}
                    <div class="absolute -bottom-8 w-20 h-20 bg-white text-black flex items-center justify-center"
                         data-aos="zoom-in" data-aos-delay="200">
                        <span class="text-4xl font-bold">1</span>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-xl font-semibold">Browse & Select</h3>
                    <p class="text-neutral-400 mt-2 text-sm leading-relaxed px-2">Choose from our extensive collection of professional cameras and equipment.</p>
                </div>
            </div>

            {{-- STEP 2: Delay 200ms --}}
            <div class="text-center flex flex-col items-center"
                 data-aos="fade-up"
                 data-aos-delay="200">
                <div class="relative w-full flex items-center justify-center" style="height: 200px;">
                    <div class="w-full h-full border border-neutral-700"></div>
                    <svg class="w-16 h-16 text-white absolute" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM5 11a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
                    <div class="absolute -bottom-8 w-20 h-20 bg-white text-black flex items-center justify-center"
                         data-aos="zoom-in" data-aos-delay="400">
                        <span class="text-4xl font-bold">2</span>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-xl font-semibold">Pick Your Dates</h3>
                    <p class="text-neutral-400 mt-2 text-sm leading-relaxed px-2">Chat our CS, then select your rental period - daily, weekly, or monthly options available.</p>
                </div>
            </div>

            {{-- STEP 3: Delay 400ms --}}
            <div class="text-center flex flex-col items-center"
                 data-aos="fade-up"
                 data-aos-delay="400">
                <div class="relative w-full flex items-center justify-center" style="height: 200px;">
                    <div class="w-full h-full border border-neutral-700"></div>
                    <svg class="w-16 h-16 text-white absolute" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zM7.5 14.79l-2.218-.887L1.846 12.5l2.404.961L7.5 14.79zM11 13.5l-2.218-.887L7.5 13.61l2.404.961L11 13.5zM14.154 12.5l-2.404.961L11 14.79l2.218-.887L14.154 12.5zM10.404 2L7.5 3.113l-2.218-.887L1.846 3.5l2.404.961L10.404 2zM1.846 3.5l2.404.961L1.846 5.423L1.846 3.5zM1.846 5.423l2.404.961L1.846 7.345V5.423zM1.846 7.345l2.404.961L1.846 9.267V7.345zM1.846 9.267l2.404.961L1.846 11.19V9.267zM1.846 11.19l2.404.961L1.846 12.5V11.19zM14.154 3.5l-2.404.961L14.154 5.423V3.5zM14.154 5.423l-2.404.961L14.154 7.345V5.423zM14.154 7.345l-2.404.961L14.154 9.267V7.345zM14.154 9.267l-2.404.961L14.154 11.19V9.267zM14.154 11.19l-2.404.961L14.154 12.5V11.19z"/></svg>
                    <div class="absolute -bottom-8 w-20 h-20 bg-white text-black flex items-center justify-center"
                         data-aos="zoom-in" data-aos-delay="600">
                        <span class="text-4xl font-bold">3</span>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-xl font-semibold">Browse & Select</h3>
                    <p class="text-neutral-400 mt-2 text-sm leading-relaxed px-2">Get your gear delivered or pick it up from our location.</p>
                </div>
            </div>

            {{-- STEP 4: Delay 600ms --}}
            <div class="text-center flex flex-col items-center"
                 data-aos="fade-up"
                 data-aos-delay="600">
                <div class="relative w-full flex items-center justify-center" style="height: 200px;">
                    <div class="w-full h-full border border-neutral-700"></div>
                    <svg class="w-16 h-16 text-white absolute" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
                    <div class="absolute -bottom-8 w-20 h-20 bg-white text-black flex items-center justify-center"
                         data-aos="zoom-in" data-aos-delay="800">
                        <span class="text-4xl font-bold">4</span>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-xl font-semibold">Shoot & Return</h3>
                    <p class="text-neutral-400 mt-2 text-sm leading-relaxed px-2">Create amazing content and return the equipment when you're done.</p>
                </div>
            </div>

        </div>
    </div>

    {{-- TESTIMONIAL MARQUEE --}}
    <div class="mt-24 py-16 bg-black text-white border-t border-b border-neutral-800 space-y-8">

        {{-- Row 1: Fade Up --}}
        <div class="overflow-hidden" 
             data-aos="fade-up" 
             data-aos-delay="100"
             data-aos-offset="50">
            <div class="flex marquee-random whitespace-nowrap">
                @foreach ($testimonials as $text)
                    <p class="mx-10 text-2xl italic font-light text-neutral-300">"{{ $text['comment'] }}"</p>
                @endforeach
                @foreach ($testimonials as $text)
                    <p class="mx-10 text-2xl italic font-light text-neutral-300">"{{ $text['comment'] }}"</p>
                @endforeach
            </div>
        </div>

        {{-- Row 2: Fade Up --}}
        <div class="overflow-hidden" 
             data-aos="fade-up" 
             data-aos-delay="200"
             data-aos-offset="50">
            <div class="flex marquee-random whitespace-nowrap">
                @foreach ($testimonials as $text)
                    <p class="mx-10 text-2xl italic font-light text-neutral-300">"{{ $text['comment'] }}"</p>
                @endforeach
                @foreach ($testimonials as $text)
                    <p class="mx-10 text-2xl italic font-light text-neutral-300">"{{ $text['comment'] }}"</p>
                @endforeach
            </div>
        </div>

        {{-- Row 3: Fade Up  --}}
        <div class="overflow-hidden" 
             data-aos="fade-up" 
             data-aos-delay="300"
             data-aos-offset="50">
            <div class="flex marquee-random whitespace-nowrap">
                @foreach ($testimonials as $text)
                    <p class="mx-10 text-2xl italic font-light text-neutral-300">"{{ $text['comment'] }}"</p>
                @endforeach
                @foreach ($testimonials as $text)
                    <p class="mx-10 text-2xl italic font-light text-neutral-300">"{{ $text['comment'] }}"</p>
                @endforeach
            </div>
        </div>

    </div>
</div>

<script>
document.querySelectorAll('.marquee-random').forEach(el => {
    const duration = Math.floor(Math.random() * 15) + 20;
    const delay = Math.floor(Math.random() * 10) * -1;
    const direction = Math.random() > 0.5 ? 'marquee-left' : 'marquee-right';
    el.style.animation = `${direction} ${duration}s linear infinite`;
    el.style.animationDelay = `${delay}s`;
});
</script>