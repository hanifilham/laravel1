@extends('layouts.master')
@section('title', 'Data Mahasiswa') {{-- Ubah judul agar lebih umum --}}
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">Data Mahasiswa</h2> {{-- Ubah judul --}}

            {{-- Bagian untuk Menampilkan Pesan Sukses (dari insert/delete) --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th> {{-- Kolom Aksi tetap ada --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Cek apakah ada data mahasiswa --}}
                        @if($mahasiswa->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data mahasiswa.</td> {{-- colspan tetap 5 karena kolom Aksi ada --}}
                            </tr>
                        @else
                            @foreach($mahasiswa as $mhs)
                            <tr>
                                <td>{{ $loop->iteration }}</td> {{-- $loop->iteration akan memberikan nomor urut --}}
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->kelas }}</td>
                                <td>
                                    {{-- FORM UNTUK FUNGSI DELETE (sudah dikoreksi) --}}
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE') {{-- Penting: Laravel akan memprosesnya sebagai request DELETE --}}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection