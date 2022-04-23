<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Carousel;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class FrontController extends Controller
{
    public function index()
    {
        $Feature_Product=Product::where('trending','1')->take(15)->get();
        $Trending_Product=Category::where('popular','1')->take(15)->get();
        $carousels=Carousel::all();
        $complete_order=Order::where('status','1')->get();
        return view('userfront.front',compact('Feature_Product','Trending_Product','complete_order','carousels'));
    }

    public function category()
    {
        $category=Category::where('status','0')->get();
        return view('userfront.category',compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('userfront.product.index',compact('category','products'));
        }
    }

    public function productview($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products=Product::where('slug',$prod_slug)->first();
                $ratings=Rating::where('prod_id',$products->id)->get();
                $ratings_sum=Rating::where('prod_id',$products->id)->sum('stars_rated');
                $user_rating=Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
               if($ratings->count()>0)
               {
                 $rating_value=$ratings_sum /$ratings->count();
               }
               else
               {
                $rating_value=0;
               }
                return view('userfront.product.details',compact('products','ratings','rating_value','user_rating'));
            }
            else
            {
                return redirect('/')->with('status','the link was broken');
            }
        }
        else
        {
            return redirect('/')->with('status','no such file in this directory');
        }
    }

    public function productlistajax()
    {
        $products=Product::select('name')->where('status','0')->get();
        $data=[];
        foreach($products as $item)
        {
            $data[]=$item['name'];
        }
        return $data;
    }


    public function searchproduct(Request $request)
    {
        $search_product=$request->product_name;
        if($search_product !="")
        {
            $products=Product::where('name','LIKE','%$search_product%')->first();
            if($products)
            {
                return redirect('category/'.$products->category->slug.'/'.$products->slug);
            }
            else
            {
                return redirect()->back()->with('status','Product not found');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
