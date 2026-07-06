<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with([
            'category',
            'mitra',
            'reviews'
        ]);

        // Search nama jasa
        if ($request->filled('keyword')) {

            $query->where(
                'title',
                'like',
                '%' . $request->keyword . '%'
            );

        }

        // Filter kategori
        if ($request->filled('category_id')) {

            $query->where(
                'category_id',
                $request->category_id
            );

        }

        // Harga terendah
        if ($request->sort == 'price_low') {

            $query->orderBy(
                'price',
                'asc'
            );

        }

        // Harga tertinggi
        elseif ($request->sort == 'price_high') {

            $query->orderBy(
                'price',
                'desc'
            );

        }

        $services = $query->get();

        // Rating tertinggi
        if ($request->sort == 'rating') {

            $services = $services->sortByDesc(function ($service) {

                return $service->reviews->avg('rating') ?? 0;

            });

        }

        $categories = Category::orderBy('name')->get();

        return view(
            'user.services',
            compact(
                'services',
                'categories'
            )
        );
    }

    public function show($id)
    {
        $service = Service::with([
            'category',
            'mitra',
            'reviews.user'
        ])->findOrFail($id);

        $averageRating = round(
            $service->reviews->avg('rating'),
            1
        );

        return view(
            'user.service-detail',
            compact(
                'service',
                'averageRating'
            )
        );
    }
}