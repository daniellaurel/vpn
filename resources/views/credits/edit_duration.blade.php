@extends('layouts.mackart')
 
@section('content')

<div class="items">


	
	    		<!-- Newsletter starts -->
		<div class="container newsletter">
			<div class="row">
				<div class="col-md-12">
					<div class="well">
						<h5><i class="fa fa-random"></i>Select Duration</h5>
						<div id="notice">
							<p id="code-info">Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet.</p>
						</div>
						{!! Form::model($user, ['method' => 'PATCH','route' => ['duration.update', $user->id],'class' => 'form-inline']) !!}
					
							<div class="form-group">
							   <strong>Duration</strong>
								{{ Form::select('duration', [
								   '1' => '1 month',
								   '2' => '2 month',
								   '3' => '3 month',
								   '4' => '4 month',
								   '5' => '5 month',
								   '6' => '6 month',
								   '7' => '7 month',
								   '8' => '8 month',
								   '9' => '9 month',
								   '10' => '10 month',
								   '11' => '11 month',
								   '12' => '12 month'],
								   null,array('class' => 'form-control')
								) }}
							</div>
							 <button type="submit" class="btn btn-danger">Add</button>
						 {{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
		<!--/ Newsletter ends -->



</div>
</div>

@endsection
