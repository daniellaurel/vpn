	<!-- Navigation -->
		<div class="navbar bs-docs-nav" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="{{ url('/') }}">Home</a>
						</li>
						<li class="dropdown">
							<a href="{{ url('/') }}">About</a>
						</li>
						 @if (Auth::guest())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
							<ul class="dropdown-menu">
								 		<li><a href="{{ url('/login') }}">Login</a></li>
					                    <li><a href="{{ url('/register') }}">Register</a></li>
				             
							</ul>
						</li>
						@else 
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                          @endif                 
					</ul>
				</nav>
			</div>
		</div>
		<!--/ Navigation End -->