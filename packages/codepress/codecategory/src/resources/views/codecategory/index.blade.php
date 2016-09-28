@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="title">Categories</h1>
        <br/>
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create Category</a>
        <br/>
        <br/>
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Parent</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->active}}</td>
                <td>{{$category->parent->name ?? null}}</td>
                <td>
                    <a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-default">
                        Edit
                    </a>
                    <a href="{{route('admin.categories.destroy', ['id' => $category->id])}}" class="btn btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection