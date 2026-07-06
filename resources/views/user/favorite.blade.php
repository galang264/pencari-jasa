@extends('layouts.user')

@section('content')

<h1>Jasa Favorit</h1>

<p class="text-muted">
    Simpan jasa favorit agar lebih mudah ditemukan kembali.
</p>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="row">

    @forelse($favorites as $favorite)

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm border-0 h-100">

            @if($favorite->service->service_photo)

                <img
                    src="{{ asset('uploads/services/'.$favorite->service->service_photo) }}"
                    class="card-img-top"
                    style="height:250px; object-fit:cover;">

            @else

                <img
                    src="https://via.placeholder.com/400x250"
                    class="card-img-top">

            @endif

            <div class="card-body">

                <span class="badge bg-primary mb-2">

                    {{ $favorite->service->category->name ?? 'Kategori' }}

                </span>

                <h5 class="fw-bold">

                    {{ $favorite->service->title }}

                </h5>

                <p class="text-muted">

                    {{ Str::limit($favorite->service->description, 80) }}

                </p>

                <p class="text-warning">

                    ⭐ {{ number_format($favorite->service->reviews->avg('rating') ?? 0,1) }}

                </p>

                <h4 class="text-primary">

                    Rp {{ number_format($favorite->service->price,0,',','.') }}

                </h4>

                <div class="d-flex gap-2">

                    <a
                        href="/user/service-detail/{{ $favorite->service->id }}"
                        class="btn btn-primary flex-fill">

                        Detail

                    </a>

                    <form
                        action="/user/favorite/{{ $favorite->service->id }}/delete"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-outline-danger"
                            onclick="return confirm('Hapus dari favorit?')">

                            ❤️

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-info">

            Belum ada jasa favorit.

        </div>

    </div>

    @endforelse

</div>

@endsection