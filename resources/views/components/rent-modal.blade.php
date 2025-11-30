{{-- File: resources/views/components/rent-modal.blade.php --}}
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
    style="display: none;"
>
    {{-- Konten Modal --}}
    <div 
        @click.away="isModalOpen = false" 
        class="bg-white text-black rounded-lg shadow-xl w-full max-w-lg p-6 md:p-8"
    >
        
        {{-- Judul (Ambil dari x-data parent) --}}
        <h3 class="text-2xl font-semibold mb-2">
            Rent: <span x-text="selectedProductName"></span>
        </h3>
        <p class="text-neutral-600 mb-6">
            Please fill out the form below to proceed with your rental.
        </p>

        {{-- Form --}}
        <form action="{{ route('rent.store') }}" method="POST">
            @csrf

            {{-- Input Hidden (Otomatis terisi dari x-model) --}}
            <input type="hidden" name="camera_id" x-model="selectedProductId">
            {{-- Kirim data hitungan ke backend jika perlu, atau biarkan backend hitung ulang --}}
            <input type="hidden" name="total_days" x-model="totalDays">
            <input type="hidden" name="total_price" x-model="totalPrice">

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
                    {{-- Start Date --}}
                    <div>
                        <label for="rent_date_start" class="block font-semibold text-gray-800 mb-1">Start Date</label>
                        {{-- 
                            @change="updateCalculation()" -> Panggil fungsi hitung saat tanggal berubah 
                        --}}
                        <input type="date" name="rent_date_start" id="rent_date_start" 
                               min="{{ date('Y-m-d') }}" required
                               x-model="startDate"
                               @change="updateCalculation()"
                               class="w-full p-3 border border-gray-300 rounded-lg focus:border-black focus:ring-black">
                    </div>
                    
                    {{-- End Date --}}
                    <div>
                        <label for="rent_date_end" class="block font-semibold text-gray-800 mb-1">End Date</label>
                        <input type="date" name="rent_date_end" id="rent_date_end" 
                               min="{{ date('Y-m-d') }}" required
                               x-model="endDate"
                               @change="updateCalculation()"
                               class="w-full p-3 border border-gray-300 rounded-lg focus:border-black focus:ring-black">
                    </div>
                </div>
            </div>

            {{-- Box Tampilan Total Harga --}}
            <div class="mt-4 p-4 border rounded-lg bg-neutral-100">
                <div class="flex justify-between items-center mb-1">
                    <span class="font-medium text-neutral-700">Total Days:</span>
                    <span class="font-bold text-lg">
                        <span x-text="totalDays"></span> day(s)
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-medium text-neutral-700">Total Price:</span>
                    <span class="font-bold text-xl text-black">
                        {{-- Memanggil fungsi helper formatRupiah --}}
                        Rp <span x-text="formatRupiah(totalPrice)"></span>
                    </span>
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