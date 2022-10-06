@section('admin_aside')
    <div class="sidebar-wrapper pt-5 text-light">
        <div class="sidebar">
            <div class="brand-link mt-5 mb-1 d-flex justify-content-evenly">
                <div class="image">
                    <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="image" height="20px">
                </div>
                <div class="info">
                    <a class="d-block d-flex justify-content-evenly text-light"
                       {{--                       href="{{ route('user.index',['user' => Auth::user()]) }}">--}}
                       href="{{  url('/admin/users/update' ,['user' => Auth::user()]) }}">
                        {{Auth::user()->name}}</a>
                </div>
            </div>
            <div class="brand-link mt-1 mb-1  d-flex justify-content-evenly">
                <p class="brand-text font-weight-light">Role - {{ Auth::user()->roles->pluck('name')->first() }}</p>
            </div>

            <nav class="mt-2 h6">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{url('/admin')}}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Home Page
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Review
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('review')}}" class="nav-link">
                                    <p>
                                        All review
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('review/add')}}" class="nav-link">
                                    <p>
                                        New review
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ url('/admin/users') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/admin/roles') }}" class="nav-link">
                            <i class="nav-icon fas fa-key"></i>
                            <p>
                                Rols
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="fas fa-shopping-bag nav-icon"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="fas fa-tshirt nav-icon"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            @show
        </div>
    </div>
