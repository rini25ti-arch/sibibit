<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiBibit - Sistem Informasi Pengelolaan & Penjualan Bibit Kelapa Sawit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#f2f7f2] text-gray-800 font-sans m-0 p-0">

    <div class="flex min-h-screen w-full">

        <!-- SIDEBAR KIRI -->
        <aside class="w-72 bg-white border-r border-green-100 flex-shrink-0 hidden lg:flex flex-col justify-between sticky top-0 h-screen shadow-sm z-40">
            <div class="p-6 overflow-y-auto">
                <div class="flex items-center gap-3 pb-6 border-b border-gray-100">
                    <div class="w-10 h-10 bg-green-800 text-white rounded-xl flex items-center justify-center text-xl shadow">
                        🌴
                    </div>
                    <div>
                        <span class="text-2xl font-extrabold text-green-900 tracking-tight block leading-none">SiBibit</span>
                        <span class="text-[11px] font-semibold text-green-700">Kelapa Sawit Unggul</span>
                    </div>
                </div>

                <div class="mt-6 space-y-6">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Menu Utama</p>
                        <ul class="space-y-1 text-sm font-semibold">
                            <li>
                                <a href="#beranda" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-800 text-white shadow-sm">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard Utama</span>
                                </a>
                            </li>
                            <li>
                                <a href="#katalog" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-flower1 text-green-700"></i>
                                    <span>Katalog & Stok Bibit</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Kategori Lahan</p>
                        <ul class="space-y-1 text-xs font-semibold text-gray-600">
                            <li>
                                <a href="#kategori-1" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-droplet-half text-green-600"></i>
                                    <span>Lahan Gambut & Marjinal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#kategori-2" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-sun-fill text-amber-500"></i>
                                    <span>Lahan Kering & Mineral</span>
                                </a>
                            </li>
                            <li>
                                <a href="#kategori-3" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-shield-check text-emerald-600"></i>
                                    <span>Berbukit / Rawan Ganoderma</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Panduan & Akses</p>
                        <ul class="space-y-2 text-sm font-semibold">
                            <li>
                                <a href="{{ route('download.pdf') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-amber-50 text-amber-900 border border-amber-200 hover:bg-amber-100 transition">
                                    <i class="bi bi-file-earmark-pdf-fill text-red-600 text-base"></i>
                                    <span class="text-xs leading-tight">Download Artikel & Saran Bibit (PDF)</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-box-arrow-in-right text-green-700"></i>
                                    <span>Login Pembeli / Admin</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="p-4 border-t border-gray-100 text-[11px] text-gray-400 text-center">
                &copy; 2026 SiBibit Kelapa Sawit
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="flex-1 min-w-0 p-6 lg:p-8 space-y-6">

            <div id="beranda" class="flex flex-wrap justify-between items-center gap-4">
                <div>
                    <h1 class="text-2xl font-extrabold text-green-950">Dashboard SiBibit</h1>
                    <p class="text-sm text-gray-500">Sistem Informasi Pengelolaan dan Penjualan Bibit Kelapa Sawit Unggul</p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('download.pdf') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                        <i class="bi bi-download"></i>
                        <span>Download Artikel & Saran Bibit (PDF)</span>
                    </a>
                    <a href="{{ route('login') }}" class="bg-green-800 hover:bg-green-900 text-white font-bold px-5 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                        <i class="bi bi-person-circle"></i>
                        <span>Login / Beli Bibit</span>
                    </a>
                </div>
            </div>

            <!-- 4 Kartu Ringkasan Atas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-800 flex items-center justify-center text-xl">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Varietas Unggul</p>
                        <p class="text-xl font-extrabold text-gray-900">{{ $varietasGroup->flatten()->count() }} Jenis</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Total Stok Siap Jual</p>
                        <p class="text-xl font-extrabold text-gray-900">{{ number_format($varietasGroup->flatten()->sum('stok'), 0, ',', '.') }} Bibit</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl">
                        <i class="bi bi-layers-fill"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Klasifikasi Lahan</p>
                        <p class="text-xl font-extrabold text-gray-900">3 Tipe Lahan</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center text-xl">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Sertifikasi Benih</p>
                        <p class="text-xl font-extrabold text-gray-900">Resmi & Unggul</p>
                    </div>
                </div>
            </div>

            <!-- Hero Banner -->
            <div class="relative rounded-2xl overflow-hidden bg-green-900 p-7 text-white shadow-sm flex flex-col md:flex-row items-center justify-between gap-6"
                 style="background-image: linear-gradient(to right, rgba(16, 56, 26, 0.92), rgba(22, 85, 38, 0.78)), url('https://images.unsplash.com/photo-1590082871875-064201a2889b?auto=format&fit=crop&w=1400&q=80'); background-size: cover; background-position: center;">
                <div class="max-w-2xl">
                    <span class="inline-block bg-green-700/80 text-green-100 text-[11px] font-bold px-3 py-1 rounded-full mb-2">
                        PPKS • ASIAN AGRI • SOCFINDO
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">Pilih Bibit Kelapa Sawit Terbaik Sesuai Kondisi Lahan Anda</h2>
                    <p class="text-green-100 text-sm">
                        Dilengkapi panduan teknis penanaman, keunggulan tiap varietas, stok real-time, serta dokumen PDF saran budidaya yang dapat diunduh langsung.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('login') }}" class="inline-block bg-[#d9822b] hover:bg-[#c27120] text-white font-bold px-6 py-3 rounded-xl shadow transition text-sm">
                        Mulai Belanja Sekarang &rarr;
                    </a>
                </div>
            </div>

            <!-- Katalog Bibit per Kategori Lahan -->
            <div id="katalog" class="space-y-6">
                @php $catIndex = 1; @endphp
                @foreach($varietasGroup as $kategori => $listBibit)
                    <div id="kategori-{{ $catIndex++ }}" class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
                        <div class="flex flex-wrap justify-between items-center border-b border-gray-100 pb-3 mb-5">
                            <h3 class="text-lg font-bold text-green-900 flex items-center gap-2">
                                <span class="w-2.5 h-6 bg-green-700 rounded-full inline-block"></span>
                                {{ $kategori }}
                            </h3>
                            <span class="text-xs font-semibold text-green-700 bg-green-50 px-3 py-1 rounded-full">
                                {{ $listBibit->count() }} Varietas Tersedia
                            </span>
                        </div>

                        <div class="grid grid-cols-1 {{ $listBibit->count() == 2 ? 'md:grid-cols-2' : 'md:grid-cols-2 xl:grid-cols-3' }} gap-6">
                            @foreach($listBibit as $bibit)
                                <div class="border border-gray-200 rounded-2xl overflow-hidden bg-white hover:shadow-md transition flex flex-col">
                                    <img src="{{ asset('images/' . $bibit->gambar) }}"
                                         onerror="this.src='https://placehold.co/800x400/1b4332/ffffff?text={{ urlencode($bibit->nama_varietas) }}'"
                                         alt="{{ $bibit->nama_varietas }}"
                                         class="w-full h-48 object-cover">

                                    <div class="p-5 flex-1 flex flex-col justify-between text-sm">
                                        <div>
                                            <div class="flex justify-between items-start gap-2 mb-1">
                                                <h4 class="font-bold text-base text-gray-900">{{ $bibit->nama_varietas }}</h4>
                                                <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded-lg whitespace-nowrap">
                                                    Stok: {{ number_format($bibit->stok, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            <p class="text-green-800 font-extrabold text-base mb-3">
                                                Rp {{ number_format($bibit->harga, 0, ',', '.') }} <span class="text-xs font-normal text-gray-500">/ bibit</span>
                                            </p>

                                            <div class="border-t border-gray-100 pt-3 space-y-2 text-xs text-gray-600 leading-relaxed">
                                                <p><strong class="text-gray-800">Keunggulan :</strong> {{ $bibit->keunggulan }}</p>
                                                <p><strong class="text-gray-800">Cara Penanaman :</strong> {{ $bibit->cara_penanaman }}</p>
                                            </div>
                                        </div>

                                        <a href="{{ route('login') }}" class="mt-5 block text-center w-full bg-green-800 hover:bg-green-900 text-white font-bold py-2.5 rounded-xl text-xs transition shadow-sm">
                                            Login untuk Membeli Bibit Ini
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ARTIKEL PENTING & DOWNLOAD PDF (FULL WIDTH) -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
                <div class="flex flex-wrap justify-between items-center border-b border-gray-100 pb-3 mb-4 gap-3">
                    <h3 class="text-lg font-bold text-green-950 flex items-center gap-2">
                        <i class="bi bi-journal-text text-green-700"></i>
                        <span>Artikel Penting & Saran Pemilihan Bibit Kelapa Sawit</span>
                    </h3>
                    <a href="{{ route('download.pdf') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-5 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                        <i class="bi bi-file-earmark-arrow-down-fill text-sm"></i>
                        <span>Download Artikel & Saran (PDF)</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-gray-600 leading-relaxed">
                    <div class="p-4 rounded-xl bg-green-50/70 border border-green-100">
                        <p class="font-bold text-green-900 mb-1.5">1. Panduan Lahan Gambut & Marjinal</p>
                        <p>Gunakan varietas bertipe <em>Dumpy</em> (batang gemuk dan kokoh) seperti <strong>DxP Topaz 3</strong> atau <strong>PPKS Simalungun</strong> dengan teknik tanam <em>hole-in-hole</em> agar pokok sawit tidak mudah miring/tumbang.</p>
                    </div>
                    <div class="p-4 rounded-xl bg-green-50/70 border border-green-100">
                        <p class="font-bold text-green-900 mb-1.5">2. Panduan Lahan Kering & Mineral (Daratan)</p>
                        <p>Maksimalkan potensi produksi TBS hingga 38 ton/ha/tahun dengan <strong>PPKS 239/540</strong>, <strong>Topaz 1</strong>, atau <strong>Socfindo (Yangambi & La Mé)</strong> yang tahan cekaman kemarau.</p>
                    </div>
                    <div class="p-4 rounded-xl bg-green-50/70 border border-green-100">
                        <p class="font-bold text-green-900 mb-1.5">3. Panduan Lahan Berbukit & Rawan Ganoderma</p>
                        <p>Untuk lahan miring dan area <em>replanting</em> eks-sawit, wajib gunakan varietas moderat tahan jamur Ganoderma seperti <strong>Topaz GT</strong> & <strong>Socfindo MT Gano</strong> disertai aplikasi <em>Trichoderma</em>.</p>
                    </div>
                </div>
            </div>

            <footer class="pt-4 pb-2 flex flex-wrap justify-between items-center text-xs text-gray-500 border-t border-green-100">
                <span>2026 &copy; SiBibit - Sistem Informasi Pembibitan Kelapa Sawit</span>
                <span>Tim Proyek 2 TI F - Politeknik Caltex Riau</span>
            </footer>

        </main>
    </div>

</body>
</html>
