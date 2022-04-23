<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order_item;
use App\Models\Rating;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class RateingController extends Controller
{
    public function add(Request $request)
    {
         $stars_rated=$request->input('product_rating');
         $product_id=$request->input('product_id');

         $product_check=Product::where('id',$product_id)->where('status','0')->first();
         if($product_check)
         {
            $verified_purchase=Order::where('orders.user_id',Auth::id())->join('order_items','orders.id','order_items.order_id')->where('order_items.prod_id',$product_id)->get();
            if($verified_purchase->count()>0)
            {
                $exists_rating=Rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
                if($exists_rating)
                {
                    $exists_rating->stars_rated=$stars_rated;
                    $exists_rating->update();
                }
                else
                {
                    Rating::create([

                        'user_id'=>Auth::id(),
                        'prod_id'=>$product_id,
                        'stars_rated'=>$stars_rated

                    ]);
                }
                return redirect()->back()->with('status','Thanks you for rateing this product');
            }
            else
            {
                return redirect()->back()->with('status','you can not purchase this product');
            }
         }
         else
         {
               return redirect()->back()->with('status','the link was broken'); 
         }
    }
}
