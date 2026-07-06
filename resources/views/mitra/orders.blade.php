@extends('layouts.mitra')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Pesanan Masuk</h2>

            <p class="text-muted">
                Kelola seluruh pesanan dari pelanggan
            </p>
        </div>

    </div>

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">
                    <input type="text"
                        class="form-control"
                        placeholder="Cari pelanggan atau jasa...">
                </div>

                <div class="col-md-3">
                    <select class="form-select">
                        <option>Semua Status</option>
                        <option>Pending</option>
                        <option>Accepted</option>
                        <option>Completed</option>
                        <option>Rejected</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        Filter
                    </button>
                </div>

            </div>

        </div>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead class="table-light">

                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Jasa</th>
                        <th>Alamat</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr>

                        <td>
                            ORD-{{ str_pad($order->id,3,'0',STR_PAD_LEFT) }}
                        </td>

                        <td>
                            {{ $order->user->name }}
                        </td>

                        <td>
                            {{ $order->service->title }}
                        </td>

                        <td>
                            {{ $order->work_address }}
                        </td>

                        <td>
                            {{ $order->notes ?? '-' }}
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

                            @else

                                <span class="badge bg-secondary">
                                    {{ $order->status }}
                                </span>

                            @endif

                        </td>

                        <td>

                            @if($order->status == 'pending')

                                <form action="/mitra/orders/{{ $order->id }}/accept"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    <button class="btn btn-success btn-sm">
                                        Terima
                                    </button>

                                </form>

                                <form action="/mitra/orders/{{ $order->id }}/reject"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    <button class="btn btn-danger btn-sm">
                                        Tolak
                                    </button>

                                </form>

                            @elseif($order->status == 'accepted')

                                <form action="/mitra/orders/{{ $order->id }}/complete"
                                    method="POST">

                                    @csrf

                                    <button class="btn btn-primary btn-sm">
                                        Selesaikan Pesanan
                                    </button>

                                </form>

                            @elseif($order->status == 'completed')

                                <span class="text-success fw-bold">
                                    Selesai
                                </span>

                            @elseif($order->status == 'rejected')

                                <span class="text-danger fw-bold">
                                    Ditolak
                                </span>

                            @else

                                -

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">

                            Belum ada pesanan masuk.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    @endsection