@extends('dashboard.layout.main')

@section('title')
<title>Daftar Jurusan</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Jurusan</h1>
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
                <th scope="col">Nama Jurusan</th>
                <th scope="col">Total Siswa</th>
                <th scope="col">Total Beasiswa</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-uppercase">{{ $item->nama }}</td>
                <td class="text-uppercase">{{ $item->siswas->count() }}</td>
                <td class="text-uppercase">{{ $item->beasiswa }}</td>
                <td>
                    @include('dashboard.components.edit')
                    @if ($item->siswas->count())
                    <a class="btn btn-secondary btn-sm" href="/{{ Request::path() }}/{{ $item->id }}/smart">SMART</a>
                    @endif
                    @if (!$item->siswas->count()) @include('dashboard.components.delete') @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @include('dashboard.components.pagination') --}}
</div>

@endsection
