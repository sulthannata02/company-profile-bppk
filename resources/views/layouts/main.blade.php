<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'Berkah Putra Putri Karawang')</title>
        @vite('resources/css/app.css')

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/logo-bppk.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
            integrity="sha512-omJYb+...dll"
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link
            href="https://unpkg.com/aos@2.3.4/dist/aos.css"
            rel="stylesheet"
        />

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />

        <style>
            html {
                scroll-behavior: smooth;
            }

            .fade-in {
                animation: fadeIn 0.5s ease-in-out forwards;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .mobilSwiper {
                padding-bottom: 60px;
            }

            /* Link Partnerships */
            .link-underline {
                position: relative;
                display: inline-block;
            }

            .link-underline::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: -4px;
                width: 100%;
                height: 2px;
                background-color: #2563eb; /* blue-600 */
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.3s ease;
            }

            .link-underline:hover::after {
                transform: scaleX(1);
            }
        </style>
    </head>

    <body class="bg-gray-50 text-gray-800">
        <!-- Header -->
        <header
            class="bg-gradient-to-r from-blue-700 to-blue-500 text-white shadow-lg sticky top-0 z-50 fade-in"
        >
            <div
                class="container mx-auto px-6 py-4 flex justify-between items-center"
            >
                <!-- Logo + Nama -->
                <div class="flex items-center gap-3 min-w-0">
                    <img
                        src="/assets/logo-bppk.png"
                        alt="Logo BPPK"
                        class="h-10 w-auto md:h-12 object-contain flex-shrink-0"
                    />

                    <!-- Nama Website Responsive -->
                    <span
                        class="font-bold tracking-wide text-lg md:text-2xl whitespace-nowrap overflow-hidden text-ellipsis"
                    >
                        Berkah Putra Putri Karawang
                    </span>
                </div>

                <!-- Tombol Hamburger -->
                <button
                    id="menu-btn"
                    class="md:hidden text-white focus:outline-none"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>

                <!-- Navigasi -->
                <nav
                    id="menu"
                    class="hidden md:flex md:space-x-6 absolute md:static top-full left-0 w-full md:w-auto bg-blue-600 md:bg-transparent text-center transition-all duration-300 ease-in-out"
                >
                    <ul
                        class="flex flex-col md:flex-row md:items-center md:space-x-6"
                    >
                        <li>
                            <a
                                href="/"
                                class="block py-3 md:py-0 hover:text-gray-200 transition"
                            >
                                {{ __('home.navbar_home') }}
                            </a>
                        </li>
                        <li class="relative group">
                            <a
                                class="flex items-center gap-1 py-3 md:py-0 hover:text-gray-200 transition"
                            >
                                {{ __('home.navbar_about') }}
                                <!-- Icon panah -->
                                <svg
                                    class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>
                            </a>

                            <!-- Dropdown Menu -->
                            <ul
                                class="absolute left-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50"
                            >
                                <li>
                                    <a
                                        href="#visi-misi"
                                        class="block px-4 py-2 hover:bg-gray-100 transition"
                                    >
                                        {{ __('home.dropdown_vision') }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#kerjasama"
                                        class="block px-4 py-2 hover:bg-gray-100 transition"
                                    >
                                        {{ __('home.dropdown_partnership') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a
                                href="#hubungi-kami"
                                class="block py-3 md:py-0 hover:text-gray-200 transition"
                            >
                                {{ __('home.navbar_contact') }}
                            </a>
                        </li>
                    </ul>
                    @php
                        $currentLocale = app()->getLocale();
                    @endphp

                    <div class="relative group ml-4">
                        <!-- Button -->
                        <button
                            class="flex items-center gap-2 px-3 py-1.5 rounded-md bg-white/10 hover:bg-white/20 transition text-sm font-semibold"
                        >
                            🌐
                            <span class="uppercase">{{ $currentLocale }}</span>
                            <svg
                                class="w-4 h-4 transition-transform group-hover:rotate-180"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div
                            class="absolute right-0 mt-2 w-32 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50"
                        >
                            <a
                                href="{{ route('lang.switch', 'id') }}"
                                class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 transition {{ $currentLocale === 'id' ? 'font-bold text-blue-600' : '' }}"
                            >
                                🇮🇩 Indonesia
                            </a>

                            <a
                                href="{{ route('lang.switch', 'en') }}"
                                class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 transition {{ $currentLocale === 'en' ? 'font-bold text-blue-600' : '' }}"
                            >
                                🇺🇸 English
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Konten -->
        <main class="fade-in">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer
            id="kontak"
            class="bg-gray-900 text-gray-300 py-8 mt-16 fade-in"
        >
            <div class="container mx-auto px-6 text-center">
                <p class="mb-2">
                    © {{ date('Y') }} Berkah Putra Putri Karawang. Semua Hak
                    Dilindungi.
                </p>
            </div>
        </footer>

        <!-- Script Toggle Menu -->
        <script>
            const menuBtn = document.getElementById('menu-btn')
            const menu = document.getElementById('menu')

            menuBtn.addEventListener('click', () => {
                menu.classList.toggle('hidden')
                menu.classList.toggle('fade-in')
            })
        </script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.mobilSwiper', {
                    loop: false,
                    spaceBetween: 24,
                    grabCursor: true,

                    slidesPerView: 1.1,

                    breakpoints: {
                        640: {
                            slidesPerView: 1.5,
                        },
                        1024: {
                            slidesPerView: 2.5,
                        },
                    },

                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },

                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                })
            })
        </script>

        @if (session('success'))
            <div class="container mx-auto mt-4">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert"
                >
                    <span class="block sm:inline">
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        @endif

        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: false,
                mirror: true,
            })

            window.addEventListener('load', () => {
                AOS.refresh()
            })
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.whyUsSwiper', {
                    loop: true,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                })
            })
        </script>
    </body>
</html>
