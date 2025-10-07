<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\divisi;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::all();
        return view('divisi_index', compact('divisi'));
    }

    public function create()
    {
        return view('divisi_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|unique:divisi,nama_divisi',
        ]);

        Divisi::create($request->all());
        return redirect()->route('divisi_index')->with('success', 'Divisi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('divisi_edit', compact('divisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_divisi' => 'required|unique:divisi,nama_divisi,' . $id,
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->update($request->all());

        return redirect()->route('divisi_index')->with('success', 'Divisi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->route('divisi_index')->with('success', 'Divisi berhasil dihapus.');
    }
}
