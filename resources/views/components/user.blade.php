<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>HomioKlin</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('gambar/g8.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('sweetalert::alert')

        <style>
            .swiper-container {
                position: relative;
            }

            .swiper-button-prev, .swiper-button-next, .swiper-pagination {
                position: absolute;
                z-index: 10;
            }

            .swiper-button-prev {
                left: 0px;
                top: 50%;
                transform: translateY(-50%);
            }

            .swiper-button-next {
                right: 0px;
                top: 50%;
                transform: translateY(-50%);
            }

            .swiper-pagination {
                bottom: 50px;
                text-align: center;
                width: 100%;
            }
        </style>
    </head>
    <body class="font-montserrat antialiased bg-yellow-100">
        @include('layouts.navbar')
        <div style="color-scheme: light;">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Swiper JS -->
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

        <script>
            function truncateText(maxWords) {
              const containers = document.querySelectorAll('.text-container');

              containers.forEach(container => {
                const words = container.innerText.split(' ');

                if (words.length > maxWords) {
                  const truncated = words.slice(0, maxWords).join(' ') + '...';
                  container.innerText = truncated;
                }
              });
            }

            truncateText(20);
        </script>

        @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
        @endif

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const swiper = new Swiper('.swiper-container', {
                    slidesPerView: 3,
                    spaceBetween: 25,
                    loop: true,
                    centerSlide: "true",
                    fade: "true",
                    grabCursor: "true",
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },

                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                        },
                        520: {
                            slidesPerView: 2,
                        },
                        950: {
                            slidesPerView: 3,
                        },
                    },
                });
            });
        </script>
    </body>
</html>
