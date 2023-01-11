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
<form class="row g-3 col-12 col-lg-6" action="/bobot" method="POST">
    @csrf @method('post')
    <div class="col-md-12">
        <label for="kriteria" class="form-label">Nama Kriteria</label>
        <input type="text" class="form-control @error('kriteria') is-invalid @enderror" id="kriteria" name="kriteria" value="{{ old('kriteria') }}" required autofocus>
        @error('kriteria')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="bobot" class="form-label">Total Bobot : 50 %</label>
        <input type="range" class="form-range" min="0" max="100" step="1" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
    </div>
    <div class="col-md-4">
        <label for="bobot" class="form-label">Bobot Minimal : 50</label>
        <input type="range" class="form-range" min="0" max="100" step="1" id="bobot" name="min" value="{{ old('min') }}"
            required>
    </div>
    <div class="col-md-4">
        <label for="bobot" class="form-label">Bobot Maximal : 50</label>
        <input type="range" class="form-range" min="0" max="100" step="1" id="bobot" name="max" value="{{ old('max') }}"
            required>
    </div>
    <div class="col-12 text-end">
        @include('dashboard.components.save')
    </div>
</form>
@endsection

@section('footer')
    <script>
        const range = document.querySelectorAll('input[type="range"]');
        const value = document.querySelectorAll('label[for="bobot"]');
        
        range.forEach((r, i) => {
            r.addEventListener('input', () => {
                i == 0 ? value[i].textContent = `Total Bobot : ${r.value} %` : '';
                i == 1 ? value[i].textContent = `Bobot Minimal : ${r.value}` : '';
                i == 2 ? value[i].textContent = `Bobot Maximal : ${r.value}` : '';
            });
        });

    </script>
@endsection