<?php

    namespace App\Http\Controllers\Mitra;

    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use App\Models\Review;

    class OrderController extends Controller
    {
        public function index()
        {
            $orders = Order::with(['user','service'])
                ->whereHas('service', function ($query) {
                    $query->where('mitra_id', auth()->id());
                })
                ->latest()
                ->get();

            return view('mitra.orders', compact('orders'));
        }

        public function accept($id)
        {
            $order = Order::findOrFail($id);

            $order->update([
                'status' => 'accepted'
            ]);

            return back();
        }

        public function reject($id)
        {
            $order = Order::findOrFail($id);

            $order->update([
                'status' => 'rejected'
            ]);

            return back();
        }

        public function complete($id)
        {
            $order = Order::findOrFail($id);

            if ($order->status != 'accepted') {
                return back();
            }

            $order->update([
                'status' => 'completed'
            ]);

            return back();
        }

        public function dashboard()
        {
            $mitraId = auth()->id();

            $totalServices = \App\Models\Service::where(
                'mitra_id',
                $mitraId
            )->count();

            $pendingOrders = \App\Models\Order::whereHas('service', function ($q) use ($mitraId) {
                $q->where('mitra_id', $mitraId);
            })->where('status', 'pending')->count();

            $acceptedOrders = \App\Models\Order::whereHas('service', function ($q) use ($mitraId) {
                $q->where('mitra_id', $mitraId);
            })->where('status', 'accepted')->count();

            $completedOrders = \App\Models\Order::whereHas('service', function ($q) use ($mitraId) {
                $q->where('mitra_id', $mitraId);
            })->where('status', 'completed')->count();

            $income = \App\Models\Order::whereHas('service', function ($q) use ($mitraId) {
                $q->where('mitra_id', $mitraId);
            })
            ->where('status', 'completed')
            ->with('service')
            ->get()
            ->sum(function ($order) {
                return $order->service->price;
            });

            $latestOrders = \App\Models\Order::with(['user','service'])
                ->whereHas('service', function ($q) use ($mitraId) {
                    $q->where('mitra_id', $mitraId);
                })
                ->latest()
                ->take(5)
                ->get();

            $reviews = Review::whereHas('service', function ($q) use ($mitraId) {
                    $q->where('mitra_id', $mitraId);
                })->get();

                $totalReviews = $reviews->count();

                $averageRating = $totalReviews > 0
                    ? round($reviews->avg('rating'), 1)
                    : 0;

            return view('mitra.dashboard', compact(
                'totalServices',
                'pendingOrders',
                'acceptedOrders',
                'completedOrders',
                'income',
                'latestOrders',
                'totalReviews',
                'averageRating'
            ));
        }

        public function income()
        {
            $mitraId = auth()->id();

            $completedOrders = Order::with('service')
                ->whereHas('service', function ($q) use ($mitraId) {
                    $q->where('mitra_id', $mitraId);
                })
                ->where('status', 'completed')
                ->get();

            $totalIncome = $completedOrders->sum(function ($order) {
                return $order->service->price;
            });

            $completedCount = $completedOrders->count();

            $pendingCount = Order::whereHas('service', function ($q) use ($mitraId) {
                $q->where('mitra_id', $mitraId);
            })->where('status', 'pending')->count();

            return view('mitra.income', compact(
                'totalIncome',
                'completedCount',
                'pendingCount'
            ));
        }
    }