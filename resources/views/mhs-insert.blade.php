@extends('layouts.master')
@section('title', 'Insert Data Mahasiswa') {{-- Ganti title agar lebih spesifik --}}
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">Insert Data Mahasiswa</h2>

            {{-- Bagian untuk Menampilkan Pesan Sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Bagian untuk Menampilkan Pesan Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Terjadi Kesalahan:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('mhs-store') }}" method="POST"> {{-- UBAH INI: mhs-insert menjadi mhs-store --}}
                @csrf
                <p class="text-muted mb-4">Silakan masukkan data mahasiswa baru di bawah ini. Pastikan semua field diisi dengan benar.</p>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="number" class="form-control" id="nim" name="nim" required value="{{ old('nim') }}"> {{-- Tambah value="{{ old('nim') }}" agar input tidak hilang saat validasi gagal --}}
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}"> {{-- Tambah value="{{ old('nama') }}" --}}
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" required value="{{ old('kelas') }}"> {{-- Tambah value="{{ old('kelas') }}" --}}
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('mhs-baru') }}" class="btn btn-secondary">Kembali</a> {{-- UBAH INI: mhs-insert menjadi mhs-baru --}}
            </form>
        </div>
    </div>
</div>
@endsection