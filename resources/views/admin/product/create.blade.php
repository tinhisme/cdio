@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add product</h3>
    </div>
    <div class="card-body container">
        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Category</label>
                <select class="custom-select" name="category_id" data-toggle="select2">
                    <option>Select category</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{ $item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="description">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Original Price</label>
                        <input type="text" class="form-control" name="original_price" placeholder="Original Price">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="text" class="form-control" name="selling_price" placeholder="Selling Price">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="status" name="status">
                        <label class="custom-control-label" for="status">Status</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="hot" name="hot">
                        <label class="custom-control-label" for="hot">hot</label>
                    </div>
                </div>
            </div>

            <div>
                <label class="form-label" for="customFile">Image</label>
                <input type="file" class="form-control" name="image" id="customFile" />
            </div>

            <button class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection