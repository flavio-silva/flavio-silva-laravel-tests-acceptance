@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="title">Tags</h1>
        <br/>
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Create Tag</a>
        <br/>
        <br/>
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td>
                    <a href="{{route('admin.tags.edit', ['id' => $tag->id])}}" class="btn btn-default">
                        Edit
                    </a>
                    <a href="{{route('admin.tags.destroy', ['id' => $tag->id])}}" class="btn btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection