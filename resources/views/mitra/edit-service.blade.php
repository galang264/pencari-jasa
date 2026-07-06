@extends('layouts.mitra')

@section('content')

<h2>Edit Jasa</h2>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form
            action="/mitra/services/{{ $service->id }}/update"
            method="POST"
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
                    value="{{ $service->title }}">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select
                    name="category_id"
                    class="form-select">

                    @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ $service->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Harga
                </label>

                <input
                    type="text"
                    name="price"
                    class="form-control"
                    value="{{ number_format($service->price,0,',','.') }}">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5">{{ $service->description }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Foto Baru
                </label>

                <input
                    type="file"
                    name="service_photo"
                    class="form-control">

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

@endsection