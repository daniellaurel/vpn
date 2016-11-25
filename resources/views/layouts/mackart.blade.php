<!DOCTYPE html>
<html lang="en">

	@include('includes.header')
	<body>

	@if( Auth::check() ) 
	
		@if(Auth::user()->hasRole('admin'))
	        @include('navigation.nav_admin')
	    @elseif(Auth::user()->hasRole('user'))
	    	@include('navigation.nav_user')
	    @else
	    @endif
    @else
    	@include('navigation.nav_guest')
	@endif

 	

	@yield('content')
	@include('includes.footer')
	</body>	
</html>