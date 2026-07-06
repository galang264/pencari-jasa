@extends('layouts.user')

@section('content')

<h2>Laporkan Kendala</h2>

<p class="text-muted">
    Sampaikan kendala yang Anda alami kepada admin.
</p>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="/user/report/store" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Judul Kendala
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control"
                    required></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-danger">

                Kirim Laporan

            </button>

        </form>

    </div>

</div>

@endsection