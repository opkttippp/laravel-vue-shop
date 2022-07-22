@extends('layouts.layout')

@section('title')
    Update Roles
@endsection

@section('main_content')
    <div class="form-roles">
        <p><a href="{{url('/admin/roles')}}" class="button btn btn-success ">Return</a></p>
        <form method="post" action="{{route('admin.roles.update', $role->id)}}">
            @csrf
            <div class="mb-5">
                <label for="title" style="text-align: center">Name</label>
                <input type="text" name="name" class="form-control" style="text-align: center" id="title"
                       value="{{$role->name}}">
            </div>
            @foreach($permissions as $permission)
                <div class="mb-3">
                    <input type="checkbox"
                           @if($role->hasPermissionTo($permission->name)) checked
                           @endif
                           class="form-check-input" id="permission" name="permissions[]" value="{{$permission->id}}">
                    <label for="permission" class="form-check-label">{{$permission->name}}</label>
                </div>
            @endforeach
            <button type="submit" class="button btn btn-primary">Submit</button>
        </form>
    </div>


    <div class="col-12 text-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <div class="card-tools">
                    <div class="mt-2">
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($permissions, ['route' => ['admin.roles.update', $role->getKey()], 'method' => 'put', 'id' => 'formElem']) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name',$role->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                </div>
                @foreach($permissions as $permission)
                    <div class="form-group">
                        {{ Form::label('permission', $permission->name) }}
                        {{ Form::checkbox('permissions[]', $permission->id,
  ($role->hasPermissionTo($permission->name))? true : false)}}
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
