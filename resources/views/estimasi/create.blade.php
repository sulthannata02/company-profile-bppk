@extends('layouts.main')

@section('title', __('home.estimation_title'))

@section('content')
    <section class="py-20 bg-gray-100 min-h-screen">

        <div class="container mx-auto px-6 max-w-3xl">

            <!-- Title -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-700">
                    {{ __('home.estimation_title') }}
                </h2>
                <p class="text-gray-500 mt-2">
                    Hitung estimasi biaya antar jemput berdasarkan rute perjalanan
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg">

                <!-- Card Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-white border-b border-blue-400">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-calculator text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold">
                                Form Estimasi Biaya
                            </h3>
                            <p class="text-blue-100 text-sm">
                                Pilih rute perjalanan untuk menghitung biaya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-8 pt-10">

                    <form method="POST" action="{{ route('estimasi.hitung', $mobil->id) }}">
                        @csrf

                        <!-- Mobil -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Tipe Mobil
                            </label>

                            <div class="flex items-center gap-4 bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <i class="fa-solid fa-van-shuttle text-blue-600 text-xl"></i>

                                <div>
                                    <p class="font-semibold text-blue-700">
                                        {{ $mobil->nama_mobil }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Kapasitas {{ $mobil->kapasitas }} Penumpang
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Lokasi Jemput -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Lokasi Jemput
                            </label>

                            <div class="relative">
                                <i
                                    class="fa-solid fa-location-dot absolute left-3 top-1/2 -translate-y-1/2 text-blue-500"></i>

                                <select name="lokasi_jemput"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="">-- Pilih Lokasi Jemput --</option>

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
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Lokasi Tujuan
                            </label>

                            <div class="relative">
                                <i
                                    class="fa-solid fa-flag-checkered absolute left-3 top-1/2 -translate-y-1/2 text-green-500"></i>

                                <select name="lokasi_tujuan"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    <option value="">-- Pilih Lokasi Tujuan --</option>

                                    @foreach ($lokasiTujuan as $tujuan)
                                        <option value="{{ $tujuan->id }}">
                                            {{ $tujuan->nama_lokasi }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <!-- Button -->
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-calculator"></i>
                            Hitung Estimasi
                        </button>

                    </form>

                    <!-- Hasil Estimasi -->
                    @if (session('hasil'))
                        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">

                            <h4 class="font-semibold text-blue-700 mb-3">
                                Hasil Estimasi
                            </h4>

                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Jarak</span>
                                <span class="font-semibold">
                                    {{ session('hasil.jarak') }} KM
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-600">Estimasi Biaya</span>
                                <span class="font-bold text-blue-700 text-lg">
                                    Rp {{ number_format(session('hasil.harga'), 0, ',', '.') }}
                                </span>
                            </div>

                        </div>
                    @endif

                    <!-- Info -->
                    <p class="text-center text-sm text-gray-500 mt-6 italic">
                        *Estimasi harga dapat berubah tergantung kondisi perjalanan dan permintaan layanan.
                    </p>

                </div>

            </div>

        </div>

    </section>
@endsection