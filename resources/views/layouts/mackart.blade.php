<!DOCTYPE html>
<html lang="en">

	@include('includes.header')
	<body>







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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="index.html">Home #1</a></li>
								<li><a href="index-rslider.html">Home #2</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="myaccount.html">My Account</a></li>
								<li><a href="view-cart.html">View Cart</a></li>
								<li><a href="checkout.html">Checkout</a></li>
								<li><a href="wish-list.html">Wish List</a></li>
								<li><a href="order-history.html">Order History</a></li>
								<li><a href="edit-profile.html">Edit Profile</a></li>
								<li><a href="confirmation.html">Confirmation</a></li>
							</ul>
						</li>                   
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="general.html">General</a></li>
								<li><a href="login.html">Login</a></li>
								<li><a href="register.html">Register</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="blog-single.html">Blog Single</a></li>
								<li><a href="404.html">404</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Smartphones <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="items.html">HTC</a></li>
								<li><a href="items.html">Samsung</a></li>
								<li><a href="items.html">Apple</a></li>
								<li><a href="items.html">Motorola</a></li>
								<li><a href="items.html">Nokia</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tablets <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="items.html">Samsung</a></li>
								<li><a href="items.html">Micromax</a></li>
								<li><a href="items.html">Apple</a></li>
							</ul>
						</li>                      
						<li><a href="support.html">Support</a></li>
						<li><a href="contact.html">Contact</a></li>
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
		@yield('content')
		
		@include('includes.footer')
	
	

	</body>	
</html>