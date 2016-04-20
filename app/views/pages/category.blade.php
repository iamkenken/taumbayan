@extends('layouts.default-ver')

@section('content')
<div class="section container cat-page mg-top-30 mg-btm-30">			
	<div class="row mg-btm-10">
		<div class="col-xs-6 col-sm-6 col-md-6">			
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
		<div class="col-xs-6 col-sm-6 col-md-6">		
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
	<div class="row">
		<div class="wall container"> 
			<a class="wall-item" href="#"> <img src="https://unsplash.it/2500/1667?image=14" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/800/600?image=30" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/2758/3622?image=35" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/2000/1333?image=37" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/4000/2670?image=29" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/3008/2008?image=21" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/2500/1667?image=14" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/800/600?image=30" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/2758/3622?image=35" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/2000/1333?image=37" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/4000/2670?image=29" class="img-cat"/></a>
			<a class="wall-item" href="#"> <img src="https://unsplash.it/3008/2008?image=21" class="img-cat"/></a>
		</div>
	</div>	
</div>
@endsection