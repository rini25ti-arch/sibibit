<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use App\Models\Varietas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Halaman Utama Publik (welcome.blade.php)
    public function landing()
    {
        $varietasGroup = Varietas::all()->groupBy('kategori_lahan');
        return view('welcome', compact('varietasGroup'));
    }

    // Download Panduan PDF Langsung
    public function downloadPdf()
    {
        $pdf = Pdf::loadView('pdf.panduan');
        return $pdf->download('Panduan-Saran-Bibit-Sawit-SiBibit.pdf');
    }

    // Halaman Admin (Mengisi card & tabel di dashboard.blade.php Sneat Anda)
   public function index()
    {
        $varietas = Varietas::all();
        $totalVarietas = $varietas->count();
        $varietasTerbaru = Varietas::latest()->take(5)->get();
        $totalStok = $varietas->sum('stok');

        $pesanans = Pesanan::with(['user', 'varietas'])->latest()->get();
        $pesananMasuk = $pesanans->where('status', '!=', 'SELESAI')->count();
        $pembelis = User::where('role', 'pembeli')->has('pesanans')->withCount('pesanans')->get();

        return view('dashboard', compact(
            'varietas',
            'totalVarietas',
            'varietasTerbaru',
            'totalStok',
            'pesanans',
            'pesananMasuk',
            'pembelis'
        ));
    }

    // CRUD 1: Tambah Stok Bibit
    public function tambahStok(Request $request, $id)
    {
        $request->validate(['tambah_stok' => 'required|integer|min:1']);
        $bibit = Varietas::findOrFail($id);
        $bibit->increment('stok', $request->tambah_stok);

        return back()->with('success', 'Stok ' . $bibit->nama_varietas . ' berhasil ditambah!');
    }

    // CRUD 2: Update Status Pesanan
    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan #' . $pesanan->id . ' diperbarui menjadi ' . $request->status);
    }
}
