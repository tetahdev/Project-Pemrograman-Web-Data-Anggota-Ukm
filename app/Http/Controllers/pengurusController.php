<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;
use App\Models\Divisi; 
use App\Models\Anggota;
class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::with('divisi')->get();
        return view('pengurus_index', compact('pengurus'));
    }

    public function create()
    {
    $divisi = Divisi::all();
    $anggota = \App\Models\Anggota::all();
    return view('pengurus_create', compact('divisi', 'anggota'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'anggota_id' => 'required|exists:anggota,id',
        'divisi_id'  => 'required|exists:divisi,id',
        'jabatan'    => 'required|string|max:100',
    ]);

    Pengurus::create($validated);

    return redirect()->route('pengurus.index')->with('success', 'Pengurus berhasil ditambahkan.');
}


    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $divisi = Divisi::all();
        $anggota  = Anggota::all();
        return view('pengurus_edit', compact('pengurus','divisi', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anggota_id' => 'required',
            'jabatan' => 'required',
            'divisi_id' => 'required|exists:divisi,id',
        ]);

        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update($request->all());

        return redirect()->route('pengurus_index')->with('success', 'Pengurus berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->delete();

        return redirect()->route('pengurus_index')->with('success', 'Pengurus berhasil dihapus.');
    }
}
