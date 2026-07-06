@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Kelola Kategori</h2>

    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#addCategoryModal">

        + Tambah Kategori

    </button>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

@if(session('error'))

<div class="alert alert-danger">
    {{ session('error') }}
</div>

@endif

<div class="row">

    @forelse($categories as $category)

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <h1>📂</h1>

                <h5>
                    {{ $category->name }}
                </h5>

                <p class="text-muted">

                    {{ $category->services_count }}
                    Jasa

                </p>

                <small class="text-muted d-block mb-3">

                    {{ $category->description }}

                </small>

                <hr>

                <button
                    class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#editModal{{ $category->id }}">

                    Edit

                </button>

                <form
                    action="/admin/categories/{{ $category->id }}/delete"
                    method="POST"
                    class="d-inline">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

    </div>

    <!-- Modal Edit -->

    <div
        class="modal fade"
        id="editModal{{ $category->id }}"
        tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <form
                    action="/admin/categories/{{ $category->id }}/update"
                    method="POST">

                    @csrf

                    <div class="modal-header">

                        <h5 class="modal-title">

                            Edit Kategori

                        </h5>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Kategori

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $category->name }}"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Deskripsi

                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="3">{{ $category->description }}</textarea>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                            Batal

                        </button>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-warning">

            Belum ada kategori.

        </div>

    </div>

    @endforelse

</div>

<!-- Modal Tambah -->

<div
    class="modal fade"
    id="addCategoryModal"
    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="/admin/categories/store"
                method="POST">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">

                        Tambah Kategori

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Nama Kategori

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection