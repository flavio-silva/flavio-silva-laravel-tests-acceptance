@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Edit Category: {{$category->name}}</h3>
        {!! Form::open(['method' => 'post', 'route' => 'admin.categories.update']) !!}
        {!! Form::hidden('id', $category->id)!!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('active', 'Active:') !!}
            {!! Form::checkbox('active', 'on', $category->active) !!}
        </div>

        <div class="form-group">
            {!! Form::label('parent_id', 'Parent:') !!}
            {!! Form::select('parent_id', $categories, $category->parent->id ?? null, [
                'class' => 'form-control',
                'placeholder' => 'Selecione uma categoria'
            ]) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection