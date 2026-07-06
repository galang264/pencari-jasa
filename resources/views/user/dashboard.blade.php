@extends('layouts.user')

@section('content')

<!-- Hero Section -->

<div class="card border-0 bg-primary text-white mb-4">

    <div class="card-body py-4">

        <h2>

            Halo, {{ auth()->user()->name }} 👋

        </h2>

        <p class="mb-3">

            Temukan jasa terbaik untuk kebutuhan Anda.

        </p>

        <a
            href="/user/services"
            class="btn btn-light">

            🔍 Cari Jasa Sekarang

        </a>

    </div>

</div>

<!-- Statistik -->

<div class="row g-4 mb-4">

    <div class="col-md-3">

        <div class="card shadow-sm border-0 text-center p-3">

            <h1>📦</h1>

            <h5>Total Pesanan</h5>

            <h2>{{ $totalOrders }}</h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0 text-center p-3">

            <h1>⏳</h1>

            <h5>Pending</h5>

            <h2>{{ $pendingOrders }}</h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0 text-center p-3">

            <h1>✅</h1>

            <h5>Accepted</h5>

            <h2>{{ $acceptedOrders }}</h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0 text-center p-3">

            <h1>🎉</h1>

            <h5>Completed</h5>

            <h2>{{ $completedOrders }}</h2>

        </div>

    </div>

</div>

<div class="row mt-4">

<!-- Pesanan Terbaru -->
<div class="col-lg-8">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <h5 class="mb-3">
                Pesanan Terbaru
            </h5>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Jasa</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($latestOrders as $order)

                    <tr>

                        <td>
                            {{ $order->service->title }}
                        </td>

                        <td>
                            {{ date('d M Y', strtotime($order->order_date)) }}
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

<!-- Ringkasan -->
<div class="col-lg-4">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <h5 class="mb-3">
                Ringkasan Akun
            </h5>

            <p class="mb-1">
                Pesanan Ditolak
            </p>

            <h3 class="text-danger">
                {{ $rejectedOrders }}
            </h3>

            <hr>

            <p class="mb-1">
                Email
            </p>

            <p><strong>Nama</strong></p>
            <p>{{ auth()->user()->name }}</p>

            <hr>

            <p><strong>Email</strong></p>
            <p>{{ auth()->user()->email }}</p>

            <hr>

            <p><strong>Role</strong></p>
            <p>User</p>

            <h6>
                {{ auth()->user()->email }}
            </h6>

            <hr>

            <a
                href="/user/orders"
                class="btn btn-primary w-100 mb-2">

                Riwayat Pesanan

            </a>

            <a
                href="/user/favorite"
                class="btn btn-outline-danger w-100">

                ❤️ Jasa Favorit

            </a>

        </div>

    </div>

</div>

</div>

@endsection
