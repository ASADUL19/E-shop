<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class CheckoutCOntroller extends Controller
{
    public function index()
    {
        $old_cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeitem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeitem->delete();
            }
        }
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('userfront.checkout',compact('cartitems'));
    }


    public function placeorder(Request $request)
    {
        $order=new Order();
        $order->user_id=Auth::id();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address1=$request->input('address1');
        $order->address2=$request->input('address2');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->pinecode=$request->input('pinecode');

        $total=0;
        $total_cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($total_cartitems as $prod)
        {
            $total+=$prod->products->selling_price;
        }
        $order->total_price=$total;
        $order->tracking_no="asadul".rand(1111,9999);
        $order->save();


        $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            Order_item::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price,

            ]);

            $prod=Product::where('id',$item->prod_id)->first();
            $prod->qty=$prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1==NULL)
        {
            $user=User::where('id',Auth::id())->first();
            $user->name=$request->input('fname');
            $user->lname=$request->input('lname');
            $user->phone=$request->input('phone');
            $user->address1=$request->input('address1');
            $user->address2=$request->input('address2');
            $user->city=$request->input('city');
            $user->state=$request->input('state');
            $user->country=$request->input('country');
            $user->pinecode=$request->input('pinecode');
            $user->update();
           
        }

        


        return redirect('order')->with('status','Order Placed Successfully ');

       
    }
}
