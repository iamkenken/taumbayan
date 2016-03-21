@extends('layouts.default')

@section('content')
<div class="section container dsh-page">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3 class="mg-btm-10">User Dashboard</h3>
            <div class="dsh-tab pull-right">
                <a data-toggle="tab" href="#tab-pro" id="a-tab-pro"><span class="glyphicon glyphicon-dashboard pointer edit-frm-account" title="Edit Personal Info"></span></a>
                <a data-toggle="tab" href="#tab-acc" id="a-tab-acc"><span class="glyphicon glyphicon-user pointer edit-frm-personal" title="Edit Account"></span></a>
                <!--a data-toggle="tab" href="#tab-set" id="a-tab-set"><span class="glyphicon glyphicon-cog pointer edit-frm-cog" title="Edit Settings"></span></a-->
            </div>
            <hr class="hr-dsh clearfix">
        </div>
    </div>
    <div class="row mg-top-10">
        <div class="tab-content">
            <div id="tab-pro" class="tab-pane fade in active">
                <div class="col-xs-12 col-sm-12 col-md-7" >   
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-small">{{ Session::get('message') }}</div>
                    @endif
                    <form action="/dashboard/update-profile" class="form-horizontal" role="form"  method="POST"> 
                        <div class="form-group">
                            <label for="inputfname" class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inputfname" id="inputfname" value="{{ $profile->firstname }}" placeholder="Input First Name *" >                 
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="inputmname" class="col-sm-4 control-label">Middle Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inputmname" id="inputmname" value="{{ $profile->middlename }}" placeholder="Input Middle Name" >                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputlname" class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inputlname" id="inputlname" value="{{ $profile->lastname }}" placeholder="Input Last Name *" >                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputsex" class="col-sm-4 control-label">Sex</label>
                            <div class="col-sm-8 col-md-8"> 
                                <select name="inputsex" id="inputsex" class="form-control">
                                    <option value="" disabled style="display: none; ">Select Gender</option>
                                    @foreach($sex as $key=>$value)
                                        <option value='{{ $key }}'
                                            @if ($key == $profile->gender )
                                            selected
                                            @endif
                                        >{{ $value }}</option>
                                    @endforeach
                                </select>   
                            </div>  
                         </div>
                        <div class="form-group">
                            <label for="inputbday" class="col-sm-4 control-label">Birthday</label>
                            <div class="col-sm-8 col-md-8">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" name="inputbirthday" id="inputbirthday" class="form-control dp" value="{{ $profile->birthday }}">

                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="loggedin_id" name="type" value="{{ $profile->user_id }}">
                        <button class="btn btn-primary" id="edit-frm-profile">Edit</button>
                        <button type="submit" class="btn btn-primary" id="saveprofile">Save</button>
                    </form>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-5" >
                    <form action="/dashboard/update-avatar" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="lbl-emblem">Emblem</label><br/>
                            @if(Session::has('message-upload'))
                                <div class="alert alert-success alert-small">{{ Session::get('message-upload') }}</div>
                            @endif
                            <input id="file" type="file" name="file" class="file" data-show-preview="false"><br/>
                            <div id="avatar-cnt">
                            @if ($profile->photo)
                            <img src="{{ $profile->photo }}" alt="Avatar" class="img-responsive avatar"/>
                            @else
                            <img src="{{ asset('img/users/no_avatar.png') }}" alt="No Avatar" class="img-responsive avatar"/>
                            @endif
                            </div>
                            <br/>
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        </div>
                    </form>
                </div>
            </div>

            <div id="tab-acc" class="tab-pane">
                <div class="col-xs-12 col-sm-12 col-md-7" >            
                    <form action="/dashboard/update-account" class="form-horizontal" role="form"  method="POST">
                        
                        <div class="form-group">
                            <label for="inputuname" class="col-sm-4 control-label">Username/Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputuname" value="{{ $user->email }}" placeholder="" >          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputpw" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <a class="btn btn-danger" id="cr-new-pw">Create New Password</a>
                                <input type="password" class="form-control pw-grp" name="inputpw" id="inputpw" placeholder="" >                 
                            </div>
                        </div>
                        <div class="form-group pw-grp">
                            <label for="inputcpw" class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputcpw" placeholder="" >                 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pw-grp" id="saveacc">Save</button>
                    </form>
                </div>
            </div>

            

      </div>
    </div>






</div>
@endsection
