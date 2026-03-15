<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/', function(){
    return 'Halaman Homepage.<br>
            Selamat belajar Laravel.';
});

Route::get('about', function(){
    return 'Aplikasi <strong>Siswaku</strong> dibuat sebagai latihan untuk mempelajari Laravel.';
});

// membuat named route
Route::get('halaman-rahasia', ['as'=>'secret', function(){
    return 'Anda sedang mellihat
            <strong>Halaman Rahasia</strong>';
}]);

// mencoba named route
Route::get('showmesecret', function(){
    return redirect()->route('secret');
});

// membuat named route cara-2
Route::get('pesan-rahasia', function(){
    return 'Ini adalah pesan <b>RAHASIA</B>.';
})->name('rahasia');

// mencoba named route-2
Route::get('pesanr', function(){
    return redirect()->route('rahasia');
});

// membuat route redirect, ke route lain
Route::get('test', function(){
    return redirect('halaman-rahasia');
});
*/

/*
// membuat route di dalam sub folder dengan slash
Route::get('/', function(){
    return view('pages/homepage');
});

Route::get('about', function(){
    return view('pages/about');
});
*/

/*
// Membuat route di dalam sub-folder dengan dot
Route::get('/', function(){
    return view('pages.homepage');
});

Route::get('about', function(){
    $halaman = 'about';
    return view('pages.about', compact('halaman'));
});

// menampilkan daata ke dalam view
Route::get('siswa', function(){
    $siswa = [
        'Rasmus Ledorf',
        'Taylor Otwell',
        'Brendan Eich',
        'John Resig',
        'Charles Babage',
        'Linus Torvalds'
    ];
    $halaman = 'siswa';

    // mengirim $siswa dengan compact
    return view('siswa.index', compact('siswa','halaman'));

    // mengirim $siswa dengan with
    // return view('siswa.index')->with('siswa',$siswa);

    // mengirim $siswa dengan array
    // return view('siswa.index', ['siswa'=>$siswa]);
});
*/

/*
Route::get('halaman-rahasia', [
    'as' => 'secret',
    'uses' => 'RahasiaController@halamanRahasia'
]);
*/

// Named route rekomendasi
Route::get('halaman-rahasia','RahasiaController@halamanRahasia')->name('secret');
Route::get('showmesecret', 'RahasiaController@showMeSecret');

/**
 * Daftar routes untuk project aplikasi Siswaku
 */

// Routing dengan Controller
Route::get('/','PagesController@homepage');
Route::get('about','PagesController@about');

// Route => Menampilkan semua siswa
Route::get('siswa','SiswaController@index');

// Route => Menampilkan form tambah siswa
Route::get('siswa/create','SiswaController@create');

// Route => Menampilkan detail siswa
Route::get('siswa/{siswa}','SiswaController@show');

// Route => Memproses/ tambah siswa
Route::post('siswa','SiswaController@store');

// Route => Halaman edit siswa
Route::get('siswa/{siswa}/edit','SiswaController@edit');

// Route => Proses edit data siswa
Route::patch('siswa/{siswa}','SiswaController@update');

// Route => Menghapus data siswa
Route::delete('siswa/{siswa}', 'SiswaController@destroy');

// Menambah sample data siswa
Route::get('sampledata', function(){
    DB::table('siswa')->insert([
        [
            'nisn'          => '1001',
            'nama_siswa'    => 'Agus Yulianto',
            'tanggal_lahir' => '1990-02-12',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1002',
            'nama_siswa'    => 'Agustina Anggraeni',
            'tanggal_lahir' => '1990-02-13',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1003',
            'nama_siswa'    => 'Bayu Firmansyah',
            'tanggal_lahir' => '1990-02-14',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1004',
            'nama_siswa'    => 'Citra Rahmawati',
            'tanggal_lahir' => '1990-02-15',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1005',
            'nama_siswa'    => 'Dirgantara Laksana',
            'tanggal_lahir' => '1990-02-16',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1006',
            'nama_siswa'    => 'Eko Satrio',
            'tanggal_lahir' => '1990-02-17',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1007',
            'nama_siswa'    => 'Firda Ayu Larasati',
            'tanggal_lahir' => '1990-02-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1008',
            'nama_siswa'    => 'Galang Rambu Anarki',
            'tanggal_lahir' => '1990-02-19',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1009',
            'nama_siswa'    => 'Haris Purnoo',
            'tanggal_lahir' => '1990-02-20',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
        [
            'nisn'          => '1010',
            'nama_siswa'    => 'Indra Birowo',
            'tanggal_lahir' => '1990-02-21',
            'jenis_kelamin' => 'L',
            'created_at'    => '2016-03-10 19:10:15',
            'updated_at'    => '2016-03-10 19:10:15'
        ],
    ]);
    return 'Sample data telah dimasukkan!';
});

/**
 * Latihan Collection
 */
Route::get('koleksi','SiswaController@koleksi');
Route::get('koleksi1','SiswaController@koleksi1');
Route::get('koleksi2','SiswaController@koleksi2');
Route::get('koleksi3','SiswaController@koleksi3');
Route::get('koleksi4','SiswaController@koleksi4');
Route::get('koleksi5','SiswaController@koleksi5');
Route::get('koleksi6','SiswaController@koleksi6');
Route::get('koleksi7','SiswaController@koleksi7');
Route::get('koleksi8','SiswaController@koleksi8');
Route::get('koleksi9','SiswaController@koleksi9');
Route::get('koleksi10','SiswaController@koleksi10');