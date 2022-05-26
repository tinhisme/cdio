@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3> product page</h3>
        <a href="{{ route('product.create')}}" class="btn btn-primary btn-sm">Add new product</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-centered mb-0">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Original Price</th>
                <th>Selling Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach ($product as $item)
            <tr>
                <td>
                    {{ $item->id }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    <img src=" {{ asset('assets/uploads/products/'.$item->image) }}" class="cate-img" alt="">
                </td>
                <td>
                    {{ $item->description}}
                </td>
                <td>
                    {{ $item->original_price}}
                </td>
                <td>
                    {{ $item->selling_price}}
                </td>
                <td>
                    {{ $item->category->name}}
                </td>
                <td class="table-action">
                    <form action="{{ route('product.destroy', $item)}} " method="post">
                        <a href=" {{ route('product.edit', $item)}} " class="btn btn-warning btn-sm">Edit</a>
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection