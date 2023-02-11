@extends('layouts.layout')

@section('title')
    Create Product
@endsection

@section('main_content')
    <div class="col-12 text-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Return</a>
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
                @if(!isset($product))
                    {{ Form::open(['route' => ['admin.products.store'], 'method' => 'post', 'files' => true, 'id' => 'formElem']) }}
                @else
                    {{ Form::model($product, ['route' => ['admin.products.update', $product->getKey()], 'method' => 'put', 'files' => true, 'id' => 'formElem']) }}
                @endif
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Price']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('barcode', 'Barcode') }}
                    {{ Form::text('barcode', null, ['class' => 'form-control', 'placeholder' => 'Barcode']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('stock', 'On Stock Count') }}
                    {{ Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'On Stock Count']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('category_id', 'Categories') }}
                    {{ Form::select('category_id', $categories, $productCategories,['class' => 'form-control', 'placeholder' => 'Select categories']
                    ) }}
                </div>
                <div class="form-group">
                    {{ Form::label('manufactur_id', 'Manufacturs') }}
                    {{ Form::select('manufactur_id', $manufactur, $productCategories,['class' => 'form-control', 'placeholder' => 'Select categories']
                    ) }}
                </div>
                <div class="view m-4">
                </div>
                <div class="form-group" id="image">
                    {{ Form::label('image', 'Cover main image') }}
                    {{ Form::file('image') }}
                </div>
                <div class="views m-4" style="display: flex; flex-direction: row; overflow: hidden;">
                </div>
                <div class="form-group" id="images">
                    {{ Form::label('images', 'Cover other images') }}
                    {{ Form::file('images[]', ['multiple', 'id' => 'img'])}}
                </div>
                <!-- /.card-body -->
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
        document.querySelector('#image').addEventListener('change', function () {
            let view = document.querySelector('.view');
            let file = document.querySelector('#image[type=file]').files[0];
            let img = document.createElement("img");
            img.style = "height: 120px; width: 120px; object-fit: contain; margin: 10px; border: 1px solid darkgrey;"
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
//--------------------------------Many Image------------------------------------------------
        document.querySelector('#images').addEventListener('change', function () {
            let views = document.querySelector('.views');
            let files = document.querySelector('#images input[id=img]').files;
            while (views.firstChild) {
                views.removeChild(views.firstChild);
            }
            for (let val of files) {
                let img = document.createElement("img");
                img.style = "height: 120px; width: 120px; object-fit: contain; margin: 10px; border: 1px solid darkgrey;"
                let reader = new FileReader();
                reader.onloadend = function () {
                    img.src = reader.result;
                    views.appendChild(img);
                }
                if (val) {
                    reader.readAsDataURL(val);
                } else {
                    img.src = "";
                }
            }
        });
    });
</script>
