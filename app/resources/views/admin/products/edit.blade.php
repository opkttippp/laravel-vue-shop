@extends('layouts.layoutAdmin')

@section('title')
    Edit Product
@endsection

@section('main_content')
{{--    <div class="container">--}}
        <style>
            #grid {
                display: grid;
                grid-template-columns:repeat(auto-fill, minmax(20%, 1fr));
                /*grid-template-columns: 1fr 1fr 1fr;*/
                /*grid-gap: 2vw;*/
                /*background-color: #95999c;*/
            }

            #grid > img {
                font-size: 1.1vw;
                padding: .5em;
                /*margin: .05em;*/
                background: white;
                box-shadow: 0 0 0 1px darkgrey;
            }
        </style>
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
                        {{ Form::select('category_id', $categories, $productCategories,
                                        ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('manufactur_id', 'Manufacturs') }}
                        {{ Form::select('manufactur_id', $manufactur, $productManufactur,
                                        ['class' => 'form-control']) }}
                    </div>
                    <div class="view m-4" style="height: 25%; width: 25%; border: 1px solid darkgrey; text-align: center">
                        <img src="{{asset('storage/'.$product->image)}}" height="100px" width="100px" alt="image"
                             style="width: 80%; height: 80%; object-fit: contain; margin: 10px;">
                    </div>
                    <div class="form-group" id="image">
                        {{ Form::label('image', 'Main image') }}
                        {{ Form::file('image') }}
                    </div>
                        <div id="grid" class="views m-2" style="overflow: hidden;">
                            @foreach($galleries as $gall)
                                <img src="{{asset('storage/'.$gall->photos)}}"  alt="image" height="100px"
                                     style="width: 100px; height: 100px; object-fit: contain; margin: 10px; justify-content: center;">
                            @endforeach
                        </div>
                    <div class="form-group m-4" id="images">
                        {{ Form::label('images', 'Cover image') }}
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
{{--    </div>--}}
@endsection

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
//-------------------------------Main Image------------------------------------------------
        document.querySelector('#image').addEventListener('change', function () {

            const formData = new FormData(formElem);
            const name = formData.get('image').name;
            const img = new Image(100, 100);
            img.style = "width: 80%; height: 80%; object-fit: contain; margin: 10px;";
            img.src = '{{ asset('images') }}' + '/' + name;

            let view = document.querySelector('.view');

            while (view.firstChild) {
                view.removeChild(view.firstChild);
            }
            // view.insertBefore(img, view.firstChild);
            view.append(img);
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
                img.style = "width: 80%; height: 80%; object-fit: contain; margin: 10px;";
                img.src = '{{ asset('images') }}' + '/' + value.name;
                // views.insertBefore(img, views.firstChild);
                views.append(img);
            }
        });
//------------------------------------------------------------------------------------------
    });
</script>
