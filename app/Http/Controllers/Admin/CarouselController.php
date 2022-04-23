<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Carbon\Carbon;


class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels=Carousel::all();
        return view('carousel.index',compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required'
        ]);

        $image=$request->file('image');
        if(isset($image))
        {
            $CurrentDate=Carbon::now()->toDateString();
            $imagename=time().$CurrentDate.'_'.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/carousel'))
            {
                mkdir('uploads/carousel',077,true);
            }
            $image->move('uploads/carousel',$imagename);
        }
        else
        {
            $imagename='default.png';                                        
        }

        $slider=new Carousel();
        $slider->name=$request->name;
        $slider->image=$imagename;
        $slider->save();
        return redirect('carousel');


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
        $editcarosls=Carousel::find($id);
        return view('carousel.edit',compact('editcarosls'));
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
         $this->validate($request,[
            'name'=>'required'
            
        ]);
          $slider=Carousel::find($id);
        $image=$request->file('image');
        if(isset($image))
        {
            $CurrentDate=Carbon::now()->toDateString();
            $imagename=time().$CurrentDate.'_'.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/carousel'))
            {
                mkdir('uploads/carousel',077,true);
            }
            $image->move('uploads/carousel',$imagename);
        }
        else
        {
            $imagename=$slider->image;                                        
        }

       
        $slider->name=$request->name;
        $slider->image=$imagename;
        $slider->save();
        return redirect('carousel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carousel::find($id)->delete();
        return redirect()->back();
        
    }
}
