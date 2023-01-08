@extends('dashboard.layout.main')

@section('title')
    <title>Daftar Mapel</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Mapel</h1>
</div>
@include('dashboard.components.alert')
@endsection

@section('content')
{{-- @include('dashboard.components.create') --}}
<form class="row g-3 col-12 col-lg-8" action="/mapel" method="POST">
    @csrf @method('post')
    <div class="col-md-10">
        <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel"
            name="nama_mapel" placeholder="Nama Mapel" value="{{ old('nama_mapel') }}" required autofocus>
        @error('nama_mapel')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                <th scope="col">Nama Mapel</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $data->firstItem() + $loop->index }}</td>
                <td>{{ $item->nama_mapel }}</td>
                <td>
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
