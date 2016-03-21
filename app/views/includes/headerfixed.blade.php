<nav class="navbar navbar-default navbar-fixed-top header-custom" role="navigation">
    <div class="container">               
          <div class="navbar-header">
            <!-- Hidden nav -->
            <button type="" class="drawer-toggle navbar-toggle" data-toggle="collapse" title="Menu">                         
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
            </button>
            <!-- Site Logo and name -->
            <a class="navbar-brand" href="{{ url('/') }}" title="Taumbayan">{{ HTML::image('img/TLogo32.png') }}Taumbayan</a>
          </div>                  
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse">            
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <!-- <li><a class="pointer m-signup" title="Sign up" href="{{ url('/register') }}">Sign up</a></li>
                <li><a class="pointer m-login" title="Log in" href="{{ url('/login') }}">Log in</a></li> -->

                <li><a class="pointer m-signup" title="Sign up" href="#">Sign up</a></li>
                <li><a class="pointer m-login" title="Log in" href="#">Log in</a></li>
            @else  
                <li><a href="{{ url('/dashboard') }}" title="">Hi! {{ $profile->firstname }} 
                @if ($profile->photo)
                {{ HTML::image($profile->photo, 'Avatar', array('class' => 'img-circle', 'width' => 20) ) }}
                @else
                <span class="genericon genericon-user icon-user"></span>
                @endif
                </a></li> 
            @endif 
                <li><a class="drawer-toggle genericon genericon-menu pull-left pointer" title="Menu"><label>Menu</label></a></li>                        
            </ul>
          </div><!-- /.navbar-collapse -->
    </div>
</nav>