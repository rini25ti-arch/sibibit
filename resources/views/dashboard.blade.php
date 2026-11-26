<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SiBibit Kelapa Sawit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#f2f7f2] text-gray-800 font-sans m-0 p-0">

    <!-- WRAPPER FULL SCREEN (SIDEBAR KIRI + KONTEN KANAN) -->
    <div class="flex min-h-screen w-full">

        <!-- ========================================================= -->
        <!-- SIDEBAR KIRI (TEMA HIJAU SAWIT SERAGAM)                   -->
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
                        <span class="text-[11px] font-semibold text-green-700">Panel Admin</span>
                    </div>
                </div>

                <!-- Info Akun Admin -->
                <div class="mt-5 p-3.5 rounded-xl bg-green-50 border border-green-100">
                    <p class="text-[11px] font-semibold text-green-700">Login sebagai,</p>
                    <p class="text-sm font-extrabold text-green-950 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>

                <!-- Menu Navigasi Sidebar Admin -->
                <div class="mt-6 space-y-6">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Menu Utama</p>
                        <ul class="space-y-1 text-sm font-semibold">
                            <li>
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-800 text-white shadow-sm">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard Admin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('varietas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-flower1 text-green-700"></i>
                                    <span>Data Master Varietas</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Kelola Transaksi & Stok</p>
                        <ul class="space-y-1 text-xs font-semibold text-gray-600">
                            <li>
                                <a href="#kelola-stok" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-box-seam-fill text-green-700"></i>
                                    <span>1. Tambah Stok Bibit</span>
                                </a>
                            </li>
                            <li>
                                <a href="#pesanan-masuk" class="flex items-center justify-between px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <span class="flex items-center gap-2.5">
                                        <i class="bi bi-cart-check-fill text-amber-600"></i>
                                        <span>2. Pesanan & Pengiriman</span>
                                    </span>
                                    @if($pesananMasuk > 0)
                                        <span class="bg-amber-100 text-amber-900 text-[11px] font-extrabold px-2 py-0.5 rounded-full">
                                            {{ $pesananMasuk }}
                                        </span>
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="#daftar-pembeli" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-people-fill text-emerald-600"></i>
                                    <span>3. Daftar Pembeli Aktif</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tombol Logout Bawah Sidebar -->
            <div class="p-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 rounded-xl text-xs transition flex items-center justify-center gap-2 shadow-sm">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout Admin</span>
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
                    <h1 class="text-2xl font-extrabold text-green-950">Dashboard SiBibit</h1>
                    <p class="text-sm text-gray-500">Ringkasan Pengelolaan Pembibitan dan Penjualan Bibit Kelapa Sawit</p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="bg-white border border-green-200 hover:bg-green-50 text-green-900 font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                        <i class="bi bi-globe"></i>
                        <span>Lihat Halaman Publik</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-700 text-green-900 p-4 rounded-xl shadow-sm text-sm font-semibold flex items-center gap-2">
                    <i class="bi bi-check-circle-fill text-green-700 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 4 Kartu Ringkasan Atas (Tema Hijau Sawit) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-800 flex items-center justify-center text-xl">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Jenis Bibit</p>
                        <p class="text-xl font-extrabold text-gray-900">{{ $totalVarietas }} Varietas</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center text-xl">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Pembeli Aktif</p>
                        <p class="text-xl font-extrabold text-gray-900">{{ $pembelis->count() }} Orang</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Stok Siap Jual</p>
                        <p class="text-xl font-extrabold text-gray-900">{{ number_format($totalStok, 0, ',', '.') }} Bibit</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl">
                        <i class="bi bi-cart-check-fill"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Pesanan Belum Selesai</p>
                        <p class="text-xl font-extrabold text-gray-900">{{ $pesananMasuk }} Pesanan</p>
                    </div>
                </div>
            </div>

            <!-- ========================================================= -->
            <!-- 1. CRUD TAMBAH STOK BIBIT                                 -->
            <!-- ========================================================= -->
            <section id="kelola-stok" class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
                <div class="flex flex-wrap justify-between items-center border-b border-gray-100 pb-3 mb-4 gap-3">
                    <h2 class="text-lg font-bold text-green-950 flex items-center gap-2">
                        <span class="w-2.5 h-6 bg-green-700 rounded-full inline-block"></span>
                        <span>1. Kelola & Tambah Stok Bibit</span>
                    </h2>
                    <a href="{{ route('varietas.index') }}" class="bg-green-50 hover:bg-green-100 text-green-800 border border-green-200 font-bold px-4 py-2 rounded-xl text-xs transition">
                        Kelola Master Varietas &rarr;
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-800 text-white text-xs uppercase tracking-wider">
                                <th class="p-3.5 rounded-tl-xl">No</th>
                                <th class="p-3.5">Nama Varietas Bibit</th>
                                <th class="p-3.5">Kategori Lahan</th>
                                <th class="p-3.5">Harga Satuan</th>
                                <th class="p-3.5">Stok Saat Ini</th>
                                <th class="p-3.5 rounded-tr-xl" style="width: 230px;">Tambah Stok</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($varietas as $index => $b)
                                <tr class="hover:bg-green-50/50 transition">
                                    <td class="p-3.5">{{ $index + 1 }}</td>
                                    <td class="p-3.5 font-bold text-gray-900">{{ $b->nama_varietas }}</td>
                                    <td class="p-3.5">
                                        <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded-lg">
                                            {{ $b->kategori_lahan }}
                                        </span>
                                    </td>
                                    <td class="p-3.5 text-gray-700">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                                    <td class="p-3.5 font-extrabold text-green-800">{{ number_format($b->stok, 0, ',', '.') }} bibit</td>
                                    <td class="p-3.5">
                                        <form action="{{ route('admin.tambahStok', $b->id) }}" method="POST" class="flex gap-2">
                                            @csrf
                                            <input type="number" name="tambah_stok" min="1" required placeholder="Jml"
                                                   class="w-full border border-gray-300 rounded-lg px-2.5 py-1.5 text-xs font-bold focus:outline-none focus:border-green-700">
                                            <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold px-3 py-1.5 rounded-lg text-xs whitespace-nowrap transition shadow-sm">
                                                + Tambah
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-6 text-center text-gray-500">Belum ada data varietas bibit.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ========================================================= -->
            <!-- 2. CRUD PESANAN MASUK & UBAH STATUS PENGIRIMAN            -->
            <!-- ========================================================= -->
            <section id="pesanan-masuk" class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
                <div class="flex flex-wrap justify-between items-center border-b border-gray-100 pb-3 mb-4 gap-3">
                    <h2 class="text-lg font-bold text-green-950 flex items-center gap-2">
                        <span class="w-2.5 h-6 bg-amber-500 rounded-full inline-block"></span>
                        <span>2. Pesanan Masuk & Proses Status Pengiriman</span>
                    </h2>
                    <span class="text-xs text-gray-500">Perubahan status langsung terlihat di halaman Pembeli</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-800 text-white text-xs uppercase tracking-wider">
                                <th class="p-3.5 rounded-tl-xl">No</th>
                                <th class="p-3.5">Nama Pembeli</th>
                                <th class="p-3.5">Bibit Dipesan</th>
                                <th class="p-3.5">Jumlah</th>
                                <th class="p-3.5">Total Harga</th>
                                <th class="p-3.5">Status Saat Ini</th>
                                <th class="p-3.5 rounded-tr-xl" style="width: 310px;">Ubah Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($pesanans as $index => $p)
                                <tr class="hover:bg-green-50/50 transition">
                                    <td class="p-3.5">{{ $index + 1 }}</td>
                                    <td class="p-3.5">
                                        <p class="font-bold text-gray-900">{{ $p->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $p->user->no_hp }}</p>
                                    </td>
                                    <td class="p-3.5 font-semibold text-gray-800">{{ $p->varietas->nama_varietas }}</td>
                                    <td class="p-3.5 font-bold">{{ number_format($p->jumlah_beli, 0, ',', '.') }} bibit</td>
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
                                        <span class="px-3 py-1 rounded-full text-xs font-extrabold border {{ $badgeColor }}">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td class="p-3.5">
                                        <form action="{{ route('admin.updateStatus', $p->id) }}" method="POST" class="flex gap-2">
                                            @csrf
                                            <select name="status" class="w-full border border-gray-300 rounded-lg px-2.5 py-1.5 text-xs font-semibold bg-white focus:outline-none focus:border-green-700">
                                                @foreach(['MENUNGGU KONFIRMASI', 'SUDAH DI TERIMA', 'SUDAH DI KEMAS', 'SUDAH DI KIRIM', 'MASIH DALAM PERJALANAN', 'SELESAI'] as $status)
                                                    <option value="{{ $status }}" {{ $p->status == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-3.5 py-1.5 rounded-lg text-xs transition shadow-sm">
                                                Simpan
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-6 text-center text-gray-500">Belum ada pesanan masuk dari pembeli.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ========================================================= -->
            <!-- 3. DAFTAR PEMBELI TERDAFTAR & BERTRANSAKSI                -->
            <!-- ========================================================= -->
            <section id="daftar-pembeli" class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
                <div class="flex flex-wrap justify-between items-center border-b border-gray-100 pb-3 mb-4 gap-3">
                    <h2 class="text-lg font-bold text-green-950 flex items-center gap-2">
                        <span class="w-2.5 h-6 bg-emerald-600 rounded-full inline-block"></span>
                        <span>3. Daftar Pembeli Terdaftar & Bertransaksi</span>
                    </h2>
                    <span class="text-xs font-semibold text-green-800 bg-green-50 px-3 py-1 rounded-full">
                        Total {{ $pembelis->count() }} Pembeli
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-800 text-white text-xs uppercase tracking-wider">
                                <th class="p-3.5 rounded-tl-xl">No</th>
                                <th class="p-3.5">Nama Pembeli</th>
                                <th class="p-3.5">Nomor HP / WhatsApp</th>
                                <th class="p-3.5">Email</th>
                                <th class="p-3.5 rounded-tr-xl">Total Transaksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($pembelis as $index => $pembeli)
                                <tr class="hover:bg-green-50/50 transition">
                                    <td class="p-3.5">{{ $index + 1 }}</td>
                                    <td class="p-3.5 font-bold text-gray-900">{{ $pembeli->name }}</td>
                                    <td class="p-3.5 text-gray-700">{{ $pembeli->no_hp }}</td>
                                    <td class="p-3.5 text-gray-700">{{ $pembeli->email }}</td>
                                    <td class="p-3.5">
                                        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
                                            {{ $pembeli->pesanans_count }} kali pembelian
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-6 text-center text-gray-500">Belum ada pembeli yang bertransaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Footer -->
            <footer class="pt-4 pb-2 flex flex-wrap justify-between items-center text-xs text-gray-500 border-t border-green-100">
                <span>2026 &copy; SiBibit - Sistem Informasi Pembibitan Kelapa Sawit</span>
                <span>Tim Proyek 2 TI F - Politeknik Caltex Riau</span>
            </footer>

        </main>
    </div>

</body>
</html>
