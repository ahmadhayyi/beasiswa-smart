@extends('dashboard.layout.main')

@section('title')
    <title>Nilai Siswa</title>
@endsection

@section('heading')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nilai Siswa ({{ $data[0]->siswa->nama_lengkap }}) </h1>
    </div>
@endsection

@section('content')
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-bs-whatever="@mdo">Edit Nilai</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/{{ Request::path() }}/{{ $data[0]->id }}" method="POST">
            @csrf @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nilai Bobot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    @foreach ($data as $item)
                    <div class="mb-3">
                        <label for="{{ $item->id }}" class="col-form-label">{{ $item->bobot->kriteria }}</label>
                        <input type="number" class="form-control" name="nilai[{{ $item->id }}]" id="{{ $item->id }}" value="{{ $item->nilai }}" required>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard.components.alert')

<table class="table table-bordered col-6">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NAMA BOBOT</th>
            <th scope="col">NILAI</th>
            {{-- <th scope="col">GRADE</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->bobot->kriteria }}</td>
            <td>{{ $item->nilai }}</td>
            {{-- <td>{{ $item->nilai }}</td> --}}
        </tr>
        @php $sum[$key] = $item->nilai; @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2">JUMLAH BOBOT</th>
            <th>{{ collect($sum)->sum() != 0 ? collect($sum)->sum() : '' }}</th>
        </tr>
    </tfoot>
</table>
@endsection
