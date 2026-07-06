<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
   public function index(Request $request)
    {
        $query = Service::with('category')
            ->where('mitra_id', auth()->id());

        // Filter nama jasa
        if ($request->keyword) {

            $query->where(
                'title',
                'like',
                '%' . $request->keyword . '%'
            );

        }

        $services = $query
            ->latest()
            ->get();

        return view(
            'mitra.services',
            compact('services')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'service_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoName = null;

        if ($request->hasFile('service_photo')) {

            $photoName = time().'.'.
                $request->service_photo->extension();

            $request->service_photo->move(
                public_path('uploads/services'),
                $photoName
            );
        }
        
        Service::create([
            'category_id' => $request->category_id,
            'mitra_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => str_replace('.', '', $request->price),
            'service_photo' => $photoName
        ]);

        return redirect('/mitra/services')
            ->with('success', 'Jasa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        $categories = Category::orderBy('name')->get();

        return view(
            'mitra.edit-service',
            compact(
                'service',
                'categories'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate(['title' => 'required|max:150','category_id' => 'required','price' => 'required','description' => 'required']);

        $photoName = $service->service_photo;

        if ($request->hasFile('service_photo')) {

            $photoName = time().'.'.
                $request->service_photo->extension();

            $request->service_photo->move(public_path('uploads/services'), $photoName);}

            $service->update(['category_id' => $request->category_id,'title' => $request->title,'description' => $request->description,'price' => str_replace('.', '', $request->price),'service_photo' => $photoName]);
        return redirect('/mitra/services')
            ->with('success', 'Jasa berhasil diperbarui');
    }
    
    public function destroy($id)
    {
    $service = Service::findOrFail($id);

    // hapus file foto jika ada
    if (
        $service->service_photo &&
        file_exists(
            public_path(
                'uploads/services/' .
                $service->service_photo
            )
        )
    ) {

        unlink(
            public_path(
                'uploads/services/' .
                $service->service_photo
            )
        );
    }

    $service->delete();

    return redirect('/mitra/services')
        ->with('success', 'Jasa berhasil dihapus');
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'mitra.create-service',
            compact('categories')
        );
    }

    public function show($id)
    {
        $service = Service::with([
            'mitra',
            'category',
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