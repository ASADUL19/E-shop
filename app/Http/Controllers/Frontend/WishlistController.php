<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function viewwishlist()
    {
        $wishlists=Wishlist::where('user_id',Auth::id())->get();
        return view('wishlist.index',compact('wishlists'));
    }
    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id=$request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish=new Wishlist();
                $wish->prod_id=$prod_id;
                $wish->user_id=Auth::id();
                $wish->save();
                return response()->json(['status'=>"Product added to wishlist"]);
            }
            else
            {
                return response()->json(['status'=>"Product Dose Not Exists"]);
            }
        }
        else
        {
            return response()->json(['status'=>"login And Continue"]);
        }
    }

    public function destroy($id)
    {
        Wishlist::find($id)->delete();
        return redirect('wishlist');
    }

    public function cartcount()
    {
        $courtcount=Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $courtcount]);
    }

     public function wishlistcount()
    {
        $courtcount=Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $courtcount]);
    }

}
