<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anggota;
use App\Models\divisi;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota_index', compact('anggota'));
    }

    public function create()
    {
        $divisi = Divisi::all();
        return view('anggota_create', compact('divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'   => 'required|unique:anggota,nim',
            'nama'  => 'required',
            'prodi' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'jabatan' => 'nullable',
            'divisi_id' => 'nullable|exists:divisi,id',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload foto kalau ada
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto'), $filename);
            $data['foto'] = $filename;
        }

        Anggota::create($data);
        return redirect()->route('dashboard')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $divisi = Divisi::all();
        return view('anggota_edit', compact('anggota','divisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim'   => 'required|unique:anggota,nim,' . $id,
            'nama'  => 'required',
            'prodi' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'jabatan' => 'nullable',
            'divisi_id' => 'nullable|exists:divisi,id',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $anggota = Anggota::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
        $filename = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('foto'), $filename); // simpan ke public/image
        $data['foto'] = $filename;
}



        $anggota->update($data);
        return redirect()->route('dashboard')->with('success', 'Data anggota berhasil diupdate.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('dashboard')->with('success', 'Data anggota berhasil dihapus.');
    }
}
