@extends('admin.layout')

@section('content')
<!-- CONTENT -->
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    View <small>Polls</small>
                    <a href="{{ url('admin/polls/create') }}" class="pull-right"><small><span class="glyphicon glyphicon-plus" title="Create Poll"></span></small></a>
                </h1>
                <ol class="breadcrumb">
                	<li>
                        <a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-pencil-square-o"></i> Polls
                    </li>
                    <li class="active">
                        View
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
	        <div class="table-responsive col-xs-12 col-sm-12 col-md-12">           
	            <table id="tbl-allPolls-admin" class="table table-hover">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Title</th>
                            <th>Question</th>
                            <th>Type</th>
	                        <th>Action</th>	                      
	                    </tr>
	                </thead>
	                <tbody>   
                        @foreach($polls as $p)  
	                    <tr>                    	
	                        <td>{{ $p->id }}</td>
	                        <td>{{ $p->title }}</td>
                            <td>{{ $p->question }}</td>
                            <td>{{ $p->type }}</td>
                            @if($p->status == 'pending')
	                        <td><a href="" class="btn btn-success approve" data-id="{{ $p->id }}">Approve</a></td>    
                            @endif 
                            @if($p->status == 'published')
                            <td><a href="" class="btn btn-success approve" data-id="{{ $p->id }}">Unapproved</a></td>    
                            @endif                        
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

