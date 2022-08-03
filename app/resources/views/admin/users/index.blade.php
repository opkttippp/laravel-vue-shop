@extends('layouts.layout')

@section('title')
    Users
@endsection

@section('main_content')
    <div class="col-12 text-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <div class="card-tools">
                    {{--                    {{ $products->links() }}--}}
                    <div class="mt-2">
                        @if(auth()->user()->can('add post'))
                            {{--                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create</a>--}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr style="text-align: center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td id="id">{{ $user->id }}</td>
                            <td id="name">{{ $user->name }}</td>
                            <td>
                                <div style="overflow: hidden; height: 75px;">
                                    <img class="rounded mx-auto d-block" src="{{asset('storage/'.$user->avatar)}}"
                                         alt="tv" style="width: 80%; height: 80%; object-fit: contain;">
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>

                                <span class="badge
                                @foreach($user->roles as $role)
                                {{$role->name == 'admin'? 'badge-danger' : 'badge-success'}}">
                                        {{$role->name}}
                                    @endforeach
                            </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if(auth()->user()->can('edit post'))
                                        <a href="{{route('admin.users.edit', $user->id)}}"
                                           class="btn btn-primary">Edit</a>
                                    @endif
                                    @if(auth()->user()->can('delete post'))
                                        <a href="{{route('admin.users.delete', $user->id)}}" class="btn btn-danger">Delete</a>
                                    @endif                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>
    // function checkEvent() {
    //-------------------------------------1-------------------------------------
    // function checkEvent() {
    //     fetch('/api/user', {headers: {"Content-Type": "application/json"
    //     }}).then(response => response.json()
    //     ).then(data => console.log(data))
    // };
    //------------------------------------2-------------------------------------
    // function checkEvent() {
    //     fetch('/api/user').then((response) => {
    //         return response.json();
    //     }).then((data) => {
    //             console.log(data);
    //         });
    // }
    //-------------------------------------3-------------------------------------
    // }
    document.addEventListener('DOMContentLoaded', function () {

        async function checkEvent() {
            let id = document.querySelector('#id');

            // let response = await fetch('/api/user', {
            //     headers: {
            //         "Content-Type": "application/json"
            //     }
            // });
            // let data = await response.json();
            // let dataset = data.data;
            //
            // for (let i = 1; i < dataset.length; i++) {
            //     let id_back = document.createElement('div');
            //     id_back.innerHTML = value.id;
            //     id.append(id_back);
            // }

            // fetch('/api/user')
            //     .then(response => {
            //         return response.json();
            //     })
            //     .then(products => {
            //
            //         console.log(products);
            //     })

        }


        checkEvent();
    });
</script>


