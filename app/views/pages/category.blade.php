@extends('layouts.fullpage')

@section('content')
<div class="section container cat-page">			
	<div class="row mg-btm-10">
		<div class="col-xs-12 col-sm-6 col-md-6">			
			<h1>{{ $cat->name }} 
				<div class="btn-group">
				  <a class="btn dropdown-toggle cat-menu-btn" data-toggle="dropdown" href="#">				   
				    <span class="genericon genericon-expand"></span>
				  </a>
				  <ul class="dropdown-menu cat-menu">
				  	@foreach($categories as $category)
						<li>{{ HTML::linkRoute('category', $category->name, array($category->id)) }}</li>
					@endforeach
				  </ul>
				</div>
				| <span class="cat-count">4579 POLLS</span> 
			</h1>
		</div>		
		<div class="col-xs-12 col-sm-6 col-md-6">		
			<form name="poll-search" method="post" class="frm-search-poll">
		        <div class="input-group">
		            <input type="text" class="form-control search-query" placeholder="Search Poll" name="srch-term" id="srch-term">
		            <div class="input-group-btn">
		                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		            </div>
		        </div>
		    </form>
		</div>
	</div>	
	<div class="grid">
	  <div class="grid-sizer"></div>
		  <a href=""><div class="grid-item grid-item--height2"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
		  <a href=""><div class="grid-item"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
		  <a href=""><div class="grid-item grid-item--height2"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
		  <a href=""><div class="grid-item"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
		  <a href=""><div class="grid-item grid-item--height2"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
		  <a href=""><div class="grid-item grid-item--height2"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
	   	  <a href=""><div class="grid-item"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
	      <a href=""><div class="grid-item"><img class="img-responsive img-cat" src="{{ asset('img/categories/cat-currentevents.jpg') }}" /></div></a>
	</div>
</div>
@endsection