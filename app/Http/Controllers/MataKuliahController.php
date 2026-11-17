<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // Menampilkan seluruh data mata kuliah
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('matakuliah.index', compact('mataKuliahs'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('matakuliah.create');
    }

    // Proses simpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|unique:mata_kuliahs,kode_matakuliah',
            'nama_matakuliah' => 'required|string',
            'sks'             => 'required|integer|between:1,6',
        ], [
            'kode_matakuliah.required' => 'Kode mata kuliah wajib diisi.',
            'kode_matakuliah.unique'   => 'Kode mata kuliah sudah terdaftar, gunakan kode lain.',
            'nama_matakuliah.required' => 'Nama mata kuliah wajib diisi.',
            'sks.required'             => 'Jumlah SKS wajib diisi.',
            'sks.integer'              => 'Jumlah SKS harus berupa angka.',
            'sks.between'              => 'Jumlah SKS harus antara 1 sampai 6.',
        ]);

        MataKuliah::create([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks'             => $request->sks,
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }
}