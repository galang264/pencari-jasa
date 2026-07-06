<?php

use App\Http\Controllers\User\ServiceController as UserServiceController;
use App\Http\Controllers\Mitra\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Mitra\OrderController as MitraOrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ReportController;



Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/redirect', function () {

    $role = auth()->user()->role;

    if ($role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($role === 'mitra') {
        return redirect('/mitra/dashboard');
    }

    return redirect('/user/dashboard');

})->middleware('auth');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard');
});

Route::middleware(['auth', 'role:mitra'])->group(function () {
    Route::view('/mitra/dashboard', 'mitra.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::view('/user/dashboard', 'user.dashboard');
});

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    Route::get('/users', [AdminController::class, 'users']);

    Route::get('/categories',[AdminController::class, 'categories']);

    Route::post('/categories/store',[AdminController::class, 'storeCategory']);

    Route::post('/categories/{id}/update',[AdminController::class,'updateCategory']);

    Route::post('/categories/{id}/delete',[AdminController::class,'destroyCategory']);

    Route::get('/services', [AdminController::class, 'services']);

    Route::get('/orders', [AdminController::class, 'orders']);

    Route::get('/reviews', [AdminController::class, 'reviews']);

    Route::post('/users/{id}/update-role', [AdminController::class, 'updateRole']);

    Route::post('/users/{id}/delete', [AdminController::class, 'deleteUser']);

    Route::get('/reports', [AdminController::class, 'reports']);

    Route::post('/reports/{id}/update',[AdminController::class, 'updateReport']);

});

Route::middleware(['auth','role:mitra'])->prefix('mitra')->group(function () {

    Route::get('/dashboard', [MitraOrderController::class, 'dashboard']);

    Route::get('/services', [ServiceController::class, 'index']);

    Route::get('/create-service',[ServiceController::class, 'create']);

    Route::post('/services/store', [ServiceController::class, 'store'])->name('mitra.services.store');

    Route::get('/services', [ServiceController::class, 'index']);

    Route::get('/create-service',[ServiceController::class, 'create']);

    Route::post('/services/store', [ServiceController::class, 'store'])->name('mitra.services.store');

    Route::get('/services/{id}/edit', [ServiceController::class, 'edit']);

    Route::post('/services/{id}/update', [ServiceController::class, 'update']);

    Route::post('/services/{id}/delete', [ServiceController::class, 'destroy']);

    Route::get('/orders', [MitraOrderController::class, 'index']);

    Route::post('/orders/{id}/accept', [MitraOrderController::class, 'accept']);

    Route::post('/orders/{id}/reject', [MitraOrderController::class, 'reject']);
    
    Route::post('/orders/{id}/complete', [MitraOrderController::class, 'complete']);

    Route::get('/income', [MitraOrderController::class, 'income']);

});

Route::middleware(['auth','role:user'])->prefix('user')->group(function () {

    Route::get('/dashboard',[OrderController::class, 'dashboard']);

    Route::get('/services', [UserServiceController::class, 'index']);

    Route::get('/service-detail/{id}', [UserServiceController::class, 'show']);

    Route::get('/create-order/{id}', [OrderController::class, 'create']);

    Route::post('/store-order', [OrderController::class, 'store'])
        ->name('user.order.store');

    Route::get('/orders', [OrderController::class, 'index']);

    Route::view('/favorite', 'user.favorite');

    Route::view('/profile', 'user.profile');

    Route::get('/review/{id}',[ReviewController::class, 'create']);

    Route::post('/review/store',[ReviewController::class, 'store']);

    Route::get('/favorite',[FavoriteController::class, 'index']);

    Route::post('/favorite/{id}',[FavoriteController::class, 'store']);

    Route::post('/favorite/{id}/delete',[FavoriteController::class, 'destroy']);

    Route::get('/report', [ReportController::class, 'create']);

    Route::post('/report/store', [ReportController::class, 'store']);

});

Route::get('/dashboard', function () {
    if(auth()->user()->role == 'admin'){
        return redirect('/admin/dashboard');
    }

    if(auth()->user()->role == 'mitra'){
        return redirect('/mitra/dashboard');
    }

    return redirect('/user/dashboard');})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';