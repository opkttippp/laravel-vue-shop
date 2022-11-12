@extends('layouts.layoutAdmin')
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

                {{ Form::model($user, ['route' => ['admin.users.update', $user->getKey()], $user->id, 'files' => true, 'id' => 'formElem', 'method' => 'put']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('pass', 'Password') }}
                    {{ Form::text( 'pass', null, ['class' => 'form-control', 'placeholder' => 'Password']) }}
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
                    <div class="view m-4" style="height: 120px; width: 120px; border: 1px solid darkgrey;">
                        <img src="{{asset('storage/'.$user->avatar)}}" height="100px" width="100px" alt="image"
                             style="width: 80%; height: 80%; object-fit: contain; margin: 10px;">
                    </div>
                <div class="form-group" id="avatar">
                    {{ Form::label('avatar', 'Avatar') }}
                    {{ Form::file('avatar') }}
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
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
//-------------------------------Main Image------------------------------------------------
        document.querySelector('#avatar').addEventListener('change', function () {

            let view = document.querySelector('.view');
            let file = document.querySelector('#avatar[type=file]').files[0];
            let img = document.createElement("img");
            img.style = "width: 80%; height: 80%; object-fit: contain; margin: 10px;";
            while (view.firstChild) {
                view.removeChild(view.firstChild);
            }
            let reader = new FileReader();
            reader.onloadend = function () {
                img.src = reader.result;
                view.appendChild(img);
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                img.src = "";
            }
        });
    });
    //----------------------------------------------------------------------------------------
</script>
