<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ResservationController extends Controller
{
    public function index()
    {
        $orders=Order::where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function orderview($id)
    {
        $orders=Order::where('id',$id)->first();
        return view('admin.orders.order',compact('orders'));
    }

    public function updateorder(Request $request,$id)
    {
        $orders=Order::find($id);
        $orders->status=$request->input('order_status');
        $orders->update();
        return redirect()->back();
    }


    public function completeorder()
    {
        $orders=Order::where('status','1')->get();
        return view('admin.orders.complete',compact('orders'));
    }

}
