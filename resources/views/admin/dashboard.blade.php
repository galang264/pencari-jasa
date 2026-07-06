@extends('layouts.admin')

@section('content')

<div class="card border-0 shadow-sm mb-4 bg-danger text-white">

<div class="card-body p-4">

    <h2>
        Halo, Admin 👋
    </h2>

    <p class="mb-0">
        Kelola seluruh aktivitas platform SeJasa Kita dari satu dashboard.
    </p>

</div>

</div>

<div class="row">

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-primary border-4">

        <div class="card-body text-center">

            <h1>👥</h1>

            <h5>Total User</h5>

            <h2>{{ $totalUsers }}</h2>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-success border-4">

        <div class="card-body text-center">

            <h1>🛠</h1>

            <h5>Total Mitra</h5>

            <h2>{{ $totalMitra }}</h2>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-warning border-4">

        <div class="card-body text-center">

            <h1>📂</h1>

            <h5>Total Jasa</h5>

            <h2>{{ $totalServices }}</h2>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card shadow-sm border-start border-danger border-4">

        <div class="card-body text-center">

            <h1>📦</h1>

            <h5>Total Pesanan</h5>

            <h2>{{ $totalOrders }}</h2>

        </div>

    </div>

</div>

</div>

<div class="row">

<div class="col-md-8">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="mb-0">
                    Pesanan Terbaru
                </h5>

                <a href="/admin/orders"
                   class="btn btn-sm btn-primary">

                    Lihat Semua

                </a>

            </div>

            <table class="table table-hover">

                <thead>

                    <tr>
                        <th>User</th>
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

</div>

<div class="col-md-4">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <h5 class="mb-3">
                Statistik Platform
            </h5>

            <div class="d-flex justify-content-between mb-3">

                <span>Total Review</span>

                <strong>
                    {{ $totalReviews }}
                </strong>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <span>Total User</span>

                <strong>
                    {{ $totalUsers }}
                </strong>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <span>Total Mitra</span>

                <strong>
                    {{ $totalMitra }}
                </strong>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <span>Total Jasa</span>

                <strong>
                    {{ $totalServices }}
                </strong>

            </div>

            <hr>

            <div class="text-center">

                <h6>Status Platform</h6>

                <span class="badge bg-success">
                    Online
                </span>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
