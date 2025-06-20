@extends('layouts.app')

@section('content')
<h2>Edit Mahasiswa</h2>

{{-- Form edit mahasiswa --}}
<form action="{{ route('mahasiswa.update', $data['id']) }}" method="POST">
    @csrf
    @method('PUT')
    NIM: <input type="text" name="nim" value="{{ $data['nim'] }}"><br>
    Nama: <input type="text" name="nama" value="{{ $data['nama'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
