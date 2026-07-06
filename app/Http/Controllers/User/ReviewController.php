<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($orderId)
    {
        $order = Order::with('service')
            ->findOrFail($orderId);

        return view('user.create-review', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'service_id' => 'required',
            'rating' => 'required|min:1|max:5',
            'review' => 'required'
        ]);

        Review::create([
            'order_id' => $request->order_id,
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return redirect('/user/orders')
            ->with('success', 'Review berhasil dikirim.');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
}