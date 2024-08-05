


@section('sidebar')
    
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('assets/admins/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Giang</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..." />
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
               
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Categories</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admins.categories.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
                        <li><a href="{{route('admins.categories.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Roles</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admins.roles.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
                        <li><a href="{{route('admins.roles.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Courses</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admins.courses.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                        <li><a href="{{ route('admins.courses.create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Instructors</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>List</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Create</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Promotions</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>List</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span>Reviews</span>
                        
                    </a>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Accouts</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>Admins</a></li>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i>List</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>Create</a></li>
                            </ul>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Clients</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Classes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>List</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Create</a></li>
                    </ul>
                </li>
                <li >
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Payments</span>
                        
                    </a>
                   
                </li>
                <li><a href="documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endsection