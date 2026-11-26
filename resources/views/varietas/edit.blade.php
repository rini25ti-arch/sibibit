@extends('layouts.sawit_admin')

@section('title', 'Edit Varietas Bibit')

@section('content')
    <div class="flex flex-wrap justify-between items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-green-950">Edit Varietas Bibit</h1>
            <p class="text-sm text-gray-500">Perbarui informasi {{ $varietas->nama_varietas }}</p>
        </div>
        <a href="{{ route('varietas.index') }}" class="bg-white border border-green-200 hover:bg-green-50 text-green-900 font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm transition">
            &larr; Kembali ke Daftar Varietas
        </a>
    </div>

    <div class="bg-white p-6 lg:p-8 rounded-2xl shadow-sm border border-green-100">
        <form action="{{ route('varietas.update', $varietas->id) }}" method="POST" class="space-y-5 text-sm">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Varietas Bibit *</label>
                    <input type="text" name="nama_varietas" required value="{{ $varietas->nama_varietas }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Kategori Lahan *</label>
                    <select name="kategori_lahan" required class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm bg-white focus:outline-none focus:border-green-700">
                        @foreach([
                            'Untuk Lahan Gambut & Lahan Marjinal',
                            'Untuk Lahan Kering & Mineral (Daratan)',
                            'Untuk Lahan Berbukit atau Rawan Penyakit (Ganoderma)'
                        ] as $kat)
                            <option value="{{ $kat }}" {{ $varietas->kategori_lahan == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Harga per Bibit (Rp) *</label>
                    <input type="number" name="harga" required value="{{ $varietas->harga }}" min="0"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5">Stok Saat Ini (Bibit) *</label>
                    <input type="number" name="stok" required value="{{ $varietas->stok }}" min="0"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="2"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">{{ $varietas->deskripsi }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Keunggulan Varietas</label>
                <textarea name="keunggulan" rows="3"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">{{ $varietas->keunggulan }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Cara Penanaman</label>
                <textarea name="cara_penanaman" rows="3"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-700">{{ $varietas->cara_penanaman }}</textarea>
            </div>

            <div class="pt-2 flex justify-end gap-3">
                <a href="{{ route('varietas.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-5 py-2.5 rounded-xl text-xs transition">
                    Batal
                </a>
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
