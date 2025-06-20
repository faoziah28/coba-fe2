@extends('layouts.app')

@section('content')
<h2>Tambah Mahasiswa</h2>

{{-- Form tambah mahasiswa --}}
<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    NIM: <input type="text" name="nim"><br>
    Nama: <input type="text" name="nama"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
