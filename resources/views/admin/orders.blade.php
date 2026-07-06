@extends('layouts.admin')

@section('content')

<h2 class="mb-4">
    Monitoring Pesanan
</h2>

<div class="card shadow-sm border-0">

    <div class="card-body p-0">

    <div class="row mb-4">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>

                    <th>ID</th>
                    <th>User</th>
                    <th>Jasa</th>
                    <th>Mitra</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

            @forelse($orders as $order)

            <tr>

                <td>
                    ORD-{{ str_pad($order->id,3,'0',STR_PAD_LEFT) }}
                </td>

                <td>
                    {{ $order->user->name ?? '-' }}
                </td>

                <td>
                    {{ $order->service->title ?? '-' }}
                </td>

                <td>
                    {{ $order->service->mitra->name ?? '-' }}
                </td>

                <td>
                    Rp {{ number_format($order->service->price ?? 0,0,',','.') }}
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

                <td>
                    {{ date('d M Y H:i', strtotime($order->created_at)) }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada pesanan.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection