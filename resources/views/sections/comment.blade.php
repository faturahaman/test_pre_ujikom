<div class="py-24 bg-black text-white max-h-screen py-20" id="location">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-start">

        <div>
            <h2 class="text-5xl md:text-6xl font-medium mb-8">
                Our Location
            </h2>

            <div class="w-full h-80 rounded-lg bg-neutral-800 border border-neutral-700 
                        flex items-center justify-center text-neutral-500 overflow-hidden h-120">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.023533282207!2d106.80373487474987!3d-6.64388106495966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89598a51403%3A0x6b91561725983155!2sRTZ%20GEAR!5e0!3m2!1sid!2sid!4v1731828456027!5m2!1sid!2sid" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div>
            <p class="text-lg text-neutral-300">Satisfied with our Service?</p>
            <h2 class="text-5xl md:text-6xl font-medium mt-1">
                Let us know!
            </h2>

            <form action="{{ route('comment.store') }}" method="POST" class="mt-8">
                @csrf {{-- <-- PENTING --}}

                <div class="flex rounded-lg overflow-hidden border border-neutral-700 focus-within:ring-2 focus-within:ring-white">
                    <input type="text" 
                           name="comment" {{-- <-- name="comment" --}}
                           placeholder="The Message will be anonim"
                           class="w-full px-5 py-4 bg-neutral-900 
                                  focus:outline-none text-white placeholder-neutral-500">

                    <button type="submit" 
                            class="px-6 py-4 bg-white text-black font-semibold 
                                   hover:bg-neutral-300 transition-colors">
                        Send
                    </button>
                </div>

                {{-- Ini buat nampilin pesan error kalo form kosong --}}
                @error('comment')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                {{-- Ini buat nampilin pesan sukses --}}
                @if(session('success'))
                    <p class="text-green-500 text-sm mt-2">{{ session('success') }}</p>
                @endif
            </form>
        </div>

    </div>

  
</div>