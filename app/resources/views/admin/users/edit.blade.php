@extends('layouts.layout')

@section('title')
    Edit user
@endsection

@section('main_content')

    <div class="col-12 text-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{--                <p><a href="{{ route('admin.users.index') }}" class="button btn btn-success ">Return</a></p>--}}
                @if($errors->count() > 0)
                    <p>The following errors have occurred:</p>
                    <ul>
                        @foreach($errors->all() as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::model($user, ['route' => ['admin.users.update', $user->getKey()], $user->id, 'method' => 'put']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('role', 'Role') }}
                    {{ Form::select('role', $roles, $rolesList, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', 'Last Name') }}
                    {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Phone') }}
                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}
                </div>
                <div class="card-footer">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
