<header role="banner">		
	<nav class="drawer-nav" role="navigation">
	  <ul class="drawer-menu"> 
		<li><a id="dr-trend-poll" class="drawer-menu-item" href="{{ url('/trending-polls') }}" title="Trending Polls">Trending Polls</a></li>
		<li><a id="dr-new-poll" class="drawer-menu-item" href="{{ url('/new-polls') }}" title="New Polls">New Polls</a></li>
		<li><a id="dr-submit-poll" class="drawer-menu-item" href="{{ url('/submit-poll?a=1') }}" title="Submit Poll">Submit Poll</a></li>
		<li><a id="dr-categories" class="drawer-menu-item" href="{{ url('/categories') }}" title="Categories">Categories</a></li>
		<li><a id="dr-polls-types" class="drawer-menu-item" href="{{ url('/polls-types') }}" title="Polls Types">Polls Types</a></li>
		<li><a id="dr-answered-poll" class="drawer-menu-item" href="{{ url('/answered-polls') }}" title="Answered Polls">Answered Polls</a></li>
		@if (!Auth::guest())
		<li><a id="dr-logout" class="drawer-menu-item" href="{{ url('/logout') }}" title="Log out">Log out</a></li>
		@endif 
	   </ul>
	</nav>		
</header>