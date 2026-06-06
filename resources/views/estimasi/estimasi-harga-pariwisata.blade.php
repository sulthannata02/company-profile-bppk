<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estimasi Harga Pariwisata</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/logo-bppk.ico" />
</head>

<body class="bg-gray-100">

    <nav class="bg-gradient-to-r from-blue-700 to-blue-500 text-white shadow-lg sticky top-0 z-10">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center gap-3 min-w-0 font-bold text-lg">
                <img src="/assets/logo-bppk.png" alt="Logo BPPK"
                    class="h-10 w-auto md:h-12 object-contain flex-shrink-0">
                <span
                    class="font-bold tracking-wide text-lg md:text-2xl whitespace-nowrap overflow-hidden text-ellipsis">
                    Berkah Putra Putri Karawang
                </span>
            </div>

            <!-- HOME BUTTON -->
            <a href="{{ url('/') }}"
                class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-100 transition flex items-center gap-2">

                <i class="fa-solid fa-house"></i>
                Beranda
            </a>

        </div>
    </nav>

    <section class="py-16 min-h-screen">

        <div class="container mx-auto px-6 max-w-3xl">

            <!-- TITLE -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-blue-700">
                    Estimasi Harga Pariwisata
                </h2>
                <p class="text-gray-500 mt-2">
                    Pilih armada dan tujuan wisata untuk mendapatkan estimasi biaya perjalanan.
                </p>
            </div>

            <!-- SINGLE CARD CLEAN -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                <!-- HEADER -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-white">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-bus text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold">
                                Form Estimasi Pariwisata
                            </h3>
                            <p class="text-blue-100 text-sm">
                                Pilih kendaraan dan tujuan wisata
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BODY -->
                <div class="p-8">

                    <form action="{{ route('estimasi-harga-pariwisata.hitung') }}" method="POST">
                        @csrf

                        <!-- Mobil -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Pilih Kendaraan
                            </label>

                            <div class="relative">
                                <i
                                    class="fa-solid fa-van-shuttle absolute left-3 top-1/2 -translate-y-1/2 text-blue-500"></i>

                                <select id="mobilSelect" name="mobil_id" required
                                    class="w-full pl-10 pr-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">

                                    <option value="">-- Pilih Mobil --</option>

                                    @foreach ($mobils as $mobilItem)
                                        <option value="{{ $mobilItem->id }}" data-nama="{{ $mobilItem->nama_mobil }}"
                                            data-gambar="{{ asset('mobil/' . $mobilItem->gambar) }}">
                                            {{ $mobilItem->nama_mobil }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div id="mobilPreview" class="hidden mb-6">
                            <div class="border rounded-xl p-4 bg-gray-50 flex items-center gap-4">

                                <img id="mobilImage" class="h-20 w-32 object-cover rounded-lg border" src=""
                                    alt="Mobil Preview">

                                <div>
                                    <p class="text-sm text-gray-500">Mobil Dipilih</p>
                                    <p id="mobilName" class="font-semibold text-gray-800"></p>
                                </div>

                            </div>
                        </div>

                        <!-- Tujuan -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Pilih Tujuan Wisata
                            </label>

                            <div class="relative">
                                <i
                                    class="fa-solid fa-location-dot absolute left-3 top-1/2 -translate-y-1/2 text-green-500"></i>

                                <select name="tujuan_id" required
                                    class="w-full pl-10 pr-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">

                                    <option value="">-- Pilih Tujuan Wisata --</option>

                                    @foreach ($tujuans as $tujuanItem)
                                        <option value="{{ $tujuanItem->id }}" data-nama="{{ $tujuanItem->nama_tujuan }}"
                                            data-jarak="{{ $tujuanItem->jarak_km }}"
                                            data-deskripsi="{{ $tujuanItem->deskripsi ?? 'Destinasi wisata menarik' }}">
                                            {{ $tujuanItem->nama_tujuan }}
                                        </option>
                                    @endforeach

                                </select>
                                <div id="tujuanPreview" class="hidden mb-6">
                                    <div class="border rounded-xl p-4 bg-gray-50">

                                        <p class="text-sm text-gray-500">Tujuan Dipilih</p>

                                        <p id="tujuanName" class="font-semibold text-gray-800"></p>

                                        <p class="text-sm text-gray-600">
                                            Jarak: <span id="tujuanJarak"></span> KM
                                        </p>

                                        <p id="tujuanDesc" class="text-sm text-gray-500 mt-1"></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold flex justify-center gap-2">

                            <i class="fa-solid fa-calculator"></i>
                            Hitung Estimasi
                        </button>

                    </form>

                    @if(session('error'))
                        <div class="mt-6 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    @isset($harga)
                        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">

                            <div class="flex justify-between mb-2">
                                <span>Kendaraan</span>
                                <span class="font-semibold">{{ $mobil->nama_mobil }}</span>
                            </div>

                            <div class="flex justify-between mb-2">
                                <span>Tujuan</span>
                                <span class="font-semibold">{{ $tujuan->nama_tujuan }}</span>
                            </div>

                            <div class="flex justify-between mb-2">
                                <span>Jarak</span>
                                <span class="font-semibold">{{ $tujuan->jarak_km }} KM</span>
                            </div>

                            <hr class="my-4">

                            <div class="flex justify-between">
                                <span class="font-semibold">Estimasi Harga</span>
                                <span class="text-xl font-bold text-blue-700">
                                    Rp {{ number_format($harga, 0, ',', '.') }}
                                </span>
                            </div>

                        </div>
                    @endisset

                </div>
            </div>

        </div>

    </section>

    <script>
        document.getElementById('mobilSelect').addEventListener('change', function () {
            const opt = this.options[this.selectedIndex];

            const nama = opt.getAttribute('data-nama');
            const gambar = opt.getAttribute('data-gambar');

            const preview = document.getElementById('mobilPreview');
            const img = document.getElementById('mobilImage');
            const name = document.getElementById('mobilName');

            if (!gambar) {
                preview.classList.add('hidden');
                return;
            }

            img.src = gambar;
            name.textContent = nama;
            preview.classList.remove('hidden');
        });

        const tujuanSelect = document.getElementById('tujuanSelect');

        const tujuanPreview = document.getElementById('tujuanPreview');
        const tujuanName = document.getElementById('tujuanName');
        const tujuanJarak = document.getElementById('tujuanJarak');
        const tujuanDesc = document.getElementById('tujuanDesc');

        tujuanSelect.addEventListener('change', function () {

            const opt = this.options[this.selectedIndex];

            const nama = opt.getAttribute('data-nama');
            const jarak = opt.getAttribute('data-jarak');
            const deskripsi = opt.getAttribute('data-deskripsi');

            if (!nama) {
                tujuanPreview.classList.add('hidden');
                return;
            }

            tujuanName.textContent = nama;
            tujuanJarak.textContent = jarak;
            tujuanDesc.textContent = deskripsi;

            tujuanPreview.classList.remove('hidden');
        });
    </script>

</body>

</html>