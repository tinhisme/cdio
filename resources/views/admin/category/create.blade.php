@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add category</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" placeholder="slug">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="description">
            </div>
            <button class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection