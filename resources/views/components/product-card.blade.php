@props(['image', 'title', 'price', 'specifications' => []])

<a href="#" class="block group font-inter h-full">
    
    <div class="flex flex-col h-full bg-white rounded-2xl shadow-lg overflow-hidden 
                transition-shadow duration-300 group-hover:shadow-2xl">

        <div class="overflow-hidden">
            <img src="{{ $image }}" 
                 alt="{{ $title }}" 
                 class="w-full h-64 sm:h-80 object-cover 
                        transition-transform duration-500 group-hover:scale-110">
        </div>

        <div class="flex flex-col flex-1 p-4 sm:p-6">
            
            <div class="flex-1">
                <h3 class="text-xl sm:text-2xl font-semibold tracking-tight text-neutral-900 
                           group-hover:text-neutral-700 transition">
                    {{ $title }}
                </h3>

                @php
                    $specs = collect($specifications)->take(4);
                @endphp

                <ul class="mt-4 space-y-1">
                    @foreach ($specs as $spec)
                        <li class="text-sm text-neutral-600 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-neutral-800 rounded-full"></span>
                            {{ $spec['name'] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            
            <div class="mt-4 flex items-baseline gap-1">
                <span class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900">Rp {{ $price }}K</span>
                <span class="text-sm text-neutral-500">/day</span>
            </div>

            <button 
                class="mt-5 w-full py-2.5 rounded-xl bg-neutral-900 text-white 
                       font-medium tracking-wide transition 
                       group-hover:bg-neutral-800">
                Rent Now
            </button>
        </div>

    </div>
</a>