<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\Order;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('role', 'user')->count();

        $totalMitra = User::where('role', 'mitra')->count();

        $totalServices = Service::count();

        $totalOrders = Order::count();

        $totalReviews = Review::count();

        $latestOrders = Order::with(['user', 'service']) ->latest() ->take(5)-> get();

        return view('admin.dashboard', compact('totalUsers','totalMitra','totalServices','totalOrders','totalReviews','latestOrders'));
    }

    public function users(Request $request)
    {
        $query = User::query();

        // Cari nama atau email
        if ($request->keyword) {

            $query->where(function($q) use ($request){

                $q->where(
                    'name',
                    'like',
                    '%' . $request->keyword . '%'
                )
                ->orWhere(
                    'email',
                    'like',
                    '%' . $request->keyword . '%'
                );

            });
        }

        // Filter role
        if ($request->role) {

            $query->where(
                'role',
                $request->role
            );
        }

        $users = $query
            ->latest()
            ->get();

        return view(
            'admin.users',
            compact('users')
        );
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'role' => 'required|in:admin,mitra,user'
        ]);

        $user->update([
            'role' => $request->role
        ]);

        return back()->with(
            'success',
            'Role berhasil diperbarui'
        );
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {

            return back()->with(
                'error',
                'Admin tidak dapat menghapus akun sendiri'
            );
        }

        $user->delete();

        return back()->with(
            'success',
            'User berhasil dihapus'
        );
    }

    public function services()
    {
        $services = \App\Models\Service::with('mitra') ->latest() ->get();

        return view('admin.services', compact('services'));
    }

    public function orders()
    {
        $orders = \App\Models\Order::with(['user','service.mitra'])->latest()->get();

        return view('admin.orders',compact('orders'));
    }

    public function reviews()
    {
        $reviews = \App\Models\Review::with(['user','service'])->latest()->get();

        return view('admin.reviews',compact('reviews'));
    }

    public function categories()
    {
        $categories = Category::withCount('services')
            ->latest()
            ->get();

        return view(
            'admin.categories',
            compact('categories')
        );
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:categories,name',
            'description' => 'nullable'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return back()->with(
            'success',
            'Kategori berhasil ditambahkan'
        );
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100|unique:categories,name,' . $id,
            'description' => 'nullable'
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return back()->with(
            'success',
            'Kategori berhasil diupdate'
        );
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);

        if ($category->services()->count() > 0) {

            return back()->with(
                'error',
                'Kategori masih digunakan jasa.'
            );
        }

        $category->delete();

        return back()->with(
            'success',
            'Kategori berhasil dihapus'
        );
    }

    public function reports()
    {
        $reports = Report::with('user')
            ->latest()
            ->get();

        return view(
            'admin.reports',
            compact('reports')
        );
    }

    public function updateReport($id)
    {
        $report = Report::findOrFail($id);

        if($report->status == 'pending'){
            $report->status = 'reviewed';
        }
        elseif($report->status == 'reviewed'){
            $report->status = 'resolved';
        }

        $report->save();

        return back();
    }
}