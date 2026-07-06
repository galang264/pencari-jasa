@extends('layouts.user')

@section('content')

<h1>Profil Saya</h1>

<p class="text-muted">
    Kelola informasi akun Anda.
</p>

<div class="row">

    <div class="col-md-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <div
                    class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                    style="width:100px;height:100px;font-size:35px;">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

                <h4>
                    {{ auth()->user()->name }}
                </h4>

                <p class="text-muted">
                    {{ auth()->user()->email }}
                </p>

                <span class="badge bg-success">
                    {{ ucfirst(auth()->user()->role) }}
                </span>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5 class="mb-4">
                    Informasi Akun
                </h5>

                <table class="table">

                    <tr>
                        <th width="200">
                            Nama
                        </th>

                        <td>
                            {{ auth()->user()->name }}
                        </td>
                    </tr>

                    <tr>
                        <th>Email</th>

                        <td>
                            {{ auth()->user()->email }}
                        </td>
                    </tr>

                    <tr>
                        <th>Role</th>

                        <td>
                            {{ ucfirst(auth()->user()->role) }}
                        </td>
                    </tr>

                    <tr>
                        <th>Bergabung Sejak</th>

                        <td>
                            {{ auth()->user()->created_at->format('d F Y') }}
                        </td>
                    </tr>

                    <tr>
                        <th>Nomor HP</th>

                        <td>
                            Belum Diisi
                        </td>
                    </tr>

                    <tr>
                        <th>Alamat</th>

                        <td>
                            Belum Diisi
                        </td>
                    </tr>

                </table>

                <div class="mt-4">

                    <a href="/profile"
                       class="btn btn-primary">

                        Edit Profil

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection