<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store=new Category();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/category',$filename);
            $store->image=$filename;
        }
        $store->name=$request->name;
        $store->slug=$request->slug;
        $store->description=$request->description;
        $store->status=$request->status == true ? '1' : '0';
        $store->popular=$request->popular == true ? '1' : '0';
        $store->meta_title=$request->meta_title;
        $store->meta_discrip=$request->meta_discrip;
        $store->meta_keywords=$request->meta_keywords;
        $store->save();
        return redirect('categories')->with('status','Successfully Added Category Data');
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
        $store=Category::find($id);
        return view('admin.category.edit',compact('store'));
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
        $store=Category::find($id);
        if($request->hasFile('image'))
        {
            $path='uploads/category/'.$store->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/category',$filename);
            $store->image=$filename;

        }

            $store->name=$request->input('name');
            $store->slug=$request->input('slug');
            $store->description=$request->input('description');
            $store->status=$request->status == true ? '1' : '0';
            $store->popular=$request->popular == true ? '1' : '0';
            $store->meta_title=$request->input('meta_title');
            $store->meta_discrip=$request->input('meta_discrip');
            $store->meta_keywords=$request->input('meta_keywords');
            $store->update();
            return redirect('categories')->with('status','Successfully Update Category Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store=Category::find($id);
        if($store->image)
        {
            $path='uploads/category/'.$store->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $store->delete();
        return redirect('categories')->with('status','Successfully Delete this item');
    }
}
