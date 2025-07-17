<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MhsController extends Controller
{
    public function mhsBaru()
    {
        return view('mhs');
    }


    public function insert(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'jurusan' => 'required|string|max:100',
        ]);

        // Simpan data ke database (logika penyimpanan belum diimplementasikan)
        // Mungkin menggunakan model Mhs untuk menyimpan data

        return redirect()->route('mhs-insert')->with('success', 'Data mahasiswa berhasil disimpan!');
    }
    
}
