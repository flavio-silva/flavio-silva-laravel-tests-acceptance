@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Edit Tag: {{$tag->name}}</h3>
        {!! Form::open(['method' => 'post', 'route' => 'admin.tags.update']) !!}
        {!! Form::hidden('id', $tag->id)!!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $tag->name, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection