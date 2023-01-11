@extends('dashboard.layout.main')

@section('title')
<title>Setting</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan</h1>
</div>
@include('dashboard.components.alert')
@endsection

@section('content')
<form class="row g-3 col-12 col-lg-4" action="/setting/{{ $tampil->id }}" method="POST">
    @csrf @method('put')
    <div class="col-md-8">
        <input type="number" class="form-control @error('isi') is-invalid @enderror" id="isi"
            name="isi" placeholder="Jumlah Beasiswa" value="{{ old('isi', $tampil->isi) }}" required autofocus>
        @error('isi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="col-md-1">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

@endsection