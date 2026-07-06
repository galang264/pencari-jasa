@extends('layouts.mitra')

@section('content')

<div class="card border-0 shadow-sm mb-4 bg-primary text-white">

<div class="card-body p-4">

    <h2>
        Halo, {{ auth()->user()->name }} 👋
    </h2>

    <p class="mb-0">
        Kelola jasa dan pantau perkembangan bisnis Anda.
    </p>

</div>

</div>

<div class="row">

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-primary border-4">

        <div class="card-body text-center">

            <h1>🛠</h1>

            <h5>Total Jasa</h5>

            <h2>{{ $totalServices }}</h2>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-warning border-4">

        <div class="card-body text-center">

            <h1>📦</h1>

            <h5>Pending</h5>

            <h2>{{ $pendingOrders }}</h2>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-success border-4">

        <div class="card-body text-center">

            <h1>✅</h1>

            <h5>Completed</h5>

            <h2>{{ $completedOrders }}</h2>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-info border-4">

        <div class="card-body text-center">

            <h1>⭐</h1>

            <h5>Rating</h5>

            <h2>{{ $averageRating }}</h2>

        </div>

    </div>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

    <div class="card shadow-sm border-start border-success border-4">

        <div class="card-body text-center">

            <h1>💰</h1>

            <h5>Total Pendapatan</h5>

            <h3 class="text-success">

                Rp {{ number_format($income,0,',','.') }}

            </h3>

        </div>

    </div>

</div>

<div class="col-md-6 mb-3">

    <div class="card shadow-sm border-start border-primary border-4">

        <div class="card-body text-center">

            <h1>📝</h1>

            <h5>Total Review</h5>

            <h3>{{ $totalReviews }}</h3>

        </div>

    </div>

</div>

</div>

<div class="card shadow-sm border-0 mt-3">

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h5 class="mb-0">
            Pesanan Terbaru
        </h5>

        <a
            href="/mitra/orders"
            class="btn btn-primary btn-sm">

            Lihat Semua

        </a>

    </div>

    <table class="table table-hover">

        <thead>

            <tr>

                <th>Pelanggan</th>
                <th>Jasa</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

        @forelse($latestOrders as $order)

            <tr>

                <td>
                    {{ $order->user?->name ?? '-' }}
                </td>

                <td>
                    {{ $order->service?->title ?? '-' }}
                </td>

                <td>

                    @if($order->status == 'pending')

                        <span class="badge bg-warning text-dark">
                            Pending
                        </span>

                    @elseif($order->status == 'accepted')

                        <span class="badge bg-primary">
                            Accepted
                        </span>

                    @elseif($order->status == 'completed')

                        <span class="badge bg-success">
                            Completed
                        </span>

                    @elseif($order->status == 'rejected')

                        <span class="badge bg-danger">
                            Rejected
                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center">

                    Belum ada pesanan.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</div>

@endsection
