@extends('template')

@section('main')
<div id="siswa">
    <h2>Siswa
        <span>
            {{ link_to('siswa/create', 'Tambah Siswa', ['class'=>'btn btn-primary pull-right']) }}
        </span>
    </h2>

    @if(!empty($siswa_list))
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tgl. Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa_list as $siswa)
                    <tr>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nama_siswa }}</td>
                        <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>
                            <div class="box-button">
                                {{ link_to('siswa/' . $siswa->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {{ link_to('siswa/' . $siswa->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method'=>'DELETE', 'action'=>['SiswaController@destroy', $siswa->id]]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak adan data siswa.</p>
    @endif

    <div class="table-nav">
        <div class="jumlah-data">
            <b>Jumlah siswa : {{ $jumlah_siswa }}</b>
        </div>
        <div class="paging">
            {{ $siswa_list->links() }}
        </div>
    </div>
    
</div>
@stop

@section('footer')
    @include('footer')
@stop