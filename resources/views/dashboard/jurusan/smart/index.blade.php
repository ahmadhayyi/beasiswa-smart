@extends('dashboard.layout.main')

@section('title')
<title>Metode Smart</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-uppercase">Beasiswa {{ $jurusan->nama }}</h1>
</div>
@include('dashboard.components.alert')
@endsection

@section('content')
<a class="btn btn-success my-2" href="/" target="_blank" role="button">Lihat Pengumuman</a>

<h1 class="h2 my-3">Normalisasi</h1>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                <th scope="col">Kriteria</th>
                <th scope="col">C Min</th>
                <th scope="col">C Max</th>
                <th scope="col">Bobot Kriteria</th>
                <th scope="col">Normalisasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($normalisasi as $key => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bobot[$key]->kriteria }}</td>
                <td>{{ $bobot[$key]->min }}</td>
                <td>{{ $bobot[$key]->max }}</td>
                <td>{{ $bobot[$key]->bobot }}</td>
                <td><small>({{ $bobot[$key]->bobot }}/{{ $bobot->sum('bobot'); }}) * 100</small> = <br> {{
                    $normalisasi[$key] * 100 }} %</td>
            </tr>
            @endforeach
            <tr>
                <td>Total :</td>
                <td>{{ count($normalisasi) }} Kriteria</td>
                <td>{{ $bobot->sum('min'); }}</td>
                <td>{{ $bobot->sum('max'); }}</td>
                <td>{{ $bobot->sum('bobot'); }}</td>
                <td>100 %</td>
            </tr>
        </tbody>
    </table>
</div>

<h1 class="h2 my-3">Siswa yang terpilih</h1>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col" class="text-center">Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beasiswa as $siswa => $item)
            <tr class="table-success">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->siswa->nisn }}</td>
                <td>{{ $item->siswa->nama_lengkap }}</td>
                <td>{{ $item->siswa->tanggal_lahir }}</td>
                <td>{{ $item->siswa->jenis_kelamin == 'pria' ? 'Laki-Laki' : 'Perempuan' }}</td>
                <td class="text-center">{{ $item->hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h1 class="h2 my-3">Nilai Utility & Akhir</h1>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">No</th>
                {{-- <th scope="col">NISN</th> --}}
                <th scope="col">Nama Lengkap</th>
                @foreach ($bobot as $item)
                <th scope="col" class="text-center">{{ $item->kriteria }}</th>
                @endforeach
                <th scope="col" class="text-center">Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $siswa => $item)
            @php $no = $data->firstItem() + $loop->index; @endphp
            <tr class="{{ $data->firstItem() + $loop->index <= 0 ? 'table-success' : '' }}">
                <td>{{ $no }}</td>
                {{-- <td>{{ $item->siswa->nisn }}</td> --}}
                <td>{{ $item->siswa->nama_lengkap }}</td>
                @foreach ($bobot as $kriteria => $itemm)
                <td class="text-center">
                    <small>({{ $item->siswa->nilais[$kriteria]->nilai }}-{{ $itemm->min }}) / ({{ $itemm->max }}-{{ $itemm->min }})</small> <br> 
                    {{ $utility[$kriteria][$no-1] }}
                </td>
                @endforeach
                <td class="text-center">
                    <small>
                        @foreach ($normalisasi as $kriteria => $itemm)
                            ({{ $utility[$kriteria][$no-1] }}*{{ $itemm }})
                            @if ($kriteria !== count($normalisasi) - 1) +@endif 
                        @endforeach
                    </small> 
                    <br> {{ $item->hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('dashboard.components.pagination')
</div>
@endsection