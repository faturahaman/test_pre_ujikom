@props(['productName' => '', 'productId' => null])

{{-- 
  Container Modal (Overlay)
  - x-show="isModalOpen" -> Menampilkan/menyembunyikan modal
  - @keydown.escape.window -> Menutup modal saat tekan 'Esc'
--}}
<div 
    x-show="isModalOpen" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @keydown.escape.window="isModalOpen = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-6"
    style="display: none;" {{-- Sembunyikan by default --}}
>
    {{-- Konten Form Modal --}}
    <div 
        @click.away="isModalOpen = false" {{-- Tutup saat klik di luar modal --}}
        class="bg-white text-black rounded-lg shadow-xl w-full max-w-lg p-6 md:p-8"
    >
        
        {{-- Judul --}}
        <h3 class="text-2xl font-semibold mb-2">
            Rent: <span x-text="selectedProductName"></span>
        </h3>
        <p class="text-neutral-600 mb-6">
            Please fill out the form below to proceed with your rental.
        </p>

        {{-- Form --}}
        <form action="{{ route('rent.store') }}" method="POST">
            @csrf

            {{-- Input tersembunyi untuk ID kamera --}}
            <input type="hidden" name="camera_id" x-model="selectedProductId">

            <div class="space-y-4">
                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-neutral-700">Full Name</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required
                           class="mt-1 block w-full rounded-md border-neutral-300 shadow-sm focus:border-black focus:ring-black">
                </div>

                {{-- Nomor Telepon --}}
                <div>
                    <label for="nomor_telp" class="block text-sm font-medium text-neutral-700">Phone Number (WhatsApp)</label>
                    <input type="tel" name="nomor_telp" id="nomor_telp" required placeholder="e.g., 08123456789"
                           class="mt-1 block w-full rounded-md border-neutral-300 shadow-sm focus:border-black focus:ring-black">
                </div>
                
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-neutral-700">Email Address</label>
                    <input type="email" name="email" id="email" required placeholder="you@example.com"
                           class="mt-1 block w-full rounded-md border-neutral-300 shadow-sm focus:border-black focus:ring-black">
                </div>

                {{-- Tanggal Sewa --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="rent_date_start" class="block text-sm font-medium text-neutral-700">Start Date</label>
                        <input type="date" name="rent_date_start" id="rent_date_start" required
                               class="mt-1 block w-full rounded-md border-neutral-300 shadow-sm focus:border-black focus:ring-black">
                    </div>
                    <div>
                        <label for="rent_date_end" class="block text-sm font-medium text-neutral-700">End Date</label>
                        <input type="date" name="rent_date_end" id="rent_date_end" required
                               class="mt-1 block w-full rounded-md border-neutral-300 shadow-sm focus:border-black focus:ring-black">
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-8 flex justify-end gap-3">
                <button 
                    type="button"
                    @click="isModalOpen = false"
                    class="py-2.5 px-6 rounded-lg bg-neutral-200 text-neutral-800 font-medium transition hover:bg-neutral-300">
                    Cancel
                </button>
                <button 
                    type="submit"
                    class="py-2.5 px-6 rounded-lg bg-black text-white font-medium transition hover:bg-neutral-800">
                    Submit Rental
                </button>
            </div>
        </form>
    </div>
</div>