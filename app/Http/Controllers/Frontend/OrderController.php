<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id',Auth::id())->get();
        return view('userfront.product.myproductview',compact('orders'));
    }

    public function vieworder($id)
    {
        $orders=Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('userfront.product.vieworder',compact('orders'));

    }
}
