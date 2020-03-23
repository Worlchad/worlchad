
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li> <a href="{{route('admin.home')}}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
                    <li> <a href="{{route('users.index')}}" class="waves-effect"><i class="fa fa-users" data-icon="v"></i> <span class="hide-menu"> Users </span></a></li>
                    <li> <a href="{{route('events.index')}}" class="waves-effect"><i class="mdi mdi-calendar-multiple" data-icon="v"></i> <span class="hide-menu"> Events </span></a></li>
                    <li> <a href="{{route('blogs.index')}}" class="waves-effect"><i class="mdi mdi-pencil-box-outline" data-icon="v"></i> <span class="hide-menu"> Blogs </span></a></li>
                    <li> <a href="{{route('videos.index')}}" class="waves-effect"><i class="mdi mdi-video" data-icon="v"></i> <span class="hide-menu"> Videos </span></a></li>
                    <li> <a href="{{route('plans.index')}}" class="waves-effect"><i class="mdi mdi-credit-card" data-icon="v"></i> <span class="hide-menu"> Plans </span></a></li>
                    <li> <a href="{{route('admins.index')}}" class="waves-effect"><i class="mdi mdi-account" data-icon="v"></i> <span class="hide-menu"> Admins </span></a></li>
                    <li> <a href="{{route('admin.settings')}}" class="waves-effect"><i class="mdi mdi-settings" data-icon="v"></i> <span class="hide-menu"> Settings </span></a></li>
                    <li> <a href="{{route('admin.logout')}}" class="waves-effect"><i class="icon-logout" data-icon="v"></i> <span class="hide-menu"> Logout </span></a></li>
                
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->