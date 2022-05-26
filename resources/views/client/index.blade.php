@extends('layouts.client')
@section('title')
SHOP 2T
@endsection


@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Hot Product</h1>
            <div class="hot-carousel owl-carousel owl-theme">
                @foreach ($hotProducts as $hotProduct)
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/'.$hotProduct->image) }}" width="220" height="180"
                            alt="">
                        <div class="card-body">
                            <h5>{{$hotProduct->name}}</h5>
                            <span class="float-start">{{$hotProduct->selling_price}}</span>
                            <span class="float-end"><s>{{$hotProduct->original_price}}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.hot-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection