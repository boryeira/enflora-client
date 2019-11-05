<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product\Product;
use App\Models\Order\Order;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $orders = Auth::user()->orders;
        return view('home')->with('orders',$orders);

    }

    public function go()
    {

        
        return 'holas! go';
    }
}
