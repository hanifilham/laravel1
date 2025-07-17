@extends('layouts.master')
@section('title', 'Edit Data Mahasiswa')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">Edit Data Mahasiswa</h2>
            {{-- Menggunakan route mahasiswa.update dengan ID mahasiswa yang akan diupdate --}}
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Penting: Ini akan mengubah method POST menjadi PUT/PATCH untuk update --}}
                <p class="text-muted mb-4">Silakan perbarui data mahasiswa di bawah ini.</p>
                
                <div class="form-group">
                    <label for="nim">NIM</label>
                    {{-- Pastikan value input diisi dengan data yang ada --}}
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas', $mahasiswa->kelas) }}" required>
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
                
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('mhs-baru') }}" class="btn btn-secondary">Kembali</a> {{-- Kembali ke daftar mahasiswa --}}
            </form>
        </div>
    </div>
</div>
@endsection