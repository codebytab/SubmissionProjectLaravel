@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa</h1>

    {{-- d. Tampilkan alert jika ada IPK di bawah 2.0 --}}
    @php
        $adaIpkRendah = collect($mahasiswa)->contains(fn($mhs) => $mhs['ipk'] < 2.0);
    @endphp

    @if($adaIpkRendah)
        <x-alert tipe="bahaya">
            <strong>Peringatan!</strong> Terdapat mahasiswa dengan IPK di bawah 2,0 yang memerlukan evaluasi khusus.
        </x-alert>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>IPK</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $mhs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mhs['nim'] }}</td>
                    <td>{{ $mhs['nama'] }}</td>
                    <td>{{ number_format($mhs['ipk'], 2) }}</td>
                    <td>
                        @if($mhs['ipk'] >= 3.5)
                            Cum Laude
                        @elseif($mhs['ipk'] >= 3.0)
                            Baik
                        @else
                            Perlu ditingkatkan
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('mahasiswa.detail', ['nim' => $mhs['nim']]) }}">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection