@extends('layouts.app') {{-- Layout utama --}}

@section('content')
<h2>Data Mahasiswa</h2>

{{-- Tombol tambah --}}
<a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>

{{-- Tabel data --}}
<table border="1">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach($mahasiswa as $m)
    <tr>
        <td>{{ $m['nim'] }}</td>
        <td>{{ $m['nama'] }}</td>
        <td>
            {{-- Tombol edit --}}
            <a href="{{ route('mahasiswa.edit', $m['id']) }}">Edit</a>

            {{-- Form hapus --}}
            <form action="{{ route('mahasiswa.destroy', $m['id']) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus data?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
