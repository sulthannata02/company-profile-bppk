@extends('layouts.main')

@section('title', __('home.estimation_title'))

@section('content')
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-6 max-w-2xl">
            <!-- Title -->
            <h2
                class="text-3xl font-bold text-blue-700 mb-10 text-center"
                data-aos="fade-up"
            >
                Estimasi Biaya Antar Jemput
            </h2>

            <!-- Card -->
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden"
                data-aos="fade-up"
                data-aos-delay="100"
            >
                <!-- Card Header -->
                <div
                    class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-white"
                >
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-route text-2xl"></i>
                        <div>
                            <h3 class="text-xl font-semibold">
                                Form Estimasi Biaya
                            </h3>
                            <p class="text-sm text-blue-100">
                                Hitung biaya berdasarkan rute & jenis mobil
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-8">
                    <form
                        method="POST"
                        action="{{ route('estimasi.hitung', $mobil->id) }}"
                    >
                        @csrf

                        <!-- Tipe Mobil -->
                        <div class="mb-6">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Tipe Mobil
                            </label>

                            <div
                                class="flex items-center gap-4 bg-blue-50 border border-blue-200 rounded-lg p-4"
                            >
                                <i
                                    class="fa-solid fa-van-shuttle text-blue-600 text-xl"
                                ></i>
                                <div>
                                    <p
                                        class="font-semibold text-blue-700 text-lg"
                                    >
                                        {{ $mobil->nama_mobil }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        Kapasitas {{ $mobil->kapasitas }}
                                        Penumpang
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Lokasi Jemput -->
                        <div class="mb-6">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Lokasi Jemput
                            </label>

                            <div class="relative">
                                <i
                                    class="fa-solid fa-location-dot absolute left-3 top-1/2 -translate-y-1/2 text-blue-600"
                                ></i>

                                <select
                                    name="lokasi_jemput"
                                    class="w-full pl-10 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Lokasi Jemput --
                                    </option>
                                    @foreach ($lokasiJemput as $jemput)
                                        <option value="{{ $jemput->id }}">
                                            {{ $jemput->nama_lokasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Lokasi Tujuan -->
                        <div class="mb-8">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Lokasi Tujuan
                            </label>

                            <div class="relative">
                                <i
                                    class="fa-solid fa-flag-checkered absolute left-3 top-1/2 -translate-y-1/2 text-green-600"
                                ></i>

                                <select
                                    name="lokasi_tujuan"
                                    class="w-full pl-10 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Lokasi Tujuan --
                                    </option>
                                    @foreach ($lokasiTujuan as $tujuan)
                                        <option value="{{ $tujuan->id }}">
                                            {{ $tujuan->nama_lokasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition flex items-center justify-center gap-2"
                        >
                            <i class="fa-solid fa-calculator"></i>
                            Hitung Estimasi
                        </button>

                        @if (session('hasil'))
                            <div
                                class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4"
                            >
                                <p class="text-gray-700">
                                    <strong>Jarak:</strong>
                                    {{ session('hasil.jarak') }} KM
                                </p>
                                <p class="text-gray-700 mt-1">
                                    <strong>Estimasi Biaya:</strong>
                                    Rp
                                    {{ number_format(session('hasil.harga'), 0, ',', '.') }}
                                </p>
                            </div>
                        @endif

                        <!-- Info -->
                        <p
                            class="text-center text-sm text-gray-500 mt-4 italic"
                        >
                            Ini hanya estimasi biaya. Harga akhir dapat
                            bervariasi berdasarkan kondisi aktual.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
