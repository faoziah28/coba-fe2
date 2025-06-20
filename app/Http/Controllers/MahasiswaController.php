<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    // URL API tujuan
    protected $apiUrl = 'http://localhost:8080/mahasiswa';

    // Menampilkan semua data mahasiswa
    public function index()
    {
        $response = Http::get($this->apiUrl); // ambil data dari API
        $mahasiswa = $response->json();       // ubah JSON ke array PHP
        return view('mahasiswa.index', compact('mahasiswa')); // kirim ke view
    }

    // Tampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Proses simpan data baru
    public function store(Request $request)
    {
        Http::post($this->apiUrl, $request->all()); // kirim data ke API
        return redirect()->route('mahasiswa.index'); // kembali ke list
    }

    // Tampilkan form edit mahasiswa
    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}"); // ambil data satu mahasiswa
        $data = $response->json(); // ubah JSON ke array
        return view('mahasiswa.edit', compact('data'));
    }

    // Proses update data
    public function update(Request $request, $id)
    {
        Http::put("{$this->apiUrl}/{$id}", $request->all()); // kirim update ke API
        return redirect()->route('mahasiswa.index');
    }

    // Proses hapus data
    public function destroy($id)
    {
        Http::delete("{$this->apiUrl}/{$id}"); // kirim permintaan hapus ke API
        return redirect()->route('mahasiswa.index');
    }
}
