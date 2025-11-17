<header class="fixed top-0 left-0 w-full text-white z-40 
               bg-gradient-to-b from-black/70 to-transparent">
    <nav class="container mx-auto flex items-center justify-between px-6 py-5">
        
        <a href="/" class="flex-shrink-0">
            <img src="/asset/logo.png" alt="Logo" class="w-24"> 
        </a>

        <div class="hidden md:flex items-center gap-6 ">
            
            <a href="/" 
               class="uppercase text-sm font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
                Home
            </a>

            <a href="{{ request()->is('/') ? '#collection' : url('/') . '#collection' }}" 
               class="uppercase text-sm font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
                Collection
            </a>

            <a href="{{route('products')}}" class="uppercase text-sm font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
                Product
            </a>

            <a href="{{ request()->is('/') ? '#process' : url('/') . '#process' }}" 
               class="uppercase text-sm font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
                Process
            </a>
            
            <a href="{{ request()->is('/') ? '#article' : url('/') . '#article' }}" 
               class="uppercase text-sm font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
                Article
            </a>
        </div>
        
        <div class="flex items-center">
            <a href="/" class="hidden md:inline-block border-2 border-white px-6 py-2 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors">
                RTZ Gear
            </a>

            <button id="menu-toggle-open" class="md:hidden p-2 ml-4" aria-label="Buka menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>
</header> 


<div id="mobile-menu" class="hidden fixed inset-0 z-50 bg-black/95
                            flex-col items-center justify-center text-white">
    
    <button id="menu-toggle-close" class="absolute top-7 right-6 p-2" aria-label="Tutup menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>

    <nav class="flex flex-col items-center text-center gap-6">
        
        <a href="{{ request()->is('/') ? '#collection' : url('/') . '#collection' }}" 
           class="mobile-link uppercase text-2xl font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
            Collection
        </a>

        <a href="{{route('products')}}" 
           class="mobile-link uppercase text-2xl font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
            Product
        </a>

        <a href="{{ request()->is('/') ? '#process' : url('/') . '#process' }}" 
           class="mobile-link uppercase text-2xl font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
            Process
        </a>
        
        <a href="{{ request()->is('/') ? '#article' : url('/') . '#article' }}" 
           class="mobile-link uppercase text-2xl font-semibold tracking-wider opacity-80 hover:opacity-100 transition-opacity">
            Article
        </a>
    </nav>

    <a href="#" class="mt-10 border-2 border-white px-8 py-3 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors">
        RTZ Gear
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuOpen = document.getElementById('menu-toggle-open');
        const menuClose = document.getElementById('menu-toggle-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function openMenu() {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('flex');
            document.body.style.overflow = '';
        }

        menuOpen.addEventListener('click', openMenu);
        menuClose.addEventListener('click', closeMenu);

        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });
    });
</script>