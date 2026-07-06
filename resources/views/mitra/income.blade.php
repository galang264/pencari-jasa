@extends('layouts.mitra')

@section('content')

<h1>Pendapatan</h1>

<p class="text-muted">
    Ringkasan pendapatan dan transaksi jasa Anda
</p>

<div class="row">

    <div class="col-md-4">
        <div class="card card-stat p-3">
            <h5>Hari Ini</h5>
            <h2>Rp {{ number_format($totalIncome,0,',','.') }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-stat p-3">
            <h5>Bulan Ini</h5>
            <h2>Rp {{ number_format($totalIncome,0,',','.') }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-stat p-3">
            <h5>Total Transaksi</h5>
            <<h2>{{ $completedCount }}</h2>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-8">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5 class="mb-4">
                    Grafik Pendapatan Bulanan
                </h5>

                <div class="d-flex align-items-end justify-content-between"
                     style="height:250px;">

                    <div class="text-center">
                        <div class="bg-primary rounded"
                             style="width:40px;height:80px;"></div>
                        <small>Jan</small>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary rounded"
                             style="width:40px;height:120px;"></div>
                        <small>Feb</small>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary rounded"
                             style="width:40px;height:160px;"></div>
                        <small>Mar</small>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary rounded"
                             style="width:40px;height:190px;"></div>
                        <small>Apr</small>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary rounded"
                             style="width:40px;height:220px;"></div>
                        <small>Mei</small>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary rounded"
                             style="width:40px;height:240px;"></div>
                        <small>Jun</small>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>
                    Statistik
                </h5>

                <hr>

                <p>Pesanan Selesai</p>
                <h4>{{ $completedCount }}</h4>

                <p>Pesanan Pending</p>
                <h4>{{ $pendingCount }}</h4>

                <p>Rating Rata-rata</p>
                <h4>⭐ 4.8</h4>

            </div>

        </div>

    </div>

</div>

@endsection