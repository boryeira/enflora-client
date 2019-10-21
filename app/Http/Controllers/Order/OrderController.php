<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Models\Order\Order;
use Auth;

class OrderController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all orders.
     *
     */
    public function index()
    {
        $orders = Auth::user()->orders;
        return view('home');
    }

    /**
     * Show Order 
     *
     */
    public function show(Order $order)
    {
        return view('orders.show')->with('order',$order);
    }

    /**
     * Create Order 
     *
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store Order 
     *
     */
    public function store(Request $request)
    {
        
        return view('orders.create');
    }
}
