<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - SiBibit Kelapa Sawit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#f2f7f2] text-gray-800 font-sans m-0 p-0">

    <div class="flex min-h-screen w-full">

        <!-- SIDEBAR KIRI (TEMA HIJAU SAWIT SERAGAM) -->
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
                                <a href="{{ route('dashboard') }}"
                                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-green-800 text-white shadow-sm' : 'text-gray-700 hover:bg-green-50 hover:text-green-800' }}">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard Admin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('varietas.index') }}"
                                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('varietas.*') ? 'bg-green-800 text-white shadow-sm' : 'text-gray-700 hover:bg-green-50 hover:text-green-800' }}">
                                    <i class="bi bi-flower1"></i>
                                    <span>Data Master Varietas</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 px-3 mb-2">Kelola Transaksi & Stok</p>
                        <ul class="space-y-1 text-xs font-semibold text-gray-600">
                            <li>
                                <a href="{{ route('dashboard') }}#kelola-stok" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-box-seam-fill text-green-700"></i>
                                    <span>1. Tambah Stok Bibit</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard') }}#pesanan-masuk" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
                                    <i class="bi bi-cart-check-fill text-amber-600"></i>
                                    <span>2. Pesanan & Pengiriman</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard') }}#daftar-pembeli" class="flex items-center gap-2.5 px-4 py-2.5 rounded-lg hover:bg-green-50 hover:text-green-800 transition">
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

        <!-- KONTEN UTAMA KANAN -->
        <main class="flex-1 min-w-0 p-6 lg:p-8 flex flex-col justify-between">
            <div class="space-y-6">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="pt-6 mt-8 pb-2 flex flex-wrap justify-between items-center text-xs text-gray-500 border-t border-green-100">
                <span>2026 &copy; SiBibit - Sistem Informasi Pembibitan Kelapa Sawit</span>
                <span>Tim Proyek 2 TI F - Politeknik Caltex Riau</span>
            </footer>
        </main>
    </div>

</body>
</html>
