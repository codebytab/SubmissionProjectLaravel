@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <h1>Detail Mahasiswa</h1>
    <p><strong>NIM:</strong> {{ $mhs['nim'] }}</p>
    <p><strong>Nama:</strong> {{ $mhs['nama'] }}</p>
    <p><strong>Program Studi:</strong> {{ $mhs['prodi'] }}</p>
    <p><strong>IPK:</strong> {{ number_format($mhs['ipk'], 2) }}</p>

    <a href="{{ route('mahasiswa.daftar') }}">← Kembali ke Daftar</a>
@endsection