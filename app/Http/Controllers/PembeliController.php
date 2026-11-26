<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Varietas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function index()
    {
        $varietasGroup = Varietas::all()->groupBy('kategori_lahan');
        $pesanans = Pesanan::with('varietas')->where('user_id', Auth::id())->latest()->get();

        return view('pembeli.dashboard', compact('varietasGroup', 'pesanans'));
    }

    public function beli(Request $request)
    {
        $request->validate([
            'varietas_id' => 'required|exists:varietas,id',
            'jumlah_beli' => 'required|integer|min:1',
        ]);

        $bibit = Varietas::findOrFail($request->varietas_id);

        if ($bibit->stok < $request->jumlah_beli) {
            return back()->with('error', 'Stok bibit tidak mencukupi!');
        }

        $bibit->decrement('stok', $request->jumlah_beli);

        Pesanan::create([
            'user_id'     => Auth::id(),
            'varietas_id' => $bibit->id,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $bibit->harga * $request->jumlah_beli,
            'status'      => 'MENUNGGU KONFIRMASI',
        ]);

        return back()->with('success', 'Pesanan bibit ' . $bibit->nama_varietas . ' berhasil dibuat!');
    }
}
