<h1>Detail Jurusan</h1>

<ul>
    <li><strong>Kode:</strong> {{ $jurusan->kode }}</li>
    <li><strong>Nama Jurusan:</strong> {{ $jurusan->nama }}</li>
    <li><strong>Dibuat pada:</strong> {{ $jurusan->created_at?->format('d-m-Y H:i') }}</li>
</ul>

<a href="{{ url('/jurusan') }}">Kembali ke Daftar</a>