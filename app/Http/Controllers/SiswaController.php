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
        $siswa_list = Siswa::orderBy('nisn','asc')->paginate(5);
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

    /**
     * Latihan Collection
     */

    // Merubah array menjadi collection
    public function koleksi(){
        $orang = [
            'rasmus ledorf',
            'taylor otwell',
            'brendan eich',
            'john resig'
        ];

        $collection = collect($orang)->map(function($nama){
            return ucwords($nama);
        });

        return $collection;
    }

    // Menampilkan semua data
    public function koleksi1(){
        $koleksi = Siswa::all();
        return $koleksi;
    }

    // Menampilkan data terakhir
    public function koleksi2(){
        $collection = Siswa::all()->last();
        return $collection;
    }

    // Mendapatkan jumlah koleksi
    public function koleksi3(){
        $koleksi = Siswa::all();
        $jumlah = $koleksi->count();
        return 'Jumlah siswa = ' . $jumlah;
    }

    // Mendapatkan jumlah koleksi - cara 2 (2 kali query)
    public function koleksi4(){
        $koleksi = Siswa::all();
        $jumlah = Siswa::count();

        return $jumlah;
    }

    // Mendapatkan beberapa data koleksi
    public function koleksi5(){
        $koleksi = Siswa::all()->take(3);
        return $koleksi;
    }

    // Mendapatkan salah satu atribut dari semua koleksi
    public function koleksi6(){
        $koleksi = Siswa::all()->pluck('nama_siswa');
        return $koleksi;
    }

    // Melakukan filter
    public function koleksi7(){
        $koleksi = Siswa::all();
        $filter = $koleksi->where('nama_siswa','Joko Santoso');
        return $filter;
    }

    // Mendapatkan data dengan filter beberapa nilai fix
    public function koleksi8(){
        $koleksi = Siswa::all();
        $filter = $koleksi->whereIn('nisn',['1003','1005','1013']);
        return $filter;
    }

    // Merubah data menjadi array
    public function koleksi9(){
        $koleksi = Siswa::select('nisn','nama_siswa')->take(3)->get();
            $data = $koleksi->toArray();
            foreach($data as $siswa){
                echo $siswa['nisn'].' - '.$siswa['nama_siswa'].'<br>';
            }
    }

    // Merubah data menjadi JSON
    public function koleksi10(){
        $data = [
            ['nisn'=>'1001', 'nama_siswa'=>'Agus Yulianto'],
            ['nisn'=>'1002', 'nama_siswa'=>'Agustina Anggraeni'],
            ['nisn'=>'1003', 'nama_siswa'=>'Bayu Firmansyah'],
        ];

        $koleksi = collect($data);
        $koleksi->toJson();
        return $koleksi;
    }
    
    /**
     * Date Mutator
     * Manipulasi tanggal dengan carbon instance
     */
    
    // Date Mutator1
    public function dateMutator1(){
        $siswa = Siswa::findOrFail(1);
        // test carbon instance
        // dd($siswa->created_at);
        return "Umur {$siswa->nama_siswa} adalah {$siswa->tanggal_lahir->age} tahun.";
    }

    // Date mutator2
    public function dateMutator2(){
        $siswa = Siswa::findOrFail(1);
        $nama = $siswa->nama_siswa;
        $tanggal = $siswa->tanggal_lahir->format('d-m-Y');
        $ultah = $siswa->tanggal_lahir->addYears(30)->format('d-m-Y');
        
        return "Siswa {$nama} lahir pada tanggal {$tanggal}.<br>
        Ulang tahun ke-30 akan jatuh pada tanggal {$ultah}.";
    }
}
