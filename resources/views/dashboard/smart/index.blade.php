@extends('dashboard.layout.main')

@section('title')
<title>Metode Smart</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Urutan Siswa Beasiswa</h1>
</div>
@include('dashboard.components.alert')
@endsection

@section('content')
<a class="btn btn-success my-2" href="/" target="_blank" role="button">Lihat Pengumuman</a>

<h1 class="h2 my-3">Cari Normalisasi</h1>
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
            @foreach ($normalisasi as $key =>  $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bobot[$key]->kriteria }}</td>
                <td>{{ $bobot[$key]->min }}</td>
                <td>{{ $bobot[$key]->max }}</td>
                <td>{{ $bobot[$key]->bobot }}</td>
                <td>((<small>{{ $bobot[$key]->bobot }}/{{ $bobot->sum('bobot'); }})*100)</small> <br> {{ $normalisasi[$key] * 100 }}</td>
            </tr>
            @endforeach
            <tr>
                <td>Total :</td>
                <td>{{ count($normalisasi) }}</td>
                <td>{{ $bobot->sum('min'); }}</td>
                <td>{{ $bobot->sum('max'); }}</td>
                <td>{{ $bobot->sum('bobot'); }}</td>
                <td>100 %</td>
            </tr>
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
            @foreach ($data1 as $siswa => $item)
            <tr class="{{ $data1->firstItem() + $loop->index <= $jumlah1->beasiswa ? 'table-success' : '' }}">
                <td>{{ $data1->firstItem() + $loop->index }}</td>
                {{-- <td>{{ $item->siswa->nisn }}</td> --}}
                <td>{{ $item->siswa->nama_lengkap }}</td>
                @foreach ($bobot as $kriteria => $itemm)
                <td class="text-center"><small>(({{ $item->siswa->nilais[$kriteria]->nilai }}-{{ $itemm->min }})/({{ $itemm->max }}-{{ $itemm->min }}))</small> <br> {{ $utility1[$kriteria][$siswa] }}</td>
                @endforeach
                <td class="text-center">{{ $item->hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end mt-5">
            @if (!$data1->onFirstPage())
            <li class="page-item">
                <a class="page-link" href="{{ $data1->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @endif
            @if ($data1->currentPage() > 3)
            <li class="page-item"><a class="page-link" href="{{ $data1->url(1) }}">1</a></li>
            <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
            @for ($i = max($data1->currentPage()-2, 1); $i <= min(max($data1->currentPage()-2, 1)+4,$data1->lastPage());
                $i++)
                <li class="page-item {{ $i == $data1->currentPage() ? 'active' : '' }}"><a class="page-link"
                        href="{{ $data1->url($i) }}">{{ $i }}</a></li>
                @endfor
                @if ($data1->currentPage() < $data1->lastPage()-2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="{{ $data1->url($data1->lastPage()) }}">{{
                            $data1->lastPage() }}</a></li>
                    @endif
                    @if ($data1->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data1->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    @endif
        </ul>
    </nav>
</div>
@endsection