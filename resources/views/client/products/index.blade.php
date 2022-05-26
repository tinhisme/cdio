@extends('layouts.client')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>{{$category->name}}</h1>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <a href="{{ url('category/'.$category->slug.'/'.$product->slug) }}">
                        <span>
                            
                        </span>
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$product->image) }}" width="220" height="180"
                                alt="">
                            <div class="card-body">
                                <h5>{{$product->name}}</h5>
                                <span class="float-start">{{$product->selling_price}}</span>
                                <span class="float-end"><s>{{$product->original_price}}</s></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection