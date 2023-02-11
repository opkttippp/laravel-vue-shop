@extends('layouts.layout')

@section('title')
    Create Role
@endsection

@section('main_content')

<div class="col-12 text-dark">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
            <div class="card-tools">
                <div class="mt-2">
                    @if(auth()->user()->can('add post'))
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Return</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ Form::open(['route' => ['admin.roles.store'], 'method' => 'post', 'id' => 'formElem']) }}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            @foreach($permissions as $permission)
            <div class="form-group">
                {{ Form::label('permission', $permission->name) }}
                {{ Form::checkbox('permissions[]', $permission->id,  false) }}
            </div>
            @endforeach

            <div class="card-footer">
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
