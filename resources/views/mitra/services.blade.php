@extends('layouts.mitra')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Kelola Jasa</h2>
        <p class="text-muted">
            Kelola jasa Anda
        </p>
    </div>

    <a href="/mitra/create-service"
        class="btn btn-primary">

        + Tambah Jasa

    </a>

</div>

<div class="card shadow-sm border-0 mb-4">

    <div class="card-body">

        <form method="GET" action="/mitra/services">

            <div class="row">

                <div class="col-md-8">

                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Cari jasa..."
                        value="{{ request('keyword') }}">

                </div>

                <div class="col-md-4">

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

<div class="card shadow-sm border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th>Nama Jasa</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            @forelse($services as $service)

            <tr>

                <td>
                    {{ $service->title }}
                </td>

                <td>
                    {{ $service->category?->name ?? 'Kategori Tidak Ditemukan' }}
                </td>

                <td>
                    Rp {{ number_format($service->price,0,',','.') }}
                </td>

                <td>

                    <span class="badge bg-success">
                        Aktif
                    </span>

                </td>

                <td>

                    <a
                        href="/mitra/services/{{ $service->id }}/edit"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                    action="/mitra/services/{{ $service->id }}/delete"
                    method="POST"
                    class="d-inline">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus jasa ini?')">

                        Hapus

                    </button>

                </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="text-center">

                    Belum ada jasa.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection