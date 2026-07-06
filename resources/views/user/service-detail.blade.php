@extends('layouts.user')

@section('content')

<div class="row">

    <div class="col-lg-7">

        <div class="card shadow-sm border-0">

            <img
                src="{{ asset('uploads/services/'.$service->service_photo) }}"
                class="card-img-top"
                style="height:450px; object-fit:cover;">

            <div class="card-body">

                <span class="badge bg-primary mb-3">
                    {{ $service->category->name }}
                </span>

                <h2 class="fw-bold">
                    {{ $service->title }}
                </h2>

                <p class="text-muted">

                    ⭐ {{ $averageRating ?: 0 }}
                    ({{ $service->reviews->count() }} Review)

                    <div class="mb-3">

                        <strong>Alamat Mitra</strong>

                        <p class="mb-0">

                            {{ $service->mitra->address ?? 'Alamat belum diisi' }}

                        </p>

                    </div>

                    <div class="mb-3">

                        <strong>Nomor HP</strong>

                        <p class="mb-0">

                            {{ $service->mitra->phone ?? '-' }}

                        </p>

                    </div>

                </p>

                <hr>

                <h5>Deskripsi Jasa</h5>

                <p>
                    {{ $service->description }}
                </p>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h4 class="text-primary fw-bold">
                    Rp {{ number_format($service->price,0,',','.') }}
                </h4>

                <small class="text-muted">
                    Mulai dari
                </small>

                <hr>

                <h5>Penyedia Jasa</h5>

                <div class="d-flex align-items-center mb-3">

                    <div
                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                        style="width:60px;height:60px;">

                        BC

                    </div>

                    <div class="ms-3">

                        <h6 class="mb-0">
                            {{ $service->mitra->name }}
                        </h6>

                        <small class="text-muted">
                            Mitra Terverifikasi
                        </small>

                    </div>

                </div>

                <hr>

                <a
                    href="/user/create-order/{{ $service->id }}"
                    class="btn btn-primary w-100 mb-2">

                    Pesan Sekarang

                </a>

                <form
                    action="/user/favorite/{{ $service->id }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-outline-danger w-100">

                        ❤️ Tambah Favorit

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm border-0 mt-4">

    <div class="card-body">

        @forelse($service->reviews as $review)

        <div class="mb-4">

            <h6>

                @for($i = 1; $i <= $review->rating; $i++)
                    ⭐
                @endfor

                {{ $review->user->name }}

            </h6>

            <p class="text-muted">

                {{ $review->review }}

            </p>

        </div>

        <hr>

        @empty

        <p class="text-muted">

            Belum ada review.

        </p>

        @endforelse

    </div>

</div>

@endsection