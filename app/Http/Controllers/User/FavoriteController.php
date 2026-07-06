<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with([
            'service.category',
            'service.mitra',
            'service.reviews'
        ])
        ->where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view(
            'user.favorite',
            compact('favorites')
        );
    }

    public function store($id)
    {
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'service_id' => $id
        ]);

        return back()->with(
            'success',
            'Jasa berhasil ditambahkan ke favorit'
        );
    }

    public function destroy($id)
    {
        Favorite::where(
            'user_id',
            auth()->id()
        )
        ->where(
            'service_id',
            $id
        )
        ->delete();

        return back()->with(
            'success',
            'Jasa dihapus dari favorit'
        );
    }
}