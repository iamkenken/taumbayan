@extends('layouts.default')

@section('content')
<div class="section container dsh-page">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3 class="mg-btm-10">Votes of "{{ $poll->question }}"</h3>
            <div class="dsh-tab pull-right">
            @if($poll->id == 1)
                <a class="" href="{{ url('/view-votes/2') }}">Go to Votes of Vice Presidents</a>
            @else
                <a class="" href="{{ url('/view-votes/1') }}">Go to Votes of Presidents</a>
            @endif
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
                    @foreach($answers as $a)
                    <?php $users = PollHelper::getUser($a->userid) ?>
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->profile->firstname }}</td>
                        <td>{{ $users->profile->middlename }}</td>
                        <td>{{ $users->profile->lastname }}</td>
                        <td>{{ $users->profile->birthday }}</td>
                        @if($a->status == 0)
                        <td><button class="btn btn-success verify" data-id="{{ $a->id }}">Verify</button></td>
                        @else
                        <td><button class="btn btn-success verify" data-id="{{ $a->id }}">UnVerify</button></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
