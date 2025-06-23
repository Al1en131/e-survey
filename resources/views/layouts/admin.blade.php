<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <style>
        .disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased   ">
    <div class="flex flex-col min-h-screen">
        @include('layouts.navigation-admin')
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <main class="flex-grow">
            <div class="mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
        <footer class="py-7 text-center text-sm text-white bg-secondary">
            @include('layouts.footer')
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <div align="center" class="succes-alert">
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    function showSuccessAlert() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '{{ session('success') }}',
                        });
                    }
                    showSuccessAlert();
                });
            </script>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('table-search');
            const surveyTitles = document.querySelectorAll(
                '.survey-title'); // tambahkan class 'survey-title' pada judul survey
            const errorMessage = document.getElementById('error-message');
    
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim(); // Trim dan ubah menjadi huruf kecil
    
                let hasError = true; // Set default keadaan error
    
                surveyTitles.forEach(title => {
                    const surveyTitle = title.textContent.toLowerCase(); // Ambil teks judul survey
                    const surveyRow = title.closest(
                        'tr'); // Dapatkan baris yang berisi judul survey
    
                    if (surveyTitle.includes(query)) { // Cocokkan dengan query
                        surveyRow.style.display = ''; // Tampilkan baris jika cocok
                        hasError = false; // Set keadaan error menjadi false karena judul ditemukan
                    } else {
                        surveyRow.style.display = 'none'; // Sembunyikan jika tidak cocok
                    }
                });
    
                // Tampilkan atau sembunyikan pesan kesalahan
                errorMessage.classList.toggle('hidden', !hasError);
            });
    
            // Ambil semua tombol dengan class "delete"
            const deleteButtons = document.querySelectorAll('.delete');
    
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah tindakan default tautan
    
                    const surveyId = this.getAttribute(
                        'data-id'); // Ambil ID survey dari atribut data-id
                    const deleteUrl =
                        `/admin/survey/${surveyId}/delete`; // Ganti dengan rute Laravel Anda
    
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#275279",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Arahkan ke rute penghapusan
                            window.location.href = deleteUrl;
                        }
                    });
                });
            });
    
            // Ambil semua tombol dengan class "copy-button"
            const copyButtons = document.querySelectorAll('.copy-button');
    
            copyButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah tindakan default tautan
    
                    // Ambil nilai dari atribut data-slug
                    const slug = this.getAttribute('data-slug');
    
                    // Buat elemen textarea
                    const textarea = document.createElement('textarea');
                    textarea.value = slug;
    
                    // Pastikan textarea tidak terlihat dan tambahkan ke body
                    textarea.style.position = 'fixed';
                    textarea.style.opacity = 0;
                    document.body.appendChild(textarea);
    
                    // Pilih dan salin teks
                    textarea.select();
                    document.execCommand('copy');
    
                    // Hapus textarea
                    document.body.removeChild(textarea);
    
                    // Optional: Berikan notifikasi kepada pengguna bahwa teks telah disalin
                    Swal.fire({
                        title: "Copied",
                        text: "Successfully copied to the clipboard",
                        icon: "success"
                    });
                });
            });
        });
    </script>
</body>

</html>
