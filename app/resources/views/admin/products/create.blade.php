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
            <!-- /.card-header -->
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
                <div class="views m-4">
                </div>
                <div class="form-group" id="images">
                    {{ Form::label('images', 'Cover other images') }}
                    {{Form::file('images[]', ['multiple'])}}
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

            const formData = new FormData(formElem);
            const name = formData.get('image').name;
            const img = new Image(100, 100);
            img.style = "border: 1px solid darkblue; margin: 10px";
            img.src = '{{ asset('images') }}' + '/' + name;

            let view = document.querySelector('.view');

            if (view.innerHTML !== '') {
                view.firstChild.remove();
            }
            view.insertBefore(img, view.firstChild);
        });
//--------------------------------Many Image------------------------------------------------
        document.querySelector('#images').addEventListener('change', function () {

            const formData = new FormData(formElem);
            const name = formData.getAll('images[]');
            let views = document.querySelector('.views');

            while (views.firstChild) {
                views.removeChild(views.firstChild);
            }

            for (let value of name) {
                const img = new Image(100, 100);
                img.style = "border: 1px solid darkblue; margin: 10px";
                img.src = '{{ asset('images') }}' + '/' + value.name;
                views.insertBefore(img, views.firstChild);
            }
        });
//------------------------------------------------------------------------------------------
    });
</script>
