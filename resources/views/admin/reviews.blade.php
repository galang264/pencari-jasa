@extends('layouts.admin')

@section('content')

<h2 class="mb-4">
    Kelola Review
</h2>

<div class="card shadow-sm border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>

                    <th>ID</th>
                    <th>User</th>
                    <th>Jasa</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

            @forelse($reviews as $review)

            <tr>

                <td>
                    RV-{{ str_pad($review->id,3,'0',STR_PAD_LEFT) }}
                </td>

                <td>
                    {{ $review->user->name ?? '-' }}
                </td>

                <td>
                    {{ $review->service->title ?? '-' }}
                </td>

                <td>
                    ⭐ {{ $review->rating }}/5
                </td>

                <td>
                    {{ $review->review }}
                </td>

                <td>
                    {{ date('d M Y', strtotime($review->created_at)) }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada review.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection