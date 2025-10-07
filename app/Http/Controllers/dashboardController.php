<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('dashboard', compact('anggota'));
    }

    public function create()
    {
        return view('admin.tambahdataanggota');
    }

    public function store(Request $request){
        $request->validate([
            'nim' => 'required|unique:anggota,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'nullable',
        ]);

        Anggota::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.editdataanggota', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:anggota,nim,' . $id,
            'nama' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'nullable',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Data anggota berhasil diupdate.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('dashboard')->with('success', 'Data anggota berhasil dihapus.');
    }
}
