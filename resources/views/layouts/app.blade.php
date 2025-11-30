<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Camera</title> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body, html {
            overflow-x: hidden;
        }
    </style>
</head>
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Permintaan Terkirim!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'yes, i will be waiting!',
                confirmButtonColor: '#000000', 
                iconColor: '#000000'
            });
        });
    </script>
@endif
<body class="bg-black text-white antialiased"> 
    
    <x-navbar />

    <main>
       @yield('content')
    </main>

    <x-footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,    // Animasi hanya berjalan sekali (tidak berulang saat scroll naik)
            duration: 800, // Durasi default animasi (opsional, biar seragam)
        });
    </script>
</body>
</html>