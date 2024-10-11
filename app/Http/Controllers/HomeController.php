<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;



class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function home(){

        $products = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count = '';
        }

        return view('home.index',compact('products','count'));
    }


    public function login_home()
    {
        $products = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count = '';
        }

        return view('home.index',compact('products','count'));
    }


    public function product_details($id)
    {
        $datas = Product::find($id);

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count = '';
        }

        return view('home.product_details',compact('datas','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user  = Auth::user();
        $user_id = $user->id;

        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product Added to the Cart Successfully.');

        return redirect()->back();
    }


    public function mycart()
    {
        if(Auth::id()){

            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $carts = Cart::where('user_id',$userid)->get();

        }

        return view('home.mycart',compact('count'),compact('carts'));
    }

    public function delete_cart($id)
    {
        if(Auth::check()){

            $user = Auth::user();
    
            $cart = Cart::where('user_id', $user->id)->where('id', $id)->first();
    
            if($cart){ 
                $cart->delete();
                toastr()->success('Item Removed Successfully.'); 
            }
        }
    
        return redirect()->back(); 
    }
    

}
