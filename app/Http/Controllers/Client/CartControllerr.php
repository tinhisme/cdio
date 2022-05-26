<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('client.products.cart',[
            'cartItems' => $cartItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * add to cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $productID = $request->input('productID');
        $productQuantity = $request->input('productQuantity');
        if(Auth::check())
        {
            $productCheck = Product::where('id',$productID)->first();
            if($productCheck){
                if(Cart::where('product_id',$productID)->where('user_id', Auth::id())->exists() )
                {
                    return response()->json(['status' => $productCheck->name." đã được thêm vào giỏ hàng"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->product_id = $productID;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_quantity = $productQuantity;
                    $cartItem->save();
                    return response()->json(['status' => $productCheck->name." Đã thêm"]);
                }
            }    
        }
        else
        {
            return response()->json(['status' => "Vui Lòng đăng nhập"]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $productID = $request->input('productID');
        $productQuantity = $request->input('quantity');
        if(Auth::check())
        {
            if(Cart::where('product_id', $productID)->where('user_id', Auth::id())->exists())
            {
                $cart =  Cart::where('product_id', $productID)
                            ->where('user_id', Auth::id())->first();
                $cart->product_quantity = $productQuantity;
                $cart->update();
                return response()->json(['status' => 'Update quantity']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        if(Auth::check())
        {
            $productID = $request->input('productID');
            if( Cart::where('product_id', $productID)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('product_id', $productID)
                            ->where('user_id',Auth::id())->first();
                $cart->delete();
                return response()->json(['status' => "Xoá Thành Công"]);
            }       
        }
        else
        {
            return response()->json(['status' => "Vui Lòng đăng nhập"]);
        }
    }
}
