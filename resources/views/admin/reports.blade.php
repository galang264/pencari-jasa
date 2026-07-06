@extends('layouts.admin')

@section('content')

<h2>Laporan Kendala</h2>

<p class="text-muted">
    Kelola laporan yang dikirim pengguna
</p>

<div class="card shadow-sm border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th>User</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            @forelse($reports as $report)

            <tr>

                <td>
                    {{ $report->user->name }}
                </td>

                <td>
                    {{ $report->title }}
                </td>

                <td>
                    {{ $report->description }}
                </td>

                <td>

                    @if($report->status == 'pending')

                        <span class="badge bg-warning text-dark">
                            Pending
                        </span>

                    @elseif($report->status == 'reviewed')

                        <span class="badge bg-primary">
                            Reviewed
                        </span>

                    @else

                        <span class="badge bg-success">
                            Resolved
                        </span>

                    @endif

                </td>

                <td>

                    @if($report->status != 'resolved')

                    <form
                        action="/admin/reports/{{ $report->id }}/update"
                        method="POST">

                        @csrf

                        <button
                            class="btn btn-success btn-sm">

                            Update Status

                        </button>

                    </form>

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="text-center">

                    Belum ada laporan.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection