@extends('layouts.main')

@section('title', __('home.title'))

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-blue-600 text-white overflow-hidden">
        <!-- Background 16:9 -->
        <div class="relative w-full" style="aspect-ratio: 16 / 9">
            <div
                class="absolute inset-0 opacity-20 bg-[url('/public/assets/toyota-hiace.png')] bg-cover bg-center"
            ></div>

            <!-- Overlay Text -->
            <div
                class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 fade-in"
            >
                <h2
                    class="text-4xl font-bold mb-4 text-yellow-400"
                    data-aos="fade-up"
                >
                    {{ __('home.hero_title') }}
                </h2>

                <p class="text-lg max-w-4xl mb-8" data-aos="fade-up">
                    {{ __('home.hero_desc') }}
                </p>

                <a
                    href="#daftar-mobil"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                    data-aos="fade-up"
                >
                    {{ __('home.cta') }}
                </a>
            </div>
        </div>
    </section>
    <section id="visi-misi" class="relative py-20 scroll-mt-20">
        <!-- Background gradient -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-blue-50 to-gray-100"
        ></div>

        <div class="relative container mx-auto px-6">
            <h2
                class="text-3xl font-bold mb-14 text-blue-600 text-center"
                data-aos="fade-up"
            >
                {{ __('home.dropdown_vision') }}
            </h2>

            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-5xl mx-auto"
            >
                <!-- CARD VISI -->
                <div
                    class="bg-white rounded-2xl shadow-md p-8 hover:shadow-xl transition"
                    data-aos="fade-right"
                >
                    <div class="flex items-center justify-center mb-5">
                        <div
                            class="w-16 h-16 flex items-center justify-center rounded-full bg-blue-100"
                        >
                            <i
                                class="fa-solid fa-eye text-blue-600 text-2xl"
                            ></i>
                        </div>
                    </div>

                    <h3
                        class="text-2xl font-semibold text-blue-700 mb-4 text-center"
                    >
                        {{ __('home.vision') }}
                    </h3>

                    <p class="text-gray-600 text-center leading-relaxed">
                        {{ __('home.isi_vision') }}
                    </p>
                </div>

                <!-- CARD MISI -->
                <div
                    class="bg-white rounded-2xl shadow-md p-8 hover:shadow-xl transition"
                    data-aos="fade-left"
                >
                    <div class="flex items-center justify-center mb-5">
                        <div
                            class="w-16 h-16 flex items-center justify-center rounded-full bg-blue-100"
                        >
                            <i
                                class="fa-solid fa-bullseye text-blue-600 text-2xl"
                            ></i>
                        </div>
                    </div>

                    <h3
                        class="text-2xl font-semibold text-blue-700 mb-4 text-center"
                    >
                        {{ __('home.mission') }}
                    </h3>

                    <p class="text-gray-600 text-center leading-relaxed">
                        {{ __('home.isi_mission') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mengapa Kami -->
    <section
        id="mengapa-kami"
        class="bg-gradient-to-b from-gray-100 to-white py-20 scroll-mt-20"
    >
        <div class="container mx-auto px-6">
            <!-- Title -->
            <div class="text-center mb-14">
                <h2
                    class="text-3xl md:text-4xl font-bold text-blue-700 mb-4"
                    data-aos="fade-up"
                >
                    {{ __('home.why_us') }}
                </h2>
                <p
                    class="max-w-3xl mx-auto text-gray-600"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    {{ __('home.p_why_us') }}
                </p>
            </div>

            <!-- Swiper -->
            <div class="swiper whyUsSwiper pb-12" data-aos="fade-up">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide flex">
                        <div class="bg-white rounded-2xl shadow-lg p-8 w-full">
                            <div
                                class="w-16 h-16 mb-6 flex items-center justify-center rounded-full bg-blue-100"
                            >
                                <i
                                    class="fa-solid fa-clock-rotate-left text-blue-600 text-2xl"
                                ></i>
                            </div>
                            <h3
                                class="text-xl font-semibold text-blue-700 mb-2"
                            >
                                {{ __('home.why_1_title') }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ __('home.why_1_desc') }}
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide flex">
                        <div class="bg-white rounded-2xl shadow-lg p-8 w-full">
                            <div
                                class="w-16 h-16 mb-6 flex items-center justify-center rounded-full bg-green-100"
                            >
                                <i
                                    class="fa-solid fa-file-contract text-green-600 text-2xl"
                                ></i>
                            </div>
                            <h3
                                class="text-xl font-semibold text-blue-700 mb-2"
                            >
                                {{ __('home.why_2_title') }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ __('home.why_2_desc') }}
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide flex">
                        <div class="bg-white rounded-2xl shadow-lg p-8 w-full">
                            <div
                                class="w-16 h-16 mb-6 flex items-center justify-center rounded-full bg-yellow-100"
                            >
                                <i
                                    class="fa-solid fa-route text-yellow-600 text-2xl"
                                ></i>
                            </div>
                            <h3
                                class="text-xl font-semibold text-blue-700 mb-2"
                            >
                                {{ __('home.why_3_title') }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ __('home.why_3_desc') }}
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide flex">
                        <div class="bg-white rounded-2xl shadow-lg p-8 w-full">
                            <div
                                class="w-16 h-16 mb-6 flex items-center justify-center rounded-full bg-purple-100"
                            >
                                <i
                                    class="fa-solid fa-shield-halved text-purple-600 text-2xl"
                                ></i>
                            </div>
                            <h3
                                class="text-xl font-semibold text-blue-700 mb-2"
                            >
                                {{ __('home.why_4_title') }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ __('home.why_4_desc') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination !relative !mt-6"></div>
            </div>
        </div>
    </section>

    <!-- Kerjasama -->
    <section id="kerjasama" class="scroll-mt-20 py-20 bg-gray-100 fade-in">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Heading -->
            <div class="text-center mb-16">
                <h2
                    class="text-3xl md:text-4xl font-bold text-blue-600"
                    data-aos="fade-up"
                >
                    {{ __('home.partnership') }}
                </h2>
                <p
                    class="mt-4 text-gray-600 max-w-2xl mx-auto"
                    data-aos="fade-up"
                >
                    {{ __('home.p_partnership') }}
                </p>
            </div>

            <!-- Partner List -->
            <div class="space-y-16">
                <!-- Partner Item -->
                <div class="grid md:grid-cols-3 gap-8 items-center">
                    <!-- Logo -->
                    <div class="flex justify-center md:justify-start">
                        <img
                            src="/assets/partner/logo-astra.png"
                            alt="PT Astra Nippon Gasket Indonesia"
                            class="h-20 object-contain"
                            data-aos="fade-right"
                            data-aos-duration="1500"
                            data-aos-offset="50"
                        />
                    </div>

                    <!-- Info -->
                    <div class="md:col-span-2">
                        <h3
                            class="text-xl font-semibold text-gray-800"
                            data-aos="fade-right"
                            data-aos-duration="1000"
                            data-aos-offset="50"
                        >
                            <a
                                href="http://www.angi.co.id/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="link-underline hover:text-blue-600 transition"
                            >
                                PT Astra Nippon Gasket Indonesia
                            </a>
                        </h3>

                        <p
                            class="mt-2 text-gray-600 leading-relaxed"
                            data-aos="fade-right"
                            data-aos-duration="1000"
                            data-aos-offset="50"
                        >
                            Karawang International Industrial City (KIIC), Jl.
                            Maligi III, Lot. N-1 Karawang Barat, Karawang 41361,
                            Jawa Barat, Indonesia.
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t"></div>

                <!-- Partner Item -->
                <div class="grid md:grid-cols-3 gap-8 items-center">
                    <div class="flex justify-center md:justify-start">
                        <img
                            src="/assets/partner/logo-meiji.png"
                            alt="PT Meiji Rubber Indonesia"
                            class="h-20 object-contain"
                            data-aos="fade-right"
                            data-aos-duration="1500"
                            data-aos-offset="50"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <h3
                            class="text-xl font-semibold text-gray-800"
                            data-aos="fade-right"
                            data-aos-duration="1000"
                            data-aos-offset="50"
                        >
                            <a
                                href="https://www.meiji.co.id/id"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="link-underline hover:text-blue-600 transition"
                            >
                                PT Meiji Food Indonesia
                            </a>
                        </h3>
                        <p
                            class="mt-2 text-gray-600 leading-relaxed"
                            data-aos="fade-right"
                            data-aos-duration="1000"
                            data-aos-offset="50"
                        >
                            Karawang International Industrial City (KIIC) Jl.
                            Maligi III No.Desa Lot J-2B, Karawang Barat, Jawa
                            Barat 41361, Indonesia.
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t"></div>

                <!-- Partner Item -->
                <div class="grid md:grid-cols-3 gap-8 items-center">
                    <div class="flex justify-center md:justify-start">
                        <img
                            src="/assets/partner/logo-sango.png"
                            alt="PT Sango Ceramics Indonesia"
                            class="h-20 object-contain"
                            data-aos="fade-right"
                            data-aos-duration="1500"
                            data-aos-offset="50"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <h3
                            class="text-xl font-semibold text-gray-800"
                            data-aos="fade-right"
                            data-aos-duration="1000"
                            data-aos-offset="50"
                        >
                            <a
                                href="https://sango-sti.com/sango-indonesia.php"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="link-underline hover:text-blue-600 transition"
                            >
                                PT Sango Indonesia
                            </a>
                        </h3>
                        <p
                            class="mt-2 text-gray-600 leading-relaxed"
                            data-aos="fade-right"
                            data-aos-duration="1000"
                            data-aos-offset="50"
                        >
                            Kawasan Industri Mitra Karawang (KIM) Mitra Selatan
                            IV BLOK M1-2, Desa Parungmulya,Kacamatan Ciampel,
                            Karawang 41361 Jawa Barat - Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Mobil -->
    <section id="daftar-mobil" class="bg-gray-100 py-20">
        <div class="container mx-auto px-10">
            <h2
                class="text-3xl font-bold text-center mb-12 text-blue-700"
                data-aos="fade-up"
            >
                {{ __('home.vehicles') }}
            </h2>

            <!-- Swiper -->
            <div class="swiper mobilSwiper relative overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($mobils as $mobil)
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-1 duration-300"
                            >
                                <!-- Image -->
                                <div class="relative">
                                    <img
                                        src="{{ asset('mobil/' . $mobil->gambar) }}"
                                        alt="{{ $mobil->nama_mobil }}"
                                        class="w-full h-56 object-cover"
                                    />
                                </div>

                                <!-- Content -->
                                <div
                                    class="p-6"
                                    data-aos="fade-up"
                                    data-aos-delay="100"
                                >
                                    <h3
                                        class="text-xl font-bold text-blue-700 mb-1"
                                    >
                                        {{ $mobil->nama_mobil }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mb-2">
                                        {{ $mobil->tipe_mobil }} •
                                    </p>

                                    <p
                                        class="text-gray-600 mb-4 flex items-center gap-2"
                                    >
                                        <i
                                            class="fa-solid fa-chair text-blue-600"
                                        ></i>
                                        {{ __('home.capacity') }}:
                                        <span class="font-medium">
                                            {{ $mobil->kapasitas }}
                                        </span>
                                        Seats
                                    </p>

                                    <a
                                        href="{{ route('estimasi.create', $mobil->id) }}"
                                        class="inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition"
                                    >
                                        {{ __('home.estimate_btn') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>
    </section>

    <!-- Kontak Perusahaan -->
    <section id="hubungi-kami" class="bg-gray-100 py-16 fade-in scroll-mt-20">
        <div class="container mx-auto px-6">
            <div class="mt-10"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mr-10">
                <!-- Informasi Kontak -->
                <div
                    class="flex flex-col justify-center ml-10"
                    data-aos="fade-right"
                    data-aos-delay="200"
                >
                    <h1 class="text-5xl font-bold text-blue-600 mb-8">
                        {{ __('home.contact') }}
                    </h1>
                    <p class="text-gray-600 mb-8">
                        {{ __('home.p_contact') }}
                    </p>
                    <!-- Email -->
                    <div class="flex items-start gap-3 mb-5">
                        <i class="fas fa-envelope text-blue-600 text-2xl"></i>
                        <div>
                            <p class="text-gray-500 text-sm">
                                {{ __('home.email') }}
                            </p>
                            <a
                                href="mailto:ptbppkkarawang@gmail.com"
                                class="font-semibold link-underline hover:text-blue-600 transition"
                            >
                                ptbppkkarawang@gmail.com
                            </a>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="flex items-start gap-3 mb-5">
                        <i class="fas fa-phone-alt text-blue-600 text-2xl"></i>
                        <div>
                            <p class="text-gray-500 text-sm">
                                {{ __('home.phone') }}
                            </p>
                            <a
                                href="https://wa.me/6281998062726?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20PT%20Berkah%20Putra%20Putri%20Karawang!"
                                target="_blank"
                                class="font-semibold link-underline hover:text-blue-600 transition"
                            >
                                +62 819 9806 2726
                            </a>
                            <br />
                            <a
                                href="https://wa.me/6285319447224?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20PT%20Berkah%20Putra%20Putri%20Karawang!"
                                target="_blank"
                                class="font-semibold link-underline hover:text-blue-600 transition"
                            >
                                +62 853 1944 7224
                            </a>
                            <br />
                            <a
                                href="https://wa.me/6283890576716?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20PT%20Berkah%20Putra%20Putri%20Karawang!"
                                target="_blank"
                                class="font-semibold link-underline hover:text-blue-600 transition"
                            >
                                +62 838 9057 6716
                            </a>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="flex items-start gap-3 mb-6">
                        <i
                            class="fas fa-map-marker-alt text-blue-600 text-2xl"
                        ></i>
                        <div>
                            <p class="text-gray-500 text-sm">
                                {{ __('home.address') }}
                            </p>
                            <p class="font-semibold text-gray-800">
                                Dusun Ciherang RT 001 / RW 005, Desa Wadas,
                                <br />
                                Telukjambe Timur, Karawang – Jawa Barat
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center"
                    data-aos="fade-left"
                    data-aos-delay="200"
                >
                    <!-- Map Header -->
                    <div class="flex items-center gap-2 mb-8">
                        <i class="fas fa-map text-blue-600 text-xl"></i>
                        <p class="font-semibold text-gray-800">
                            {{ __('home.our_location') }}
                        </p>
                    </div>

                    <!-- Map -->
                    <div class="rounded-xl overflow-hidden shadow-md">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.3652631196103!2d107.27806536303126!3d-6.334269631478037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d3e43d1f6eb%3A0xc49a90c0eb120575!2sKantor%20Sekretariat%20RW.05!5e0!3m2!1sid!2sid!4v1765394489452!5m2!1sid!2sid"
                            width="100%"
                            height="400"
                            style="border: 0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>

                <!-- Kolom Kanan Kosong (agar layout tetap rapi) -->
                <div></div>
            </div>
        </div>
    </section>
@endsection
