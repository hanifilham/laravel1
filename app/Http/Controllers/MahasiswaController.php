<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // PASTIKAN BARIS INI ADA

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar semua mahasiswa.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Mengambil semua data dari tabel 'mahasiswa'
        return view('mhs', compact('mahasiswa')); // Mengirim data ke view 'mhs'
    }

    /**
     * Menampilkan form untuk membuat data mahasiswa baru.
     */
    public function create()
    {
        return view('mhs-insert');
    }

    /**
     * Menyimpan data mahasiswa baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'nim' => 'required|string|unique:mahasiswa,nim|max:8',
            'nama' => 'required|string|max:35',
            'kelas' => 'required|string|max:50',
        ]);

        // Simpan data ke database menggunakan model Mahasiswa
        Mahasiswa::create($validatedData);

        // Redirect pengguna kembali ke halaman daftar mahasiswa dengan pesan sukses
        return redirect()->route('mhs-baru')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit data mahasiswa.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id); // Cari mahasiswa berdasarkan ID, atau tampilkan 404 jika tidak ditemukan
        return view('mhs-edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data seperti saat insert
        $validatedData = $request->validate([
            'nim' => 'required|string|unique:mahasiswa,nim,' . $id . '|max:20', // Tambahan: ,'.$id.' agar NIM yang sama tidak dianggap duplikat untuk mahasiswa yang sedang diedit
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id); // Cari mahasiswa yang akan diedit
        $mahasiswa->update($validatedData); // Perbarui data

        return redirect()->route('mhs-baru')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Menghapus data mahasiswa dari database.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id); // Cari mahasiswa berdasarkan ID
        $mahasiswa->delete(); // Hapus data

        return redirect()->route('mhs-baru')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}   