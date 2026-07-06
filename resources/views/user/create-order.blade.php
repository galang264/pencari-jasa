@extends('layouts.user')

@section('content')

<h1>Buat Pesanan</h1>

<p class="text-muted">
    Lengkapi informasi pemesanan jasa.
</p>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h4 class="mb-3">
            {{ $service->title }}
        </h4>

        <p class="text-muted">
            {{ $service->description }}
        </p>

        <h5 class="text-primary mb-4">
            Rp {{ number_format($service->price,0,',','.') }}
        </h5>

        <form method="POST"
              action="{{ route('user.order.store') }}">

            @csrf

            <input
                type="hidden"
                name="service_id"
                value="{{ $service->id }}">

            <div class="mb-3">

                <label class="form-label">
                    Alamat Pekerjaan
                </label>

                <textarea
                    name="work_address"
                    class="form-control"
                    rows="3"
                    required></textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Catatan Tambahan
                </label>

                <textarea
                    name="notes"
                    class="form-control"
                    rows="4"></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Buat Pesanan

            </button>

        </form>

    </div>

</div>

@endsection