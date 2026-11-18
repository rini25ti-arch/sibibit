<?php

namespace App\Http\Controllers;

use App\Models\Varietas;
use Illuminate\Http\Request;

class VarietasController extends Controller
{
    public function index()
    {
        $varietas = Varietas::latest()->get();
        return view('varietas.index', compact('varietas'));
    }

    public function create()
    {
        return view('varietas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_varietas' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'keunggulan'    => 'nullable|string',
        ]);

        Varietas::create($request->all());

        return redirect()->route('varietas.index')
                         ->with('success', 'Data varietas berhasil ditambahkan.');
    }

    public function edit(Varietas $varietas)
    {
        return view('varietas.edit', compact('varietas'));
    }

    public function update(Request $request, Varietas $varietas)
    {
        $request->validate([
            'nama_varietas' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'keunggulan'    => 'nullable|string',
        ]);

        $varietas->update($request->all());

        return redirect()->route('varietas.index')
                         ->with('success', 'Data varietas berhasil diperbarui.');
    }

    public function destroy(Varietas $varietas)
    {
        $varietas->delete();

        return redirect()->route('varietas.index')
                         ->with('success', 'Data varietas berhasil dihapus.');
    }
}