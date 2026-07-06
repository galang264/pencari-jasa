@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Kelola Jasa</h2>

    <button class="btn btn-primary">
        + Tambah Jasa
    </button>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Nama Jasa</th>
                    <th>Kategori</th>
                    <th>Penyedia</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Review</th>
                </tr>

            </thead>

            <tbody>

            @forelse($services as $service)

            <tr>

                <td>
                    J-{{ str_pad($service->id,3,'0',STR_PAD_LEFT) }}
                </td>

                <td>
                    {{ $service->title }}
                </td>

                <td>
                    {{ $service->category_id }}
                </td>

                <td>
                    {{ $service->mitra->name ?? '-' }}
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
                    {{ $service->reviews->count() }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center">

                    Belum ada jasa.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-4">
                <input type="text"
                       class="form-control"
                       placeholder="Cari nama jasa">
            </div>

            <div class="col-md-3">
                <select class="form-select">
                    <option>Semua Kategori</option>
                    <option>Service AC</option>
                    <option>Cleaning Service</option>
                    <option>Tukang Listrik</option>
                    <option>Les Privat</option>
                </select>
            </div>

            <div class="col-md-3">
                <select class="form-select">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Pending</option>
                    <option>Nonaktif</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    Filter
                </button>
            </div>

        </div>

    </div>
</div>
@endsection