<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');

        if(Auth::check())
        {
            $prod_check=Product::where('id',$product_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=> $prod_check->name." already add to cart"]);
                }
                else
                {
                    $cartitem=new Cart();
                    $cartitem->prod_id=$product_id;
                    $cartitem->user_id=Auth::id();
                    $cartitem->prod_qty=$product_qty;
                    $cartitem->save();
                    return response()->json(['status'=> $prod_check->name." Successfully add to cart"]);
                }

            }
            
        }
        else
        {
            return response()->json(['status'=>"login And Continue"]);
        }
    }

    public function viewcart()
    {
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('userfront.product.viewcart',compact('cartitems'));
    }

    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $prod_id=$request->input('prod_id');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartitems=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitems->delete();
                return response()->json(['status'=>"Item Deleted"]);
            }
        }
        else
        {
             return response()->json(['status'=>"login And Continue"]);
        }
    }

    public function updatequantity(Request $request)
    {
        $prod_id=$request->input('prod_id');
        $prod_quantity=$request->input('prod_qty');

        if(Auth::check())
        {
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartitem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->prod_qty=$prod_quantity;
                $cartitem->update();
                 return response()->json(['status'=>"Quantity update successfully"]);

            }
        }
        else
        {
             return response()->json(['status'=>"login And Continue"]);
        }
    }
}
