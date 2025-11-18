<div class="py-24 bg-black text-white" id="location">
    
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
    

        <!-- LOCATION MAP -->
        <div>
            <h2 class="text-5xl md:text-6xl font-medium mb-8">Our Location</h2>

            <div class="w-full h-80 rounded-lg bg-neutral-800 border border-neutral-700 
                        flex items-center justify-center text-neutral-500 overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7484311999774!2d106.77196987557835!3d-6.5534112640655025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c386205f18f9%3A0xaf869d94c5b9c42a!2sSMK%20AK%20Nusa%20Bangsa!5e0!3m2!1sid!2sid!4v1763485706997!5m2!1sid!2sid"
                    width="100%" 
                    height="100%" 
                    style="border: 0;" 
                    allowfullscreen 
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- COMMENT FORM -->
        <div>
            <p class="text-lg text-neutral-300">Satisfied with our Service?</p>
            <h2 class="text-5xl md:text-6xl font-medium mt-1">Let us know!</h2>

            <form action="{{ route('comment.store') }}" method="POST" class="mt-8">
                @csrf

                <div class="flex rounded-lg overflow-hidden border border-neutral-700 
                            focus-within:ring-2 focus-within:ring-white">
                    <input 
                        type="text" 
                        name="comment"
                        placeholder="The Message will be anonim"
                        class="w-full px-5 py-4 bg-neutral-900 text-white placeholder-neutral-500 focus:outline-none">

                    <button 
                        type="submit" 
                        class="px-6 py-4 bg-white text-black font-semibold 
                               hover:bg-neutral-300 transition-colors">
                        Send
                    </button>
                </div>

                @error('comment')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                @if(session('success'))
                    <p class="text-green-500 text-sm mt-2">{{ session('success') }}</p>
                @endif
            </form>
        </div>

    </div>
</div>
