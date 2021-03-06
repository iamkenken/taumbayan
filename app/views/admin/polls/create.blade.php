@extends('admin.layout')

@section('content')
<!-- CONTENT -->
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create <small>Polls</small>
                    <a href="{{ url('admin/polls/view') }}" class="pull-right"><small><span class="glyphicon glyphicon-list-alt" title="View Poll"></span></small></a>
                </h1>
                <ol class="breadcrumb">
                	<li>
                        <a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-pencil-square-o"></i> Polls
                    </li>
                    <li class="active">
                        Create
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            
            <div class="col-md-3 poll-tabs">                
                <div class="panel panel-default">                                       
                    <div class="panel-body">          
                        <ul class="poll-buttons nav nav-pills nav-stacked" id="myTab">
                            <li class="active"><a data-toggle="tab" href="#sectionA" class="">Thumbs</a></li>
                            <li><a data-toggle="tab" href="#sectionB" class="">Multiple Choice</a></li>
                            <li><a data-toggle="tab" href="#sectionC" class="">Mood Meter</a></li>
                            <li><a data-toggle="tab" href="#sectionD" class="">Ranking</a></li>
                            <li><a data-toggle="tab" href="#sectionE" class="">Rating</a></li>
                            <li><a data-toggle="tab" href="#sectionF" class="">uPick</a></li>
                        </ul>
                    </div>
                </div>
            </div>
               

            <div class="col-md-9">   
                <div class="panel panel-default">   
                    <div class="panel-body">
                        <div class="tab-content poll-content ">

                            <div id="sectionA" class="tab-pane fade in active">
                                <form action="#" id="th_form">
                                <div class="th-error"></div>
                                    <div class="form-group">    
                                        <select id="th_cat" class="selectpicker form-control" data-done-button="true" data-max-options="3" multiple>
                                            <option value="" style="display:none">Choose Category</option>
                                            @foreach($categories as $cat)

                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>              
                                    <div class="form-group">                
                                      <input type="text" class="form-control" id="th_title" placeholder="Enter Title">
                                    </div>                                      
                                    <div class="form-group">
                                      <textarea class="form-control" rows="5" id="th_question" placeholder="Enter Poll Question"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <input type="hidden" id="th_type" name="type" value="thumbs">
                                        <a class="submit-poll-content-btn btn pointer">Preview Poll</a>
                                        <a id="submitth" class="btn btn-primary submit-poll-content-btn btn pointer"><i class="fa fa-pencil-square-o"></i>
                                            Create Thumbs Poll
                                        </a>    
                                    </div>
                                </form> 
                            </div>

                            <div id="sectionB" class="tab-pane fade">
                                <form id="mc_form" action="#">
                                <div class="mc-error"></div>
                                <div class="form-group">    
                                    <select id="mchoicecat" class="selectpicker form-control" data-done-button="true" data-max-options="3" multiple>
                                    <option value="" style="display:none">Choose Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                    </select>
                                </div>              
                                <div class="form-group">                
                                  <input type="text" class="form-control" id="mc_title" placeholder="Enter Title">
                                  <div class="help-block with-errors"></div>
                                </div>  
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" maxlength="200" id="mc_question" placeholder="Enter Poll Question"></textarea>
                                </div>
                                <div class="form-group">    
                                    <select id="numchoice" class="form-control">
                                    <option value=''></option>
                                    @for($x = 2; $x <= 10; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                    </select>
                                </div>  
                                <div class="choices">
                                    
                                </div>
                                <div class="text-right" style="clear:both;">
                                    <input type="hidden" id="mc_type" name="type" value="multiplechoice">
                                    <a class="submit-poll-content-btn btn pointer">Preview Poll</a>
                                    <a id="submitmc" class="btn btn-primary submit-poll-content-btn btn pointer"><i class="fa fa-pencil-square-o"></i>
                                        Create Multiple Choice Poll
                                    </a>    
                                </div>
                                </form> 
                            </div>

                            <div id="sectionC" class="tab-pane fade">
                                <form action="#" id="moodform">
                                 <div class="mm-error"></div>
                                <div class="form-group">    
                                    <select id="mm_cat" class="selectpicker form-control" data-done-button="true" data-max-options="3" multiple>
                                    <option value="" style="display:none">Choose Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                    </select>
                                </div>              
                                <div class="form-group">                
                                  <input type="text" class="form-control" id="mm_title" placeholder="Enter Title">
                                </div>                                      
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" id="mm_question" placeholder="Enter Poll Question"></textarea>
                                </div>
                                <div class="text-left">
                                    <div class="text-gray">Select Moods</div>
                                    <div class="row">
                                        <div class="col-md-12 text-center" style="height: 55px;">                                                           
                                            <a href="#"><img data-mood="shocked" src="{{ asset("img/moods/mood1.png") }}" class="mood" data-toggle="tooltip" title="Shocked!"/></a>
                                            <a href="#"><img  data-mood="angry"src="{{ asset("img/moods/mood2.png") }}" class="mood" data-toggle="tooltip" title="Angry"/></a>
                                            <a href="#"><img data-mood="fine" src="{{ asset("img/moods/mood3.png") }}" class="mood" data-toggle="tooltip" title="Fine"/></a>
                                            <a href="#"><img data-mood="happy" src="{{ asset("img/moods/mood4.png") }}" class="mood" data-toggle="tooltip" title="Happy"/></a>
                                            <a href="#"><img data-mood="sad" src="{{ asset("img/moods/mood5.png") }}" class="mood" data-toggle="tooltip" title="Sad"/></a>
                                            <a href="#"><img data-mood="dontcare" src="{{ asset("img/moods/mood6.png") }}" class="mood" data-toggle="tooltip" title="Do not Care"/></a>
                                            <a href="#"><img data-mood="nothing" src="{{ asset("img/moods/mood7.png") }}" class="mood" data-toggle="tooltip" title="Nothing"/></a>
                                        </div>
                                    </div>
                                </div>                                              
                                <div class="text-right">
                                    <input type="hidden" id="mm_type" name="type" value="mood">
                                    <a class="submit-poll-content-btn btn pointer">Preview Poll</a>
                                    <a id="submitmood" class="btn btn-primary submit-poll-content-btn btn pointer"><i class="fa fa-pencil-square-o"></i>
                                        Create Mood Meter Poll
                                    </a>    
                                </div>
                                </form> 
                            </div>

                            <div id="sectionD" class="tab-pane fade">
                               <form id="rank_form" action="#">
                                <div class="rank-error"></div>
                                <div class="form-group">    
                                    <select id="rank_cat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3" >
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                    </select>
                                </div>              
                                <div class="form-group">                
                                  <input type="text" class="form-control" id="rank_title" placeholder="Enter Title">
                                </div>  
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" maxlength="200" id="rank_question" placeholder="Enter Poll Question"></textarea>
                                </div>
                                <!-- <div class="form-group">   
                                    <select id="ranknumber" class="form-control">
                                    <option value=''></option>
                                    @for($x = 2; $x <= 10; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                    </select>
                                </div>   -->
                                <div class="form-group">    
                                    <select id="rankchoice" class="form-control">
                                    <option value=''></option>
                                    @for($x = 2; $x <= 10; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                    </select>
                                </div>  
                                <div class="rank_choices">
                                </div>
                                <div class="text-right" style="clear:both;">
                                    <input type="hidden" id="rank_type" name="type" value="ranking">
                                     <a class="submit-poll-content-btn btn pointer">Preview Poll</a>
                                    <a id="submitrank" class="btn btn-primary submit-poll-content-btn btn pointer"><i class="fa fa-pencil-square-o"></i>
                                        Create Ranking Poll
                                    </a>       
                                </div>
                                </form> 
                            </div>

                            <div id="sectionE" class="tab-pane fade">
                                <form id="rating_form" action="#">
                                <div class="rating-error"></div>
                                <div class="form-group">    
                                    <select id="rating_cat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3" >
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                    </select>
                                </div>              
                                <div class="form-group">                
                                  <input type="text" class="form-control" id="rating_title" placeholder="Enter Title">
                                </div>  
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" maxlength="200" id="rating_question" placeholder="Enter Poll Question"></textarea>
                                </div>
                                <div class="form-group">    
                                    <select id="ratingnumber" class="form-control">
                                    <option value=''></option>
                                    @for($x = 2; $x <= 10; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                    </select>
                                </div>
                                <div class="form-group">    
                                    <select id="ratingchoice" class="form-control">
                                    <option value=''></option>
                                    @for($x = 2; $x <= 10; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                    </select>
                                </div>  
                                <div class="rating_choices">
                                </div>
                                <div class="text-right" style="clear:both;">
                                    <input type="hidden" id="rating_type" name="type" value="rating">
                                    <a class="submit-poll-content-btn btn pointer">Preview Poll</a>
                                    <a id="submitrating" class="btn btn-primary submit-poll-content-btn btn pointer"><i class="fa fa-pencil-square-o"></i>
                                        Create Rating Poll
                                    </a>     
                                </div>
                                </form> 
                            </div>

                            <div id="sectionF" class="tab-pane fade">
                                <form id="upick_form" action="#">
                                <div class="upick-error"></div>
                                <div class="form-group">    
                                    <select id="upick_cat" class="selectpicker form-control" data-done-button="true" data-max-options="3" multiple>
                                    <option value="" style="display:none">Choose Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                    </select>
                                </div>              
                                <div class="form-group">                
                                  <input type="text" class="form-control" id="upick_title" placeholder="Enter Title">
                                  <div class="help-block with-errors"></div>
                                </div>  
                                <div class="form-group">
                                  <textarea class="form-control" rows="5" maxlength="200" id="upick_question" placeholder="Enter Poll Question"></textarea>
                                </div>
                                <div class="form-group">    
                                    <select id="upick_numchoice" class="form-control">
                                    <option value=''></option>
                                    @for($x = 2; $x <= 10; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                    </select>
                                </div>  
                                <div class="upick_choices">
                                    
                                </div>
                                <div class="text-right" style="clear:both;">
                                    <input type="hidden" id="upick_type" name="type" value="upick">
                                    <a class="submit-poll-content-btn btn pointer">Preview Poll</a>
                                    <a id="submitupick" class="btn btn-primary submit-poll-content-btn btn pointer"><i class="fa fa-pencil-square-o"></i>
                                        Create uPick Poll
                                    </a>  
                                </div>
                                </form>     
                            </div>                                     
                        </div>
                    </div>
                </div>
            </div>

          

  		</div>
        <!-- /.row -->        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@endsection

