@extends('layouts.sawit_admin')

@section('title', 'Data Varietas Bibit')

@section('content')
    <!-- Header Atas -->
    <div class="flex flex-wrap justify-between items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-green-950">Data Varietas Bibit</h1>
            <p class="text-sm text-gray-500">Kelola daftar varietas kelapa sawit, kategori lahan, keunggulan, dan cara penanaman</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('varietas.create') }}" class="bg-green-800 hover:bg-green-900 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-sm flex items-center gap-2 transition">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Varietas</span>
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

    <!-- Tabel Data Varietas -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-green-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-green-800 text-white text-xs uppercase tracking-wider">
                        <th class="p-3.5 rounded-tl-xl">No</th>
                        <th class="p-3.5">Nama Varietas</th>
                        <th class="p-3.5">Kategori Lahan</th>
                        <th class="p-3.5">Harga & Stok</th>
                        <th class="p-3.5">Keunggulan</th>
                        <th class="p-3.5 rounded-tr-xl text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($varietas as $index => $item)
                        <tr class="hover:bg-green-50/50 transition">
                            <td class="p-3.5">{{ $index + 1 }}</td>
                            <td class="p-3.5">
                                <p class="font-bold text-gray-900">{{ $item->nama_varietas }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($item->deskripsi, 70) }}</p>
                            </td>
                            <td class="p-3.5">
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded-lg inline-block">
                                    {{ $item->kategori_lahan }}
                                </span>
                            </td>
                            <td class="p-3.5 whitespace-nowrap">
                                <p class="font-bold text-green-800">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                <p class="text-xs text-gray-500">Stok: {{ number_format($item->stok, 0, ',', '.') }} bibit</p>
                            </td>
                            <td class="p-3.5 text-xs text-gray-600 leading-relaxed">{{ $item->keunggulan ?? '-' }}</td>
                            <td class="p-3.5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('varietas.edit', $item->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-3 py-1.5 rounded-lg text-xs transition shadow-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('varietas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus varietas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-3 py-1.5 rounded-lg text-xs transition shadow-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
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
    </div>
@endsection
