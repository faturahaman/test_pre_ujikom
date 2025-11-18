@props(['id', 'image', 'title'])

<a {{ $attributes->merge([
        'href' => route('products', ['category_id' => $id]),
        'class' => 'relative block group overflow-hidden rounded-2xl shadow-xl bg-neutral-900'
    ]) }}>

    {{-- Image --}}
    <img src="{{ $image }}"
         alt="{{ $title }}"
         class="w-full h-80 object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1">

    {{-- Dark cinematic overlay --}}
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent
                opacity-90 group-hover:opacity-80 transition duration-500"></div>

    {{-- Soft glow on hover --}}
    <div class="absolute inset-0 opacity-0 group-hover:opacity-20 transition duration-500
                bg-white mix-blend-overlay"></div>

    {{-- Bottom title block --}}
    <div class="absolute bottom-6 left-6 right-6 z-10">
        <h3 class="text-3xl font-semibold tracking-wide drop-shadow-lg">
            {{ $title }}
        </h3>
    </div>

    {{-- Border glow for hover feel --}}
    <div class="absolute inset-0 rounded-2xl border border-transparent 
                group-hover:border-neutral-700 transition duration-500"></div>

</a>
