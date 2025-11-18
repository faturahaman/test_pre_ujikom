@props([
    'product',
    'image',
    'title',
    'price',
    'specifications' => []
])

<div class="group font-inter h-full">

    <div class="flex flex-col h-full bg-white rounded-3xl shadow-lg overflow-hidden
                border border-neutral-200/60 hover:border-neutral-300
                transition duration-300 hover:shadow-2xl">

        {{-- IMAGE --}}
        <div class="relative overflow-hidden">
            <img src="{{ $image }}"
                 alt="{{ $title }}"
                 class="w-full h-64 sm:h-80 object-cover transition duration-700 
                        group-hover:scale-110 group-hover:rotate-[1deg]">

            {{-- Soft dark gradient --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent 
                        pointer-events-none"></div>
        </div>

        {{-- CONTENT --}}
        <div class="flex flex-col flex-1 p-5 sm:p-7">

            {{-- TITLE --}}
            <div class="flex-1">
                <h3 class="text-2xl font-semibold text-neutral-900 leading-tight
                           group-hover:text-neutral-700 transition">
                    {{ $title }}
                </h3>

                @php
                    $specs = collect($specifications)->take(4);
                @endphp

                {{-- SPECS --}}
                <ul class="mt-4 space-y-1.5">
                    @foreach ($specs as $spec)
                        <li class="text-sm text-neutral-600 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-neutral-800"></span>
                            {{ $spec['name'] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- PRICE --}}
            <div class="mt-5 flex items-baseline">
                <span class="text-3xl font-bold text-neutral-900 tracking-tight">
                    Rp {{ $price }}K
                </span>
                <span class="ml-1 text-sm text-neutral-500">/day</span>
            </div>

            {{-- CTA BUTTON --}}
            <button 
                @click="
                    isModalOpen = true; 
                    selectedProductId = {{ $product->id }};
                    selectedProductName = '{{ $product->name }}';
                "
                class="mt-6 w-full py-3 rounded-xl bg-neutral-900 text-white text-sm sm:text-base
                       font-medium tracking-wide shadow-md hover:shadow-lg
                       transition hover:bg-neutral-800 active:scale-[0.98]">
                Rent Now
            </button>

        </div>
    </div>

</div>
