@extends('dashboard.layout.main')

@section('title')
    <title>Dashboard</title>
@endsection

@section('heading')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
@endsection

@section('content')

<div class="d-flex justify-content-between">
    <div class="card flex-fill me-3 py-2 bg-danger text-white">
        <div class="card-body">
            <h5 class="card-title mb-4">Jumlah Siswa</h5>
            <p class="card-text h5">{{ $siswa }}</p>
        </div>
    </div>
    <div class="card flex-fill mx-3 py-2 bg-primary text-white">
        <div class="card-body">
            <h5 class="card-title mb-4">Jumlah Admin</h5>
            <p class="card-text h5">{{ $admin }}</p>
        </div>
    </div>
    <div class="card flex-fill mx-3 py-2 bg-success text-white">
        <div class="card-body">
            <h5 class="card-title mb-4">Jumlah Bobot</h5>
            <p class="card-text h5">{{ $bobot }}</p>
        </div>
    </div>
    <div class="card flex-fill ms-3 py-2 bg-secondary text-white">
        <div class="card-body">
            <h5 class="card-title mb-4">Jumlah Jurusan</h5>
            <p class="card-text h5">{{ $jurusan }}</p>
        </div>
    </div>
</div>

<div id="chart"></div>

@php
    foreach ($chart as $key => $value) {
        $jml_bobot[$key] = $value->bobot;
        $jml_min[$key] = $value->min;
        $jml_max[$key] = $value->max;
    }
@endphp
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let jml_bobot = json_encode($jml_bobot);
        let jml_min = json_encode($jml_min);
        let jml_max = json_encode($jml_max);
        var options = {
        series: [{
        name: 'Jumlah Bobot',
        data: jml_bobot
        }, {
        name: 'Bobot Minimal',
        data: jml_min
        }, {
        name: 'Bobot Maximal',
        data: jml_max
        }],
        chart: {
        type: 'bar',
        height: 350
        },
        plotOptions: {
        bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
        },
        },
        dataLabels: {
        enabled: false
        },
        stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
        },
        xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May'],
        },
        yaxis: {
        title: {
        text: '$ (thousands)'
        }
        },
        fill: {
        opacity: 1
        },
        tooltip: {
        y: {
        formatter: function (val) {
        return "$ " + val + " thousands"
        }
        }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

    </script>
@endsection
