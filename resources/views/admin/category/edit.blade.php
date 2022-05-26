@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit category</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update',$category)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" value="{{$category->description}}">
            </div>
            <button class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection