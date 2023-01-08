@extends('dashboard.layout.main')

@section('title')
<title>Edit Mapel</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Mapel</h1>
</div>
@endsection

@section('content')
<form class="row g-3 col-12 col-lg-6" action="/mapel/{{ $data->id }}" method="POST">
    @csrf @method('put')
    <div class="col-md-12">
        <label for="nama_mapel" class="form-label">Nama Mapel</label>
        <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel"
            name="nama_mapel" value="{{ old('nama_mapel', $data->nama_mapel) }}" required autofocus>
        @error('nama_mapel')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-12 text-end">
        @include('dashboard.components.save')
    </div>
</form>
@endsection
