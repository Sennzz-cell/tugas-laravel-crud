<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::latest()->get();
        return view('penerbit.index', compact('penerbits'));
    }

    public function create()
    {
        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penerbit' => 'required|string|max:255',
            'kontak'        => 'required|string|max:255',
            'sales'         => 'required|string|max:255',
            'alamat'        => 'required|string',
            'wilayah'       => 'required|string|max:255',
        ], [
            'required' => 'Semua kolom wajib diisi.',
        ]);

        Penerbit::create($validated);

        return redirect()->route('penerbit.index')->with('pesan', 'tambah');
    }

    public function edit(Penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, Penerbit $penerbit)
    {
        $validated = $request->validate([
            'nama_penerbit' => 'required|string|max:255',
            'kontak'        => 'required|string|max:255',
            'sales'         => 'required|string|max:255',
            'alamat'        => 'required|string',
            'wilayah'       => 'required|string|max:255',
        ], [
            'required' => 'Semua kolom wajib diisi.',
        ]);

        $penerbit->update($validated);

        return redirect()->route('penerbit.index')->with('pesan', 'edit');
    }

    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return redirect()->route('penerbit.index')->with('pesan', 'hapus');
    }
}