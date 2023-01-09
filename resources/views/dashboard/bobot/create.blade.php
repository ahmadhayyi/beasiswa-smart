@extends('dashboard.layout.main')

@section('title')
    <title>Tambah Bobot</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Bobot</h1>
</div>
@endsection

@section('content')
<form class="row g-3 col-12 col-lg-8" action="/bobot" method="POST">
    @csrf @method('post')
    <div class="col-md-6">
        <label for="kriteria" class="form-label">Nama Kriteria</label>
        <input type="text" class="form-control @error('kriteria') is-invalid @enderror" id="kriteria" name="kriteria" value="{{ old('kriteria') }}" required autofocus>
        @error('kriteria')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="bobot" class="form-label">Jumlah Bobot</label>
        <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
        @error('bobot')
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
