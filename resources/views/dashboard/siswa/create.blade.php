@extends('dashboard.layout.main')

@section('title')
    <title>Tambah Siswa</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Siswa</h1>
</div>
@endsection

@section('content')
<form class="row g-3 col-12 col-lg-8" action="/siswa" method="POST">
    @csrf @method('post')
    <div class="col-md-6">
        <label for="nisn" class="form-label">NISN</label>
        <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}" required autofocus>
        @error('nisn')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="nama_lengkap" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
        @error('nama_lengkap')
        <div class="invalid-feedback">
            {{ $message }}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        @error('tanggal_lahir')
        <div class="invalid-feedback">
            {{ $message }}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
            <option value="pria" @selected(old('jenis_kelamin') == "pria")>Laki-laki</option>
            <option value="wanita" @selected(old('jenis_kelamin') == "wanita")>Perempuan</option>
        </select>
        @error('jenis_kelamin')
        <div class="invalid-feedback">
            {{ $message }}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="jurusan_id" class="form-label">Jurusan</label>
        <select id="jurusan_id" class="form-select @error('jurusan_id') is-invalid @enderror text-uppercase" name="jurusan_id">
            @foreach ($jurusan as $item)
            <option class="text-uppercase" value="{{ $item->id }}" @selected(old('jurusan_id') == $item->id)>{{ $item->nama }}</option>
            @endforeach
        </select>
        @error('jurusan_id')
        <div class="invalid-feedback">
            {{ $message }}}
        </div>
        @enderror
    </div>
    <div class="col-12">
        <label for="alamat" class="form-label">Address</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30" rows="3">{{ old('alamat') }}</textarea>
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}}
        </div>
        @enderror
    </div>
    <div class="col-12 text-end">
        @include('dashboard.components.save')
    </div>
</form>
@endsection
