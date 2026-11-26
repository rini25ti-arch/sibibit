<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun - SiBibit Kelapa Sawit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#f2f7f2] min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-green-100">

        <!-- SISI KIRI: BRANDING & INFO PERKEBUNAN SAWIT -->
        <div class="lg:col-span-5 bg-green-900 text-white p-8 md:p-10 flex flex-col justify-between relative overflow-hidden"
             style="background-image: linear-gradient(to bottom, rgba(16, 56, 26, 0.92), rgba(14, 48, 22, 0.95)), url('https://images.unsplash.com/photo-1590082871875-064201a2889b?auto=format&fit=crop&w=900&q=80'); background-size: cover; background-position: center;">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-green-200 hover:text-white mb-8 transition">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali ke Dashboard Utama</span>
                </a>

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-white text-green-900 rounded-2xl flex items-center justify-center text-2xl shadow">
                        🌴
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold tracking-tight leading-none">SiBibit</h1>
                        <span class="text-xs text-green-200">Kelapa Sawit Unggul</span>
                    </div>
                </div>

                <h2 class="text-2xl font-bold leading-snug mb-3">
                    Sistem Informasi Pengelolaan & Penjualan Bibit Kelapa Sawit
                </h2>
                <p class="text-sm text-green-100 leading-relaxed">
                    Masuk sebagai <strong>Pembeli</strong> untuk memesan varietas bibit bersertifikat dan memantau status pengiriman, atau masuk sebagai <strong>Admin</strong> untuk mengelola stok dan pesanan.
                </p>
            </div>

            <div class="pt-8 border-t border-green-800/80 text-xs text-green-200">
                &copy; 2026 SiBibit — Tim Proyek 2 TI F Politeknik Caltex Riau
            </div>
        </div>

        <!-- SISI KANAN: FORM LOGIN PEMBELI & ADMIN -->
        <div class="lg:col-span-7 p-8 md:p-12 flex flex-col justify-center">
            <div class="mb-6">
                <h3 class="text-2xl font-extrabold text-gray-900">Selamat Datang</h3>
                <p class="text-sm text-gray-500">Pilih jenis akun Anda untuk melanjutkan ke sistem.</p>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-600 text-red-700 text-xs p-3.5 rounded-lg mb-4 font-medium">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-600 text-red-700 text-xs p-3.5 rounded-lg mb-4 font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Tab Switcher -->
            <div class="grid grid-cols-2 gap-2 bg-gray-100 p-1.5 rounded-xl mb-6 text-xs font-bold">
                <button type="button" id="btn-tab-pembeli" onclick="switchTab('pembeli')" class="bg-green-800 text-white py-3 rounded-lg transition shadow-sm flex items-center justify-center gap-2">
                    <i class="bi bi-cart-fill"></i>
                    <span>Login Pembeli</span>
                </button>
                <button type="button" id="btn-tab-admin" onclick="switchTab('admin')" class="text-gray-600 py-3 rounded-lg transition flex items-center justify-center gap-2">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Login Admin</span>
                </button>
            </div>

            <!-- Form Login Pembeli -->
            <form id="form-pembeli" action="{{ route('login.pembeli') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-700">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Nomor HP / WhatsApp</label>
                    <input type="text" name="no_hp" required placeholder="0812xxxxxxxx" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-700">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Alamat Email</label>
                    <input type="email" name="email" required placeholder="nama@email.com" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-700">
                </div>
                <button type="submit" class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-3.5 rounded-xl text-sm transition shadow-md mt-2">
                    Masuk & Mulai Beli Bibit
                </button>
            </form>

            <!-- Form Login Admin -->
            <form id="form-admin" action="{{ route('login.admin') }}" method="POST" class="space-y-4 hidden">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Email Admin</label>
                    <input type="email" name="email" required placeholder="admin@sibibit.com" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-700">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Password</label>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-700">
                </div>
                <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-bold py-3.5 rounded-xl text-sm transition shadow-md mt-2">
                    Masuk ke Dashboard Admin
                </button>
            </form>
        </div>

    </div>

    <script>
        function switchTab(role) {
            const formPembeli = document.getElementById('form-pembeli');
            const formAdmin = document.getElementById('form-admin');
            const btnPembeli = document.getElementById('btn-tab-pembeli');
            const btnAdmin = document.getElementById('btn-tab-admin');

            if (role === 'pembeli') {
                formPembeli.classList.remove('hidden');
                formAdmin.classList.add('hidden');
                btnPembeli.className = 'bg-green-800 text-white py-3 rounded-lg transition shadow-sm flex items-center justify-center gap-2';
                btnAdmin.className = 'text-gray-600 py-3 rounded-lg transition flex items-center justify-center gap-2';
            } else {
                formPembeli.classList.add('hidden');
                formAdmin.classList.remove('hidden');
                btnAdmin.className = 'bg-gray-800 text-white py-3 rounded-lg transition shadow-sm flex items-center justify-center gap-2';
                btnPembeli.className = 'text-gray-600 py-3 rounded-lg transition flex items-center justify-center gap-2';
            }
        }
    </script>
</body>
</html>
