@extends('layouts.layoutAdmin')

@section('title')
    Manufactur
@endsection

@section('main_content')
    <div class="col-12 text-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.manufactur.index') }}" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if($errors->count() > 0)
                    <p>The following errors have occurred:</p>
                    <ul>
                        @foreach($errors->all() as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(!isset($manufactur))
                    {{ Form::open(['route' => ['admin.manufactur.store'], 'method' => 'post', 'files' => true, 'id' => 'formElem']) }}
                @else
                    {{ Form::model($manufactur, ['route' => ['admin.manufactur.update', $manufactur->getKey()], 'method' => 'put', 'files' => true, 'id' => 'formElem']) }}
                @endif
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('country', 'Country') }}
                    {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) }}
                </div>
                    <div class="view m-4">
                        <img src="{{asset('storage/'.$manufactur->image)}}" alt="image"
                             style="width: 120px; height: 120px; object-fit: contain; margin: 10px; border: 1px solid darkgrey">
                    </div>
                    <div class="form-group" id="image">
                        {{ Form::label('image', 'Cover image') }}
                        {{ Form::file('image') }}
                    </div>
                <div class="card-footer">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#image').addEventListener('change', function () {
            let view = document.querySelector('.view');
            let file = document.querySelector('input[type=file]').files[0];
            let img = document.createElement("img");
            img.style = "width: 120px; height: 120px; object-fit: contain; margin: 10px; border: 1px solid darkgrey";
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
</script>
