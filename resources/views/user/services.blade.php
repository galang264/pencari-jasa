@extends('layouts.user')

@section('content')

<h1>Cari Jasa</h1>

<p class="text-muted">
    Temukan jasa terbaik sesuai kebutuhan Anda
</p>

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <form method="GET" action="/user/services">

                <div class="row">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Cari jasa..."
                            value="{{ request('keyword') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="category_id"
                            class="form-select">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select
                            name="sort"
                            class="form-select">

                            <option value="">
                                Urutkan
                            </option>

                            <option
                                value="price_low"
                                {{ request('sort') == 'price_low' ? 'selected' : '' }}>

                                Harga Terendah

                            </option>

                            <option
                                value="price_high"
                                {{ request('sort') == 'price_high' ? 'selected' : '' }}>

                                Harga Tertinggi

                            </option>

                            <option
                                value="rating"
                                {{ request('sort') == 'rating' ? 'selected' : '' }}>

                                Rating Tertinggi

                            </option>

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

<div class="row">

    @forelse($services as $service)

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm border-0 h-100">

                @if($service->service_photo)

                    <img
                        src="{{ asset('uploads/services/'.$service->service_photo) }}"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;">

                @else

                    <img
                        src="https://via.placeholder.com/400x250"
                        class="card-img-top">

                @endif

                <div class="card-body">

                    <span class="badge bg-primary mb-2">
                        {{ $service->category?->name ?? 'Kategori Tidak Ditemukan' }}
                    </span>

                    <h5 class="fw-bold">
                        {{ $service->title }}
                    </h5>

                    <p class="text-warning mb-2">

                        ⭐ {{ number_format($service->reviews->avg('rating') ?? 0, 1) }}

                    </p>

                    <p class="text-muted">

                        {{ Str::limit($service->description, 80) }}

                    </p>

                    <div class="mb-3">

                        <strong>
                            Mitra:
                        </strong>

                        {{ $service->mitra->name ?? 'Mitra' }}

                    </div>

                    <h4 class="text-primary">

                        Rp {{ number_format($service->price, 0, ',', '.') }}

                    </h4>

                    <a
                        href="/user/service-detail/{{ $service->id }}"
                        class="btn btn-primary w-100">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="alert alert-info">

                Belum ada jasa yang tersedia.

            </div>

        </div>

    @endforelse

</div>

@endsection