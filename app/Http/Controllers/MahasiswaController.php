<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // a. Method profil()
    public function profil()
    {
        $nama = 'Tabah Nurahmat';
        $nim = '232520011';
        $prodi = 'Teknologi Informasi';

        return view('mahasiswa.profil', compact('nama', 'nim', 'prodi'));
    }

    // b. Method daftar()
    public function daftar()
    {
        $mahasiswa = [
            ['nama' => 'Tabah Nurahmat', 'nim' => '232520011', 'ipk' => 3.85],
            ['nama' => 'Rio Kurniawan', 'nim' => '232520012', 'ipk' => 3.40],
            ['nama' => 'Aqiel Muhamamd Harits', 'nim' => '232520013', 'ipk' => 2.80],
            ['nama' => 'Alreva Cahya Prayogi', 'nim' => '232520014', 'ipk' => 2.90],
            ['nama' => 'Yusuf Abdullah', 'nim' => '232520015', 'ipk' => 1.60],
        ];

        return view('mahasiswa.daftar', compact('mahasiswa'));
    }

    // c. Method detail()
    public function detail($nim)
    {
        $dataMahasiswa = [
            '232520011' => ['nama' => 'Tabah Nurahmat', 'nim' => '232520011', 'prodi' => 'Teknologi Informasi', 'ipk' => 3.85],
            '232520012' => ['nama' => 'Rio Kurniawan', 'nim' => '232520012', 'prodi' => 'Teknologi Informasi', 'ipk' => 3.40],
            '232520013' => ['nama' => 'Aqiel Muhammad Harits', 'nim' => '232520013', 'prodi' => 'Teknologi Informasi', 'ipk' => 2.80],
            '232520014' => ['nama' => 'Alreva Cahya Prayogi', 'nim' => '232520014', 'prodi' => 'Teknologi Informasi', 'ipk' => 2.90],
            '232520015' => ['nama' => 'Yusuf Abdullah', 'nim' => '232520015', 'prodi' => 'Teknologi Informasi', 'ipk' => 1.60],
        ];

        if (!isset($dataMahasiswa[$nim])) {
            abort(404);
        }

        $mhs = $dataMahasiswa[$nim];

        return view('mahasiswa.detail', compact('mhs'));
    }
}