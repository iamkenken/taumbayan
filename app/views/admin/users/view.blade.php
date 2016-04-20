@extends('admin.layout')

@section('content')
<!-- CONTENT -->
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    View <small>Users</small>
                    <a href="{{ url('admin/users/create') }}" class="pull-right"><small><span class="glyphicon glyphicon-plus" title="Create User"></span></small></a>
                </h1>
                <ol class="breadcrumb">
                	<li>
                        <a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-group"></i> Users
                    </li>
                    <li class="active">
                       View All
                    </li>
                </ol>
              
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
	        <div class="table-responsive col-xs-12 col-sm-12 col-md-12">           
	            <table id="tbl-allUsers-admin" class="table table-hover">
	                <thead>
	                    <tr>
                            <th>ID</th>
	                        <th>Email</th>
	                        <th>First Name</th>
	                        <th>Middle Name</th>
	                        <th>Last Name</th>
	                        <th>Date of Birth</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>     	                                     	
                        @foreach($taumbayan as $usr)
                        <tr>  
                            <td>{{ $usr->id }}</td>    
                            <td>{{ $usr->email }}</td>    
                            <td>{{ $usr->profile->firstname }}</td>  
                            <td>{{ $usr->profile->middlename }}</td>  
                            <td>{{ $usr->profile->lastname }}</td>  
                            <td>{{ $usr->profile->birthday }}</td>  
                            <td><a href="" class="btn btn-warning btn-sm">Block</a> <a href="" class="btn btn-danger btn-sm usrdelete" data-id="{{ $usr->id }}">Delete</a></td>   
                        </tr>                         
                        @endforeach                   
	                </tbody>
	            </table>


	        </div>
  		</div>
        <!-- /.row -->        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@endsection

