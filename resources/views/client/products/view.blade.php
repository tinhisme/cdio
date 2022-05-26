@extends('layouts.client')
@section('title', $product->name)

@section('content')
<div class="super_container">
    <div class="single_product productData">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset('assets/uploads/products/' . $product->image) }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ $category->name }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
                            </ol>
                        </nav>
                        <hr class="singleline">
                        <div class="product_name">{{ $product->name }}</div>
                        <div> <span class="product_price">Giá {{$product->selling_price}}</span> <strike
                                class="product_discount"> <span style='color:black'>{{$product->original_price}}<span>
                            </strike> </div>
                        <hr class="singleline">
                        <p class="mt-3">
                            {{$product->description}}
                        </p>

                    </div>
                    <hr class="singleline">

                    <div class="row mt-2">
                        <div class="">
                            <input type="hidden" value="{{$product->id}}" class="productID">
                            <label for="quantity">Quantity</label>
                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-primary bootstrap-touchspin-down decrement"
                                        type="button">-</button>
                                </span>
                                <input data-toggle="touchspin" type="text" name="quantity" value="1"
                                    class="form-control quantity">
                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary bootstrap-touchspin-up increment"
                                        type="button">+</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-success  btn-rounded me-3">Yêu Thích</button>
                            <button type="button" class="btn btn-primary addToCart btn-rounded me-3">Thêm Vào Giỏ Hàng</button>
                            <button type="button" class="btn btn-info btn-rounded me-3">Mua</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection