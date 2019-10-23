<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Order\OrderItem;

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
// 
        return view('home');
    }

    public function go()
    {
        $orderItems = OrderItem::all();
        foreach($orderItems as $item){
            $item->product_id = $item->batch_id;
            $item->save();
        }
        
        return 'holas! go';
    }
}
