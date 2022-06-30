@section('admin_aside')
    @role('admin')
    <div class="sidebar-wrapper">
        <a href="index3.html" class="brand-link">
            <img src="/images/admin_img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin-panel</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/images/admin_img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
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
                                Posts
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('review')}}" class="nav-link">
                                    <p>All post</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('review/add')}}" class="nav-link">
                                    <p>New post</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ url('/admin/users') }}" class="nav-link">

                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/admin/roles') }}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Rols
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            @show
        </div>
    </div>
    @endrole
{{--    @role('manager')--}}
{{--    <div id="sidebar-wrapper">--}}
{{--        <ul class="sidebar-nav">--}}
{{--            <li class="sidebar-brand"><a href="#"> Start Bootstrap </a></li>--}}
{{--            <li><a href="#">Dashboard</a></li>--}}
{{--            <li><a href="#">Shortcuts</a></li>--}}
{{--            <li><a href="#">Overview</a></li>--}}
{{--            <li><a href="#">Events</a></li>--}}
{{--            <li><a href="#">About</a></li>--}}
{{--            <li><a href="#">Services</a></li>--}}
{{--            <li><a href="#">Contact</a></li>--}}
{{--            --}}{{--            @include('inc.dateTime')--}}
{{--            @show--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    @endrole--}}
