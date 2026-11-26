<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembeli - SiBibit Kelapa Sawit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#f2f7f2] text-gray-800 font-sans m-0 p-0">

    <!-- WRAPPER FULL SCREEN (SIDEBAR KIRI + KONTEN KANAN) -->
    <div class="flex min-h-screen w-full">

        <!-- ========================================================= -->
        <!-- SIDEBAR KIRI (TETAP / STICKY FULL HEIGHT)                 -->
        <!-- ========================================================= -->
        <aside class="w-72 bg-white border-r border-green-100 flex-shrink-0 hidden lg:flex flex-col justify-between sticky top-0 h-screen shadow-sm z-40">
            <div class="p-6 overflow-y-auto">
                <!-- Logo Brand -->
                <div class="flex items-center gap-3 pb-6 border-b border-gray-100">
                    <div class="w-10 h-10 bg-green-800 text-white rounded-xl flex items-center justify-center text-xl shadow">
                        🌴
                    </div>
                    <div>
                        <span class="text-2xl font-extrabold text-green-900 tracking-tight block leading-none">SiBibit</span>
                        <span class="text-[11px] font-semibold text-green-700">Portal Pembeli</span>
                    </div>
                </div>

                <!-- Info Akun Pembeli -->
                <div class="mt-5 p-3.5 rounded-xl bg-green-50 border border-green-100">
                    <p class="text-[11px] font-semibold text-green-700">Selamat datang,</p>
                    <p class="text-sm font-extrabold text-green-950 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-gray-500 truncate">{{ Auth::user()->no_hp }}</p>
                </div>

                <!-- Menu Navigasi Sidebar -->
                <div class="mt-6 space-y-6">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Menu Pembeli</p>
                        <ul class="space-y-1 text-sm font-semibold">
                            <li>
                                <a href="#katalog-bibit" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-800 text-white shadow-sm">
                                    <i class="bi bi-cart-fill"></i>
                                    <span>Katalog & Beli Bibit</span>
                                </a>
                            </li>
                            <li>
                                <a href="#status-pesanan" class="flex items-center justify-between px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-800 transition">
                                    <span class="flex items-center gap-3">
                                        <i class="bi bi-box-seam-fill text-amber-600"></i>
                                        <span>Status Pesanan Saya</span>
                                    </span>
                                    <span class="bg-amber-100 text-amber-900 text-xs font-extrabold px-2 py-0.5 rounded-full">
                                        {{ $pesanans->count() }}
                                    </span>
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
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Panduan</p>
                        <a href="{{ route('download.pdf') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-amber-50 text-amber-900 border border-amber-200 hover:bg-amber-100 transition text-sm font-semibold">
                            <i class="bi bi-file-earmark-pdf-fill text-red-600 text-base"></i>
                            <span class="text-xs leading-tight">Download Panduan Pemilihan Bibit (PDF)</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tombol Logout Bawah Sidebar -->
            <div class="p-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 rounded-xl text-xs transition flex items-center justify-center gap-2 shadow-sm">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout Akun</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- ========================================================= -->
        <!-- KONTEN UTAMA KANAN (FULL WIDTH MENGISI SISA LAYAR)         -->
        <!-- ========================================================= -->
        <main class="flex-1 min-w-0 p-6 lg:p-8 space-y-6">

            <!-- Header Atas -->
            <div class="flex flex-wrap justify-between items-center gap-4">
                <div>
                    <h1 class="text-2xl font-extrabold text-green-950">Katalog & Pemesanan Bibit Kelapa Sawit</h1>
                    <p class="text-sm text-gray-500">Klik tombol <strong>Beli Sekarang</strong> pada varietas pilihan Anda untuk menentukan jumlah pembelian.</p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="#status-pesanan" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Pesanan Saya ({{ $pesanans->count() }})</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="lg:hidden">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Notifikasi Sukses / Error -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-700 text-green-900 p-4 rounded-xl shadow-sm text-sm font-semibold flex items-center gap-2">
                    <i class="bi bi-check-circle-fill text-green-700 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-600 text-red-900 p-4 rounded-xl shadow-sm text-sm font-semibold flex items-center gap-2">
                    <i class="bi bi-exclamation-triangle-fill text-red-600 text-lg"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- ========================================================= -->
            <!-- BAGIAN 1: KATALOG BIBIT PER KATEGORI LAHAN (FULL WIDTH)   -->
            <!-- ========================================================= -->
            <section id="katalog-bibit" class="space-y-6">
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

                        <!-- Grid Otomatis Penuh -->
                        <div class="grid grid-cols-1 {{ $listBibit->count() == 2 ? 'md:grid-cols-2' : 'md:grid-cols-2 xl:grid-cols-3' }} gap-6">
                            @foreach($listBibit as $bibit)
                                <div class="border border-gray-200 rounded-2xl overflow-hidden bg-white hover:shadow-md transition flex flex-col">
                                    <!-- Gambar Bibit -->
                                    <img src="{{ asset('images/' . $bibit->gambar) }}"
                                         onerror="this.src='https://placehold.co/800x400/1b4332/ffffff?text={{ urlencode($bibit->nama_varietas) }}'"
                                         alt="{{ $bibit->nama_varietas }}"
                                         class="w-full h-48 object-cover">

                                    <!-- Deskripsi & Tombol Beli -->
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

                                            <div class="border-t border-gray-100 pt-3 space-y-2 text-xs text-gray-600 leading-relaxed mb-4">
                                                <p><strong class="text-gray-800">Keunggulan :</strong> {{ $bibit->keunggulan }}</p>
                                                <p><strong class="text-gray-800">Cara Penanaman :</strong> {{ $bibit->cara_penanaman }}</p>
                                            </div>
                                        </div>

                                        <!-- Tombol Beli Sekarang & Form Input Jumlah -->
                                        <div class="pt-3 border-t border-gray-100">
                                            @if($bibit->stok > 0)
                                                <button type="button"
                                                        onclick="toggleFormBeli({{ $bibit->id }})"
                                                        id="btn-beli-{{ $bibit->id }}"
                                                        class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-2.5 rounded-xl text-xs transition shadow-sm flex items-center justify-center gap-2">
                                                    <i class="bi bi-cart-plus-fill text-sm"></i>
                                                    <span>Beli Sekarang</span>
                                                </button>

                                                <form id="form-beli-{{ $bibit->id }}"
                                                      action="{{ route('pembeli.beli') }}"
                                                      method="POST"
                                                      class="hidden bg-green-50 p-4 rounded-xl border border-green-200 space-y-3">
                                                    @csrf
                                                    <input type="hidden" name="varietas_id" value="{{ $bibit->id }}">

                                                    <div class="flex justify-between text-xs">
                                                        <span class="text-gray-600">Harga Satuan:</span>
                                                        <span class="font-bold text-gray-900">Rp {{ number_format($bibit->harga, 0, ',', '.') }}</span>
                                                    </div>

                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-700 mb-1">Jumlah Bibit yang Dibeli:</label>
                                                        <input type="number"
                                                               name="jumlah_beli"
                                                               min="1"
                                                               max="{{ $bibit->stok }}"
                                                               value="10"
                                                               oninput="hitungTotal({{ $bibit->id }}, {{ $bibit->harga }}, this.value)"
                                                               required
                                                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-bold bg-white focus:outline-none focus:border-green-700">
                                                    </div>

                                                    <div class="flex justify-between items-center bg-white px-3 py-2 rounded-lg border border-green-100">
                                                        <span class="text-xs font-semibold text-gray-600">Total Bayar:</span>
                                                        <span id="total-harga-{{ $bibit->id }}" class="text-sm font-extrabold text-green-800">
                                                            Rp {{ number_format($bibit->harga * 10, 0, ',', '.') }}
                                                        </span>
                                                    </div>

                                                    <div class="flex gap-2 pt-1">
                                                        <button type="button"
                                                                onclick="toggleFormBeli({{ $bibit->id }})"
                                                                class="w-1/3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 rounded-lg text-xs transition">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                                class="w-2/3 bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 rounded-lg text-xs shadow transition">
                                                            Konfirmasi Beli
                                                        </button>
                                                    </div>
                                                </form>
                                            @else
                                                <button disabled class="w-full bg-gray-300 text-gray-500 font-bold py-2.5 rounded-xl text-xs cursor-not-allowed">
                                                    Stok Habis
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </section>

            <!-- ========================================================= -->
            <!-- BAGIAN 2: STATUS PESANAN SAYA (FULL WIDTH)                -->
            <!-- ========================================================= -->
            <section id="status-pesanan" class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
                <div class="flex flex-wrap justify-between items-center border-b border-gray-100 pb-3 mb-4">
                    <h2 class="text-lg font-bold text-green-950 flex items-center gap-2">
                        <i class="bi bi-truck text-green-700"></i>
                        <span>Status Pesanan & Pengiriman Bibit Saya</span>
                    </h2>
                    <span class="text-xs text-gray-500">Status diperbarui secara real-time oleh Admin</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-800 text-white text-xs uppercase tracking-wider">
                                <th class="p-3.5 rounded-tl-xl">No</th>
                                <th class="p-3.5">Tanggal Pesan</th>
                                <th class="p-3.5">Varietas Bibit</th>
                                <th class="p-3.5">Jumlah</th>
                                <th class="p-3.5">Total Harga</th>
                                <th class="p-3.5 rounded-tr-xl">Status Proses Admin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($pesanans as $index => $p)
                                <tr class="hover:bg-green-50/50 transition">
                                    <td class="p-3.5">{{ $index + 1 }}</td>
                                    <td class="p-3.5 text-xs text-gray-600">{{ $p->created_at->format('d M Y, H:i') }}</td>
                                    <td class="p-3.5 font-bold text-gray-900">{{ $p->varietas->nama_varietas }}</td>
                                    <td class="p-3.5 font-semibold">{{ number_format($p->jumlah_beli, 0, ',', '.') }} bibit</td>
                                    <td class="p-3.5 font-bold text-green-800">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                    <td class="p-3.5">
                                        @php
                                            $badgeColor = match($p->status) {
                                                'SELESAI' => 'bg-green-100 text-green-800 border-green-300',
                                                'MASIH DALAM PERJALANAN', 'SUDAH DI KIRIM' => 'bg-sky-100 text-sky-800 border-sky-300',
                                                'SUDAH DI KEMAS', 'SUDAH DI TERIMA' => 'bg-indigo-100 text-indigo-800 border-indigo-300',
                                                default => 'bg-amber-100 text-amber-800 border-amber-300',
                                            };
                                        @endphp
                                        <span class="px-3 py-1.5 rounded-full text-xs font-extrabold border {{ $badgeColor }}">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-8 text-center text-gray-500 text-sm">
                                        Anda belum memiliki riwayat pesanan bibit. Silakan pilih varietas di atas dan klik <strong>Beli Sekarang</strong>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <footer class="pt-4 pb-2 flex flex-wrap justify-between items-center text-xs text-gray-500 border-t border-green-100">
                <span>2026 &copy; SiBibit - Sistem Informasi Pembibitan Kelapa Sawit</span>
                <span>Tim Proyek 2 TI F - Politeknik Caltex Riau</span>
            </footer>

        </main>
    </div>

    <script>
        function toggleFormBeli(id) {
            const form = document.getElementById('form-beli-' + id);
            const btn = document.getElementById('btn-beli-' + id);
            form.classList.toggle('hidden');
            btn.classList.toggle('hidden');
        }

        function hitungTotal(id, hargaSatuan, jumlah) {
            const qty = parseInt(jumlah) || 0;
            const total = hargaSatuan * qty;
            document.getElementById('total-harga-' + id).innerText = 'Rp ' + total.toLocaleString('id-ID');
        }
    </script>
</body>
</html>
