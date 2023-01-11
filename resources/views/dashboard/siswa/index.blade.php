@extends('dashboard.layout.main')

@section('title')
    <title>Daftar Siswa</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Siswa</h1>
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
        </button>
    </div> --}}
</div>
@include('dashboard.components.alert')
@endsection

@section('content')
@include('dashboard.components.create')
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                {{-- <th scope="col">Alamat</th> --}}
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $data->firstItem() + $loop->index }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ date('d-m-Y',strtotime($item->tanggal_lahir)) }}</td>
                <td>{{ $item->jenis_kelamin == 'pria' ? 'Laki-laki' : 'Perempuan' }}</td>
                {{-- <td>{{ $item->alamat }}</td> --}}
                <td>
                    <a class="btn btn-primary btn-sm" href="/siswa/{{ $item->id }}/nilai"><i class="bi bi-star-fill"></i></a>
                    @include('dashboard.components.edit')
                    @include('dashboard.components.delete')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('dashboard.components.pagination')
</div>
@endsection
