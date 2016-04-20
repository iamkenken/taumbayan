<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li <?php if($menu == 'dashboard'){ echo 'class="active"'; } ?> >
            <a href="{{ url('/admin/index') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li <?php if($menu == 'user-view'){ echo 'class="active"'; } ?>>
            <a href="javascript:;" data-toggle="collapse" data-target="#drpdwn_users" ><i class="fa fa-fw fa-group"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="drpdwn_users" class="collapse">
                <li <?php if($menu == 'user-view'){ echo 'class="active"'; } ?>>
                    <a href="{{ url('/admin/users/view') }}">View All</a>
                </li>
                <li <?php if($menu == 'user-create'){ echo 'class="active"'; } ?>>
                    <a href="{{ url('/admin/users/create') }}">Create</a>
                </li>
            </ul>
        </li>          
        <li <?php if($menu == 'polls'){ echo 'class="active"'; } ?>>
            <a href="javascript:;" data-toggle="collapse" data-target="#drpdwn_polls" ><i class="fa fa-fw fa-pencil-square-o"></i> Polls <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="drpdwn_polls" class="collapse">
                <li>
                    <a href="{{ url('/admin/polls/view') }}">View All</a>
                </li>
                <li>
                    <a href="{{ url('/admin/polls/create') }}">Create</a>
                </li>
            </ul>
        </li>    
        <li>
            <a href="{{ url('/admin/logout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a>
        </li>        
    </ul>
</div>
<!-- /.navbar-collapse -->
