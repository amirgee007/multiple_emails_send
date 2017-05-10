
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRDLYFFVbiuptyAUVHszkKCcwT12whhXDHUIIRhDHltRTk8fr5c8WzX4DY" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#" ><i class="fa fa-circle text-success"></i> Online</a>

            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <br/>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>


            <li class="treeview {{ (Request::is('admin/dashboard') ? 'active' : '')}}">
                <a href="{{route('get.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>


            <li class="treeview {{ (Request::is('admin/category') ? 'active' : '') }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Category</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o text-red"></i> Add New </a></li>
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o text-yellow"></i> View All</a></li>
                </ul>
            </li>

            <li class="treeview {{ (Request::is('admin/emails') ? 'active' : '') }}">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Emails</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('email.index')}}"><i class="fa fa-circle-o text-red"></i> Add New </a></li>
                    <li><a href="{{route('email.index')}}"><i class="fa fa-circle-o text-yellow"></i> View All</a></li>
                </ul>
            </li>



            <li class="treeview {{ (Request::is('admin/sendNew') ? 'active' : '') }}">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Send Emails</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('sentemail.sendNew')}}"><i class="fa fa-circle-o text-red"></i> Send New </a></li>
                    <li><a href="{{route('sentemail.index')}}"><i class="fa fa-circle-o text-yellow"></i> View All</a></li>
                </ul>
            </li>






            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-files-o"></i>--}}
                    {{--<span>Layout Options</span>--}}
                    {{--<span class="label label-primary pull-right">4</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>--}}
                    {{--<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>--}}
                    {{--<li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>--}}
                    {{--<li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="pages/widgets.html">--}}
                    {{--<i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-pie-chart"></i>--}}
                    {{--<span>Charts</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
                    {{--<li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
                    {{--<li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>--}}
                    {{--<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-laptop"></i>--}}
                    {{--<span>UI Elements</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>--}}
                    {{--<li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>--}}
                    {{--<li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>--}}
                    {{--<li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>--}}
                    {{--<li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>--}}
                    {{--<li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}


            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-table"></i> <span>Tables</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
                    {{--<li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="pages/calendar.html">--}}
                    {{--<i class="fa fa-calendar"></i> <span>Calendar</span>--}}
                    {{--<small class="label pull-right bg-red">3</small>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="pages/mailbox/mailbox.html">--}}
                    {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
                    {{--<small class="label pull-right bg-yellow">12</small>--}}
                {{--</a>--}}
            {{--</li>--}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
