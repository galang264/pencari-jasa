@extends('layouts.mitra')

@section('content')

<h1>Tambah Jasa</h1>

<p class="text-muted">
    Tambahkan jasa baru yang akan ditawarkan kepada pelanggan.
</p>

<div class="card shadow-sm border-0">

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <form method="POST"
              action="{{ route('mitra.services.store') }}"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nama Jasa
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    placeholder="Contoh: Cleaning Rumah Menyeluruh">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select
                    name="category_id"
                    class="form-select">

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Harga Mulai
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="text"
                        id="price"
                        name="price"
                        class="form-control"
                        placeholder="0">

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi Jasa
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5"
                    placeholder="Jelaskan layanan yang Anda tawarkan">{{ old('description') }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Foto Jasa (Saat On Duty)
                </label>

                <input
                    type="file"
                    name="service_photo"
                    class="form-control">

                <small class="text-muted">

                    Upload foto saat Anda sedang bekerja agar
                    pelanggan lebih percaya terhadap layanan yang ditawarkan.

                </small>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Simpan Jasa

            </button>

        </form>

    </div>

</div>

@endsection