@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit product</h3>
    </div>
    <div class="card-body container">
        <form action="{{ route('product.update',$product)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label>Category</label>
                <select class="custom-select" name="category_id" data-toggle="select2">
                    @foreach ($category as $item)
                    <option value="{{$item->id}}" @if ($item->id == $product->category_id)
                        selected
                        @endif>
                        {{ $item->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{$product->description}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Original Price</label>
                        <input type="text" class="form-control" name="original_price"
                            value="{{$product->original_price}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="text" class="form-control" name="selling_price"
                            value="{{$product->selling_price}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" {{ $product->status == '1' ? 'checked' : ' '}}
                        class="custom-control-input"
                        id="status" name="status">
                        <label class="custom-control-label" for="status">Status</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" {{ $product->hot == '1' ? 'checked' :
                        ' '}} id="hot" name="hot">
                        <label class="custom-control-label" for="hot">Hot</label>
                    </div>
                </div>
            </div>

            <label class="form-label" for="customFile">Image</label>
            <div>
                @if ($product->image)
                <img src="{{ asset('assets/uploads/products/'.$product->image) }}" width="400px">
                @endif
                <input type="file" class="form-control" name="image" id="customFile" />
            </div>
            <button class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection