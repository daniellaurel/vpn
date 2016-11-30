@extends('layouts.mackart')
 
@section('content')

<div class="items">


	
	    		<!-- Newsletter starts -->
		<div class="container newsletter">
			<div class="row">
				<div class="col-md-12">
					<div class="well">
						<h5><i class="fa fa-random"></i>Generate Code</h5>
						<div id="notice">
							<p id="code-info">Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet.</p>
						</div>
						<form class="form-inline" role="form">
							<div class="form-group">
								<input type="text" class="form-control" id="vcode" placeholder="Code" readonly>
							</div>
							<button class="btn btn-default" id="btn_generate">Generate</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--/ Newsletter ends -->



</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		$('#btn_generate').click(function(event) {
			event.preventDefault();
			  $.ajax({
		      url: 'generate',
		      type: "post",
		      data: {'code':'generate', '_token': '{!! csrf_token() !!}'},
		      success: function(data){
		       	$('#notice').empty();
	            $('#notice').append('<p id="code-info" class="alert alert-success fade in"> <strong>Success!</strong> Please copy the voucher code.</p>');
	            $('#vcode').val(data);
		      }
		    }); 
		});
	});
</script>
@endsection