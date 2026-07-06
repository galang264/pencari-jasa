@extends('layouts.user')

@section('content')

<h2>Beri Review</h2>

<div class="card shadow-sm border-0">

<div class="card-body">

    <h5>
        {{ $order->service->title }}
    </h5>

    <form action="/user/review/store" method="POST">

        @csrf

        <input
            type="hidden"
            name="order_id"
            value="{{ $order->id }}">

        <input
            type="hidden"
            name="service_id"
            value="{{ $order->service_id }}">

        <div class="mb-3">

            <label class="form-label">
                Rating
            </label>

            <select
                name="rating"
                class="form-select">

                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Ulasan
            </label>

            <textarea
                name="review"
                class="form-control"
                rows="5"
                required></textarea>

        </div>

        <button
            type="submit"
            class="btn btn-primary">

            Kirim Review

        </button>

    </form>

</div>

</div>

@endsection
