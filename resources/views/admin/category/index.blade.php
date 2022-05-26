@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3> category page</h3>
        <a href="{{ route('category.create')}}" class="btn btn-primary btn-sm">Add new category</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-centered mb-0">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach ($category as $item)
            <tr>
                <td>
                    {{ $item->id }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    {{ $item->description}}
                </td>
                <td class="table-action">
                    <form action="{{ route('category.destroy', $item)}} " method="post">
                        <a href=" {{ route('category.edit', $item->id)}} " class="btn btn-warning btn-sm">Edit</a>
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