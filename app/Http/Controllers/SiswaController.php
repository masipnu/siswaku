<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
/*
    // fungsi awal tanpa database
    public function index(){
        $siswa = [
            'Taylor Otwell',
            'Linus Torvalds',
            'Steve Jobs',
            'Rasmus Ledorf',
            'James Gosling'
        ];
        $halaman = 'siswa';
        return view('siswa.index', compact('siswa','halaman'));
    }
*/

    /**
     * Method untuk mengambil semua data siswa
     * dan menampilkan dalam halaman siswa
     */
    public function index(){
        // $halaman = 'siswa';
        // $siswa_list = Siswa::all()->sortBy('nisn');
        $siswa_list = Siswa::orderBy('nama_siswa','asc')->paginate(5);
        $jumlah_siswa = Siswa::all()->count();
        // return view('siswa.index', compact('halaman','siswa_list','jumlah_siswa'));
        return view('siswa.index', compact('siswa_list','jumlah_siswa'));
    }

    /**
     * Method untuk menampilkan detail per siswa
     */
    public function show($id){
        // $halaman = 'siswa';
        $siswa = Siswa::findOrFail($id);
        // return view('siswa.show', compact('halaman','siswa'));
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Method untuk menampilkan halaman tambah siswa
     */
    public function create(){
        // $halaman = 'siswa';
        // return view('siswa/create', compact('halaman'));
        return view('siswa/create');
    }

    /**
     * Method untuk memproses pemambahan data siswa
     */
    public function store(Request $request){
        /**
         * Meyimpan semua data siswa dari form dan menampilkan berupa data json
         */
        // $siswa = $request->all();
        // return $siswa;

        /**
         * Meyimpan semua data dengan input manual per key
         * Bagus jika form data hanya sedikit
         */
        // $siswa = new Siswa;
        // $siswa->nisn            = $request->nisn;
        // $siswa->nama_siswa      = $request->nama_siswa;
        // $siswa->tanggal_lahir   = $request->tanggal_lahir;
        // $siswa->jenis_kelamin   = $request->jenis_kelamin;
        // $siswa->save();
        // return redirect('siswa');

        /**
         * Membuat data dari form menjadi input array
         * Metode bagus jika data form banyak sekali
         */
        $input = $request->all();
        Siswa::create($input);
        return redirect('siswa');
    }

    /**
     * Method untuk menampilkan form edit siswa
     */
    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Method untuk memproses edit data siswa
     */
    public function update($id, Request $request){
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect('siswa');
    }

    /**
     * Method untuk hapus siswa
     */
    public function destroy($id){
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }

}
