<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use Illuminate\Http\Request;

class RotiController extends Controller
{
    public function index()
    {
        $rotis = Roti::all();
        return view('rotis.index', compact('rotis'));
    }

    public function create()
    {
        return view('rotis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        Roti::create($request->all());
        return redirect()->route('rotis.index')->with('success', 'Roti berhasil ditambahkan');
    }

    public function edit(Roti $roti)
    {
        return view('rotis.edit', compact('roti'));
    }

    public function update(Request $request, Roti $roti)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $roti->update($request->all());
        return redirect()->route('rotis.index')->with('success', 'Roti berhasil diperbarui');
    }

    public function destroy(Roti $roti)
    {
        $roti->delete();
        return redirect()->route('rotis.index')->with('success', 'Roti berhasil dihapus');
    }
}
