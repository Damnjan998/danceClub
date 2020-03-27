<body class="cbp-spmenu-push">
<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="{{url("/")}}"><span class="fa fa-volume-up"></span> Dance-Club<span class="dashboard_text">Design dashboard</span></a></h1>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="{{url("/admin")}}">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Posts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url("/admin/tablesPostsAdmin")}}"><i class="fa fa-angle-right"></i>Table Posts</a></li>
                                <li><a href="{{url("/admin/formPostInsert")}}"><i class="fa fa-angle-right"></i>Form Posts</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Users</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url("/admin/tablesUsersAdmin")}}"><i class="fa fa-angle-right"></i>Table Users</a></li>
                                <li><a href="{{url("/admin/formUserInsert")}}"><i class="fa fa-angle-right"></i>Form Users</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="{{url("/admin/mailBoxAdmin")}}">
                                <i class="fa fa-envelope"></i> <span>Mailbox </span>
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </li>
                        <li class="treeview">
                            <a href="{{url("/admin/actionsAdmin")}}">
                                <i class="fa fa-history"></i> <span>Actions </span>
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </li>
                        <li class="treeview">
                            <a href="{{url("/logout")}}">
                                <i class="fa fa-sign-out"></i> <span>Logout </span>
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </aside>
    </div>
    <!--left-fixed -navigation-->
</div>
