@extends('layouts.sawit_admin')

@section('title', 'Tambah Varietas Bibit')

@section('content')
    <div class="flex flex-wrap justify-between items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-green-950">Tambah Varietas Bibit Baru</h1>
            <p class="text-sm text-gray-500">Isi informasi lengkap varietas bibit kelapa sawit</p>
        </div>
        <a href="{{ route('varietas.index') }}" class="bg-white border border-green-200 hover:bg-green-50 text-green-900 font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm transition">
            &larr; Kembali ke Daftar Varietas
        </a>
    </div>

    <div class="bg-white p-6 lg:p-8 rounded-2xl shadow-sm border border-green-100">
        <form action="{{ route('varietas.store') }}" method="POST" class="space-y-5 text-sm">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Varietas Bibit *</label>
                    <input type="text" name="nama_varietas" required placeholder="Contoh: DxP Topaz 3 (Asian Agri)"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Kategori Lahan *</label>
                    <select name="kategori_lahan" required class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm bg-white focus:outline-none focus:border-green-700">
                        <option value="Untuk Lahan Gambut & Lahan Marjinal">Untuk Lahan Gambut & Lahan Marjinal</option>
                        <option value="Untuk Lahan Kering & Mineral (Daratan)">Untuk Lahan Kering & Mineral (Daratan)</option>
                        <option value="Untuk Lahan Berbukit atau Rawan Penyakit (Ganoderma)">Untuk Lahan Berbukit atau Rawan Penyakit (Ganoderma)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Harga per Bibit (Rp) *</label>
                    <input type="number" name="harga" required value="55000" min="0"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Stok Awal (Bibit) *</label>
                    <input type="number" name="stok" required value="100" min="0"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="2" placeholder="Deskripsi umum varietas..."
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Keunggulan Varietas</label>
                <textarea name="keunggulan" rows="3" placeholder="Tuliskan keunggulan hasil panen, ketahanan penyakit, dll..."
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Cara Penanaman</label>
                <textarea name="cara_penanaman" rows="3" placeholder="Tuliskan teknik lubang tanam, jarak tanam, dan perawatan awal..."
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700"></textarea>
            </div>

            <div class="pt-2 flex justify-end gap-3">
                <a href="{{ route('varietas.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-5 py-2.5 rounded-xl text-xs transition">
                    Batal
                </a>
                <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow transition">
                    Simpan Varietas
                </button>
            </div>
        </form>
    </div>
@endsection
