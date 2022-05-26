@extends('layouts.client')
@section('title')
Category
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Categories</h1>
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4 mb-3">
                        <a href="{{ url('view-products/'.$category->slug) }}">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{$category->name}}</h5>
                                    <p>{{$category->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection