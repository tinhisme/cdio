@extends('layouts.client')
@section('title')
Giỏ Hàng
@endsection

@section('content')
<div class="container my-5 ">
    <div class="card shadow">
        <div class="card-body">
            @php
            $totals = 0;
            @endphp
            @foreach($cartItems as $cartItem)
            <div class="row productData">
                <div class="col-md-2">
                    <img height="60px" width="60px"
                        src="{{ asset('assets/uploads/products/'.$cartItem->product->image) }}" alt="">
                </div>
                <div class="col-md-5">
                    <h3>{{ $cartItem->product->name }}</h3>
                </div>
                <div class="col-md-3">
                    <input type="hidden" value="{{ $cartItem->id}}" class="productID">
                    <label for="quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px">
                        <button type="button" class="input-group-text changeQuantity decrement">-</button>
                        <input type="text" name="quantity" value="{{$cartItem->product_quantity}}"
                            class="form-control quantity text-center">
                        <button type="button" class="input-group-text changeQuantity increment">+</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger delete-cart-item">Xoá</button>
                </div>
            </div>
            @php
            $totals += $cartItem->product_quantity*$cartItem->product->selling_price;
            @endphp

            @endforeach
        </div>
        <div class="cart-footer">
            <h5>Tổng tiền : {{$totals}}</h5>
        </div>
    </div>
</div>


@endsection