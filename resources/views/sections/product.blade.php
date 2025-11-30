{{-- File: resources/views/sections/product.blade.php --}}

<div 
    class="py-16 md:py-24 bg-black text-white" 
    id="product"
 
    x-data="{ 
        isModalOpen: false, 
        
        // Data Produk yang Dipilih
        selectedProductId: null, 
        selectedProductName: '', 
        selectedProductPrice: 0,
        
        // Data Kalkulasi Sewa
        startDate: '',
        endDate: '',
        totalDays: 0,
        totalPrice: 0,

        // FUNGSI 1: Buka Modal & Set Data Awal
        openRentModal(id, name, price) {
            this.selectedProductId = id;
            this.selectedProductName = name;
            this.selectedProductPrice = price; 
            
            // Reset form saat baru dibuka
            this.startDate = '';
            this.endDate = '';
            this.totalDays = 0;
            this.totalPrice = 0;
            
            this.isModalOpen = true;
        },

        // FUNGSI 2: Hitung Durasi & Harga Total
        updateCalculation() {
            if (this.startDate && this.endDate) {
                const start = new Date(this.startDate);
                const end = new Date(this.endDate);
                
                // Hitung selisih waktu
                const diffTime = end - start;
                // Konversi milidetik ke hari
                const days = diffTime / (1000 * 60 * 60 * 24) + 1; 

                // Validasi: Minimal 1 hari, tidak boleh minus
                this.totalDays = days > 0 ? Math.round(days) : 0;
                
                // Kalikan hari dengan harga per hari produk
                this.totalPrice = this.totalDays * this.selectedProductPrice; 
            } else {
                this.totalDays = 0;
                this.totalPrice = 0;
            }
        },

        // Helper: Format Rupiah untuk Tampilan
        formatRupiah(value) {
            return new Intl.NumberFormat('id-ID').format(value);
        }
    }"
>
    <div class="container mx-auto px-4 sm:px-6">
        
        {{-- HEADER SECTION --}}
        <div class="max-w-3xl">
            <p class="text-sm uppercase tracking-widest text-neutral-400" data-aos="fade-right">
                EXPLORE
            </p>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-medium mt-3" data-aos="fade-up">
                All Our Cameras
            </h2>
            <p class="text-base md:text-lg text-neutral-300 mt-5" data-aos="fade-up">
                Dive into our complete collection of professional cameras.
            </p>
        </div>

        {{-- PRODUCT GRID --}}
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            
            @foreach ($allCameras as $product)
                <div data-aos="fade-up"
                     data-aos-delay="{{ $loop->iteration * 100 }}">
                     
                    {{-- 
                        TRIGGER CLICK:
                        Saat kartu diklik, panggil fungsi openRentModal()
                        Parameter: ID, Nama, Harga Asli (bukan ribuan)
                    --}}
                    <div 
                        class="cursor-pointer group"
                        @click="openRentModal({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price_per_day }})"
                    >
                        <x-product-card 
                            :product="$product" 
                            :image="asset('storage/' . $product->image_url)" 
                            :title="$product->name" 
                            :price="($product->price_per_day / 1000)" 
                            :specifications="$product->specifications"                
                        />
                    </div>
                </div>
            @endforeach

        </div>

        {{-- VIEW ALL BUTTON --}}
        <div class="text-center mt-16 md:mt-20">
            <a href="/products" class="inline-block border-2 border-white px-8 py-3 text-sm font-semibold uppercase tracking-wider hover:bg-white hover:text-black transition-colors">
                VIEW ALL PRODUCTS
            </a>
        </div>

    </div>

    <x-rent-modal />

</div>