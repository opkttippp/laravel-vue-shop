@if($errors->any())
    <div class="alert">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session('status'))
    <div class="alert">
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    </div>
@endif

