<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use\Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $category=Category::all();
        return view('admin.product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products=new Product();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/product',$filename);
            $products->image=$filename;
        }

        $products->cate_id=$request->cate_id;
        $products->name=$request->name;
        $products->slug=$request->slug;
        $products->small_description=$request->small_description;
        $products->description=$request->description;
        $products->original_price=$request->original_price;
        $products->selling_price=$request->selling_price;
        $products->qty=$request->qty;
        $products->tax=$request->tax;
        $products->status=$request->status == true ? '1' : '0';
        $products->trending=$request->trending == true ? '1' : '0';
        $products->meta_title=$request->meta_title;
        $products->meta_keywords=$request->meta_keywords;
        $products->meta_description=$request->meta_description;
        $products->save();
        return redirect('products')->with('status','Successfully Added Product Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::all();
        $products=Product::find($id);
        return view('admin.product.edit',compact('products','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products=Product::find($id);
        if($request->hasFile('image'))
        {
            $path='uploads/product/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/product',$filename);
            $products->image=$filename;
        }
        $products->cate_id=$request->input('cate_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->qty=$request->input('qty');
        $products->tax=$request->input('tax');
        $products->status=$request->status == true ? '1' : '0';
        $products->trending=$request->trending == true ? '1' : '0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');
        $products->save();
        return redirect('products')->with('status','Successfully Update Product Data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Product::find($id);
        if($products->image)
        {
            $path='uploads/product/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $products->delete();
        return redirect('products')->with('status','Successfully Delete this item');
    }
}
