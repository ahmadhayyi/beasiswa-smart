@extends('dashboard.layout.main')

@section('title')
<title>Daftar Kriteria</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Kriteria</h1>
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
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Jumlah Bobot</th>
                <th scope="col">Bobot Minimal</th>
                <th scope="col">Bobot Maximal</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $data->firstItem() + $loop->index }}</td>
                <td>{{ $item->kriteria }}</td>
                <td>{{ $item->bobot }}</td>
                <td>{{ $item->min }}</td>
                <td>{{ $item->max }}</td>
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

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kondisi Ekonomi</h1>
</div>

<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                <th scope="col">Penghasilan Ortu</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Bobot</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>>= Rp. 1.000.000</td>
                <td>Sangat Tidak Mampu</td></td>
                <td>4</td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>< Rp. 1.000.000 - Rp. 2.000.000</td>
                <td>Tidak Mampu</td></td>
                <td>3</td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>< Rp. 2.000.000 - Rp. 3.000.000</td>
                <td>Kurang Mampu</td></td>
                <td>2</td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>< Rp. 3.000.000 - Rp. 5.000.000</td>
                <td>Mampu</td></td>
                <td>1</td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>< Rp. 5.000.000</td>
                <td>Sangat Mampu</td></td>
                <td>0</td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
