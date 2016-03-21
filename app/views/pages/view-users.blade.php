@extends('layouts.default')

@section('content')
<div class="section container dsh-page">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3 class="mg-btm-10">Verify Users</h3>
            <div class="dsh-tab pull-right">
                <a class="" href="{{ url('dashboard') }}">Back to Dashboard</a>
            </div>
            <hr class="hr-dsh clearfix">
        </div>
    </div>
    <div class="row mg-top-10">
        <div class="table-responsive col-xs-12 col-sm-12 col-md-12">           
            <table id="tbl-allUsers" class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->middlename }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->birthday }}</td>
                        @if($user->isvoter == 0)
                        <td><button class="btn btn-success verify" data-id="{{ $user->user_id }}">Verify</button></td>
                        @else
                        <td><button class="btn btn-success verify" data-id="{{ $user->user_id }}">UnVerify</button></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
