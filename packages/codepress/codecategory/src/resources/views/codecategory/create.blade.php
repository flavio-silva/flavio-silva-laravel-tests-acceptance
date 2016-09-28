@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Create Category</h3>
        {!! Form::open(['method' => 'post', 'route' => 'admin.categories.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('active', 'Active:') !!}
            {!! Form::checkbox('active', 'on', true) !!}
        </div>

        <div class="form-group">
            {!! Form::label('parent_id', 'Parent:') !!}
            {!! Form::select('parent_id', $categories, null, [
                'class' => 'form-control',
                'placeholder' => 'Selecione uma categoria'
            ]) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection