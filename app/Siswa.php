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

    protected $dates = [
        'tanggal_lahir'
    ];

    // Membuat accessor dari tabel siswa agar nama menjadi sentence-case
    public function getNamaSiswaAttribute($nama_siswa){
        return ucwords($nama_siswa);
    }

    // membuat mutator agar menyimpan nama siswa dalam bentuk lower-case
    public function setNamaSiswaAttribute($nama_siswa){
        // return strtolower($nama_siswa);
        $this->attributes['nama_siswa'] = strtolower($nama_siswa);
    }
}
