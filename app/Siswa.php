<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    // Menggunakan method store - opsi array untuk menambah data (Mass Assigment)
    // Menentukan form/ kolom (pada database) apa saja yang bisa diisi oleh user
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin'
    ];
}
