@section('admin_aside')
    <div class="sidebar-wrapper pt-5 text-light">
        <div class="sidebar">
            <div class="brand-link mt-5 mb-1 d-flex justify-content-around">
                <div class="image">
                    <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="image" class="avatar-aside">
                </div>
                    <a class="d-block d-flex text-light align-items-center"
                       {{--                       href="{{ route('user.index',['user' => Auth::user()]) }}">--}}
                       href="{{  url('/admin/users/update' ,['user' => Auth::user()]) }}">
                        {{Auth::user()->name}}</a>
            </div>
            <div class="brand-link mt-1 mb-1  d-flex justify-content-evenly">
{{--                <p class="brand-text font-weight-light">Role - {{ Auth::user()->roles->pluck('name')->first() }}</p>--}}
                <p class="brand-text font-weight-light">Role - {{ Auth::user()->name }}</p>
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
                                <a href="{{url('admin/reviews')}}" class="nav-link">
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
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i class="fas fa-shopping-bag nav-icon"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
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

                    <li class="nav-item">
                        <a href="{{ route('admin.manufactur.index') }}" class="nav-link">
                            <i class="fa fa-solid fa-industry nav-icon"></i>
                            <p>
                                Manufacturs
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            @show
        </div>
    </div>
