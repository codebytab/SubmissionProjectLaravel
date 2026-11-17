<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
</head>
<body>
    <h1>Daftar Mata Kuliah</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('matakuliah.create') }}">Tambah Mata Kuliah</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mataKuliahs as $mk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mk->kode_matakuliah }}</td>
                    <td>{{ $mk->nama_matakuliah }}</td>
                    <td>{{ $mk->sks }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>