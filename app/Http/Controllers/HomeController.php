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
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $orders = Auth::user()->orders;
            return view('home')->with('orders',$orders);
        } else {
            return view('welcome');
        }

    }

    public function go()
    {

        
        return 'holas! go';
    }
}
