<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index()
    {
        $product= Product::orderBy('id','asc')->paginate(3);
        return  view('page.Product')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'promotion_price'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);
        if($request->hasFile('images')){
            //get file name with extension
            $filenameWithExt=$request->file('images')->getClientOriginalName();
            //get file name
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //GET EXTENSION
            $extension=$request->file('images')->getClientOriginalExtension();
            //file name to store 
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('images')->storeAs('public/source/assets/dest/images/product',$fileNameToStore);
    }else{
        
        $fileNameToStore = 'noimage.jpg';
    }
    //create new post
        $product= new Product();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->promotion_price=$request->input('promotion_price');
        $product->image=$fileNameToStore;
        $product->save();

        return redirect('/Product')->with('success','Created product Success');

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
        $products=Product::find($id);
        return view('page.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products=Product::find($id);
        return view('page.edit')->with('products',$products);
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
        //
        $this -> validate($request,[ 
            'name'=>'required',
            'price'=>'required',
            'promotion_price'=>'required'
             ]);//validator

             if($request->hasFile('images')){
                //get file name with extension
                $filenameWithExt=$request->file('images')->getClientOriginalName();
                //get file name
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                //GET EXTENSION
                $extension=$request->file('images')->getClientOriginalExtension();
                //file name to store 
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('images')->storeAs('public/source/assets/dest/images/product',$fileNameToStore);
            }
            $products=product::find($id);
            $products->name=$request->input('name');
            $products->price=$request->input('price');
            $products->promotion_price=$request->input('promotion_price');
            if($request->hasFile('images')){
                $product->cover_image=$fileNameToStore;
            }
            $products->save();
            return redirect('/Product')->with('success','Updated product Success');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $products=Product::find($id);
        if($products->imagepath != 'noimage.jpg')
        {
            Storage::delete('public/source/assets/dest/images/product/'.$products->image);
        }
        $products->delete();
        return redirect('/Product')->with('success','Removed product Success');
    }
}
