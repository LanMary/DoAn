<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product= Product::where('new',1)->paginate(4);
        
        $sp_km = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sp_km'));
    }
    
    public function checkout()
    {
        if(Session('cart'))
            {
                $oldcart=Session::get('cart');
                $cart=new Cart($oldcart);
                return view('page.checkout',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
            }
    }
    public function getLoaisp($type)
    {   
            $sp_theodk = Product::where('id_type',$type)->paginate(6);
            //hiển thị tên sp trên trang
            //$loai_sp1 = ProductType::where('id',$type)->first();
            $tenhoa = ProductType::where('id',$type)->get();
            return view('page.loai_sanpham',compact('sp_theodk','loai_sp1','tenhoa'));
    }
    public function getSpall()
    {
        $sp_all = Product::all();
        return view('page.loai_sanphamall');
    }
 
    public function getChitietsp(Request $_req)
    {
        $sanpham = Product::where('id',$_req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitietsanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getContact()
    {
        return view('page.contact');
    }
    public function getAbout()
    {
        return view('page.about');
    }

    public function getAddtoCart(Request $req,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function DelItemCart($id)
    {
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }


    public function getSearch(REQUEST $req)
    {
        $req=$_GET['key'];
        $getidloai=ProductType::select('id')->where('name','like','%'.$req.'%')->get();
        foreach($getidloai as $id)
        {
            $idloai=$id->id;
        
            $product = Product::where('name','like','%'.$req.'%')
                            -> orwhere('id_type',$idloai)
                            ->get();
                            return view('page.search',compact('product'));}
                        
       
    }

}
