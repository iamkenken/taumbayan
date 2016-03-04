@extends('layouts.fullpage')

@section('content')
<div class="section container dsh-page">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>User Dashboard</h1><hr class="hr-dsh">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7" >            
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputuname" class="col-sm-4 control-label">Username/Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputuname" placeholder="">                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputfname" class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputfname" placeholder="">                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputlname" class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputlname" placeholder="">                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputdpname" class="col-sm-4 control-label">Display Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputdpname" placeholder="">                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpw" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputpw" placeholder="">                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputcpw" class="col-sm-4 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="cpassword" class="form-control" id="inputcpw" placeholder="">                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputsex" class="col-sm-4 control-label">Sex</label>
                    <div class="col-sm-8 col-md-8">                       
                        <select class="form-control" id="inputsex">
                            <option value="">Male</option>
                            <option value="">Female</option>                            
                        </select>   
                    </div>  
                 </div>
                <div class="form-group">
                    <label for="inputbday" class="col-sm-4 control-label">Birthday</label>
                    <div class="col-sm-8 col-md-8">
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="birthday">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5" >   
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <label>Emblem</label>
                    <input id="file-4" type="file" class="file" data-upload-url="#">
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
