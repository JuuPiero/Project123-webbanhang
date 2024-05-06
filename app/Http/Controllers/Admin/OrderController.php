<?php

namespace App\Http\Controllers\Admin;

use App\Extensions\Order\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Order\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller {

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function index() {
        $orders =  $this->orderRepository->paginate(10);
        return view('admin.order.index')->with([
            'orders' => $orders
        ]);
    }

    public function detail($id) {
        $order = Order::with('user')->with('order_items')->findOrFail($id);
        $orderItems = OrderItem::with('product')->where('order_id', $id)->get();
        $orderStatus = OrderStatus::getStatus();
        // dd($orderItems[0]->product->attributes()->get());
        return view('admin.order.detail')->with([
            'order' => $order,
            'orderItems' => $orderItems,
            'orderStatus' => $orderStatus
        ]);
    }

    public function update($id, Request $request) {
        $data = $request->all();
        $order = Order::findOrFail($id);
        $order->update($data);

        return redirect()->back()->with([
            'message' => 'xử lí thành công'
        ]);

    }


}
