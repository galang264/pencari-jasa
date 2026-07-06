@extends('layouts.user')

@section('content')

<h1>Pesanan Saya</h1>

<p class="text-muted">
    Pantau seluruh pesanan jasa Anda.
</p>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>Jasa</th>
                        <th>Alamat Kerja</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <td>

                        @if($order->status == 'completed')

                            <a
                                href="/user/review/{{ $order->id }}"
                                class="btn btn-success btn-sm">

                                Beri Review

                            </a>

                        @else

                            -

                        @endif

                    </td>

                    <tr>

                        <td>
                            @if($order->service)

                                {{ $order->service->title }}

                            @else

                                <span class="text-danger">
                                    Jasa sudah dihapus
                                </span>

                            @endif
                        </td>

                        <td>
                            {{ $order->work_address }}
                        </td>

                        <td>
                            {{ date('d M Y H:i', strtotime($order->order_date)) }}
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
                                    {{ ucfirst($order->status) }}
                                </span>

                            @endif

                        </td>

                        <td>
                            Rp {{ number_format($order->service->price,0,',','.') }}
                        </td>

                        <td>
                            {{ $order->notes ?? '-' }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">

                            Belum ada pesanan.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection