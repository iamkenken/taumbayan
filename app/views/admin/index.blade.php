@extends('admin.layout')

@section('content')
	<!-- CONTENT -->
	<div id="page-wrapper">
	    <div class="container-fluid">

	        <!-- Page Heading -->
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">
	                    Dashboard <small>Overview</small>
	                </h1>
	                <ol class="breadcrumb">
	                	<li>
	                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home </a>
	                    </li>
	                	<li>
	                        <a href="{{ url('admin/logout') }}"><i class="fa fa-power-off"></i> Logout</a>
	                    </li>
	                    <li class="active">
	                        <i class="fa fa-dashboard"></i> Dashboard
	                    </li>
	                </ol>
	            </div>
	        </div>
	        <!-- /.row -->

	        <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i> <strong>Sample Notification</strong> Lorem Ipsum Dolor
                    </div>
                </div>
            </div>
            <!-- /.row -->

	        <div class="row">
	            <div class="col-lg-3 col-md-6">
	                <div class="panel panel-primary">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-group fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                                <div class="huge">View</div>
	                                <div >All Users</div>
	                            </div>
	                        </div>
	                    </div>
	                    <a href="{{ url('admin/users/view') }}">
	                        <div class="panel-footer">
	                            <span class="pull-left">View Details</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
	                    </a>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6">
	                <div class="panel panel-green">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-thumbs-up fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                                <div class="huge">Approve</div>
	                                <div>New Polls!</div>
	                            </div>
	                        </div>
	                    </div>
	                    <a href="{{ url('admin/polls/view') }}">
	                        <div class="panel-footer">
	                            <span class="pull-left">View Details</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
	                    </a>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6">
	                <div class="panel panel-yellow">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-plus-circle fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                                <div class="huge">Create</div>
	                                <div>New Poll!</div>
	                            </div>
	                        </div>
	                    </div>
	                    <a href="{{ url('admin/polls/create') }}">
	                        <div class="panel-footer">
	                            <span class="pull-left">View Details</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
	                    </a>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6">
	                <div class="panel panel-red">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-support fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                                <div class="huge">Lorem</div>
	                                <div>Ipsum dolor!</div>
	                            </div>
	                        </div>
	                    </div>
	                    <a href="#">
	                        <div class="panel-footer">
	                            <span class="pull-left">View Details</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
	        <!-- /.row -->        
	    </div>
	    <!-- /.container-fluid -->

	</div>
	<!-- /#page-wrapper -->
@endsection

