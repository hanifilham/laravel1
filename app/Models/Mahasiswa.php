<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'mahasiswa';

    // Kolom-kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
    ];

    // Jika primary key bukan 'id' atau bukan auto-increment, Anda bisa mendefinisikannya di sini.
    // protected $primaryKey = 'id';
    // public $incrementing = true;

    // Jika Anda tidak menggunakan timestamps (created_at dan updated_at), set ini menjadi false.
    // public $timestamps = true;
}