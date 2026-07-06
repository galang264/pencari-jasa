@extends('layouts.admin')

@section('content')

<h2 class="mb-4">
    Kelola Pengguna
</h2>

<div class="card shadow-sm border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Bergabung</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

            <tr>

                <td>
                    {{ $user->id }}
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

                    <a
                        href="/admin/users/{{ $user->id }}/edit"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

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

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada pengguna.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection