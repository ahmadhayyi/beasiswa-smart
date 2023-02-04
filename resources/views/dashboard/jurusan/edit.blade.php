@extends('dashboard.layout.main')

@section('title')
<title>Edit Jurusan</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Jurusan</h1>
</div>
@endsection

@section('content')
<form class="row g-3 col-12 col-lg-6" action="/jurusan/{{ $data->id }}" method="POST">
    @csrf @method('put')
    <div class="col-md-12">
        <label for="nama" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $data->nama) }}" required>
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-12">
        <label for="beasiswa" class="form-label">Total Beasiswa</label>
        <input type="number" class="form-control @error('beasiswa') is-invalid @enderror" id="beasiswa" name="beasiswa"
            value="{{ old('beasiswa', $data->beasiswa) }}" required>
        @error('beasiswa')
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