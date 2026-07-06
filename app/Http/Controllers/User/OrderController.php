<?php

    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use App\Models\Service;
    use Illuminate\Http\Request;

    class OrderController extends Controller
    {
        public function create($id)
        {
            $service = Service::findOrFail($id);

            return view('user.create-order', compact('service'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'service_id' => 'required',
                'work_address' => 'required'
            ]);

            Order::create([
                'service_id'   => $request->service_id,
                'user_id'      => auth()->id(),
                'work_address' => $request->work_address,
                'notes'        => $request->notes,
                'status'       => 'pending',
                'order_date'   => now()
            ]);

            return redirect('/user/orders')
                ->with('success', 'Pesanan berhasil dibuat.');
        }

        public function index()
        {
            $orders = Order::with('service')
                ->where('user_id', auth()->id())
                ->whereHas('service')
                ->latest()
                ->get();

            return view('user.orders', compact('orders'));
        }

        public function dashboard()
        {
            $userId = auth()->id();

            $totalOrders = Order::where(
                'user_id',
                $userId
            )->count();

            $pendingOrders = Order::where(
                'user_id',
                $userId
            )->where('status', 'pending')->count();

            $acceptedOrders = Order::where(
                'user_id',
                $userId
            )->where('status', 'accepted')->count();

            $completedOrders = Order::where(
                'user_id',
                $userId
            )->where('status', 'completed')->count();

            $rejectedOrders = Order::where(
                'user_id',
                $userId
            )->where('status', 'rejected')->count();

            $latestOrders = Order::with('service')
                ->whereNotNull('service_id')
                ->whereHas('service')
                ->where('user_id', $userId)
                ->latest()
                ->take(5)
                ->get();

            return view('user.dashboard', compact(
                'totalOrders',
                'pendingOrders',
                'acceptedOrders',
                'completedOrders',
                'rejectedOrders',
                'latestOrders'
            ));
        }
    }