<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\market\Order;
use Illuminate\Http\Request;

class OrderController extends Controller{

    public function index() {
        $orders = Order::query()->latest()->paginate(5);
        return view('admin.market.order.index', compact('orders'));
    }



}


