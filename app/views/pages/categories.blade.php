@extends('layouts.default')

@section('content')
<div class="section container">            
	<div class="row" style="margin-top:1%;">
		<div id="cat-name">Current Events</div>
		<div class="banner">
			<section id="dg-container" class="dg-container">
				<div class="dg-wrapper">					 
					<a href="#" link="{{ url('category/1') }}">
						<img src="{{ asset('img/categories/cat-currentevents.jpg') }}">
					</a>
					<a href="#" link="{{ url('category/2') }}">
						<img src="{{ asset('img/categories/cat-education.jpg') }}">
					</a>
					<a href="#" link="{{ url('category/3') }}">
						<img src="{{ asset('img/categories/cat-entertainment.jpg') }}">
					</a>
					<a href="#" link="{{ url('category/4')}}">
						<img src="{{ asset('img/categories/cat-health.jpg') }}">
					</a>
					<a href="#" link="{{ url('category/5') }}">
						<img src="{{ asset('img/categories/cat-politics.jpg') }}">
					</a>
					<a href="#" link="{{ url('category/6') }}">
						<img src="{{ asset('img/categories/cat-sports.jpg') }}">
					</a>
				</div>
				<ol class="button" id="lightButton">
					<li index="0">
					<li index="1">
					<li index="2">
					<li index="3">
					<li index="4">
					<li index="5">					
				</ol>
				<nav>
					<span class="dg-prev"></span>
					<span class="dg-next"></span>
				</nav>
			</section>
		</div>
	</div>	
</div>
@endsection