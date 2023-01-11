@extends('dashboard.layout.main')

@section('title')
<title>Metode Smart</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Urutan Siswa Beasiswa</h1>
</div>
@include('dashboard.components.alert')
@endsection

@section('content')
<a class="btn btn-success my-2" href="/" target="_blank" role="button">Lihat Pengumuman</a>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="{{ $data->firstItem() + $loop->index <= $tampil->isi ? 'table-success' : '' }}">
                <td>{{ $data->firstItem() + $loop->index }}</td>
                <td>{{ $item->siswa->nisn }}</td>
                <td>{{ $item->siswa->nama_lengkap }}</td>
                <td>{{ date('d-m-Y',strtotime($item->siswa->tanggal_lahir)) }}</td>
                <td>{{ $item->siswa->jenis_kelamin == 'pria' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $item->hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('dashboard.components.pagination')
</div>
@endsection