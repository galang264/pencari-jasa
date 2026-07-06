@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Kelola Pengguna</h2>
    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Bergabung</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <tbody>

                @forelse($users as $user)

                <tr>

                    <td>
                        U-{{ str_pad($user->id,3,'0',STR_PAD_LEFT) }}
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>

                        @if($user->role == 'admin')

                            <span class="badge bg-danger">
                                Admin
                            </span>

                        @elseif($user->role == 'mitra')

                            <span class="badge bg-primary">
                                Mitra
                            </span>

                        @else

                            <span class="badge bg-success">
                                User
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ date('d M Y', strtotime($user->created_at)) }}
                    </td>

                    <td>

                        <span class="text-success">
                            ● Aktif
                        </span>

                    </td>

                    <td>

                        <button
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#roleModal{{ $user->id }}">

                            Role

                        </button>

                        @if($user->id != auth()->id())

                        <form
                            action="/admin/users/{{ $user->id }}/delete"
                            method="POST"
                            class="d-inline">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus user ini?')">

                                Hapus

                            </button>

                        </form>

                        @endif

                    </td>

                </tr>

                <!-- Modal Role -->

                <div
                    class="modal fade"
                    id="roleModal{{ $user->id }}"
                    tabindex="-1">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <form
                                action="/admin/users/{{ $user->id }}/update-role"
                                method="POST">

                                @csrf

                                <div class="modal-header">

                                    <h5 class="modal-title">

                                        Ubah Role User

                                    </h5>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal">
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <p>
                                        <strong>{{ $user->name }}</strong>
                                    </p>

                                    <select
                                        name="role"
                                        class="form-select">

                                        <option
                                            value="user"
                                            {{ $user->role == 'user' ? 'selected' : '' }}>

                                            User

                                        </option>

                                        <option
                                            value="mitra"
                                            {{ $user->role == 'mitra' ? 'selected' : '' }}>

                                            Mitra

                                        </option>

                                        <option
                                            value="admin"
                                            {{ $user->role == 'admin' ? 'selected' : '' }}>

                                            Admin

                                        </option>

                                    </select>

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

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada pengguna.

                    </td>

                </tr>

                @endforelse

</tbody>


                </tbody>

        </table>

    </div>

</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Cari nama atau email pengguna"
                        value="{{ request('keyword') }}">

                </div>

                <div class="col-md-3">

                    <select
                        name="role"
                        class="form-select">

                        <option value="">
                            Semua Role
                        </option>

                        <option
                            value="admin"
                            {{ request('role') == 'admin' ? 'selected' : '' }}>

                            Admin

                        </option>

                        <option
                            value="mitra"
                            {{ request('role') == 'mitra' ? 'selected' : '' }}>

                            Mitra

                        </option>

                        <option
                            value="user"
                            {{ request('role') == 'user' ? 'selected' : '' }}>

                            User

                        </option>

                    </select>

                </div>

                <div class="col-md-2">

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Filter

                    </button>

                </div>

                <div class="col-md-2">

                    <a
                        href="/admin/users"
                        class="btn btn-outline-secondary w-100">

                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>
</div>
@endsection