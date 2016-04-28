<header role="banner">		
	<nav class="drawer-nav" role="navigation">
	  <ul class="drawer-menu"> 
		<li><a id="dr-trend-poll" class="drawer-menu-item" href="{{ url('/trending-polls') }}" title="Trending Polls">Trending Polls</a></li>
		<li><a id="dr-new-poll" class="drawer-menu-item" href="{{ url('/new-polls') }}" title="New Polls">New Polls</a></li>
		<!-- <li><a id="dr-answered-poll" class="drawer-menu-item" href="{{ url('/sponsored-polls') }}" title="Sponsored Polls">Sponsored Polls</a></li> -->
		<li><a id="dr-submit-poll" class="drawer-menu-item" href="{{ url('/submit-poll') }}" title="Submit Poll">Submit Poll</a></li>
		<li><a id="dr-categories" class="drawer-menu-item" href="{{ url('/categories') }}" title="Categories">Categories</a></li>
		<li><a id="dr-polls-types" class="drawer-menu-item" href="{{ url('/polls-types') }}" title="Polls Types">Types of Polls</a></li>	
		
		@if (!Auth::guest())
		<li><a id="dr-dashboard" class="drawer-menu-item" href="{{ url('/dashboard') }}" title="Dashboard">Dashboard</a></li>
		<li><a id="dr-logout" class="drawer-menu-item" href="{{ url('/logout') }}" title="Log out">Log out</a></li>
		@endif 
	   </ul>
	</nav>		
</header>