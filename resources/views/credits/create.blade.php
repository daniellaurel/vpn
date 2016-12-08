@extends('layouts.mackart')
 
@section('content')

		<!-- Login Modal starts -->
		<div id="addCredit" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Add Credits</h4>
					</div>
					<div class="modal-body">
						<div class="form">
							<form class="form-horizontal">   
							  <div class="form-group">
								<label class="control-label col-md-3" for="credit">Credits</label>
								<div class="col-md-7">
								 <input type="text" class="form-control" id="user-id">
								 <input type="text" class="form-control" id="credit">
								</div>
							  </div>
							  <div class="form-group">
							  <div class="col-md-7 col-md-offset-3">
								<button type="submit" class="btn btn-default" id="addcredits">Add</button>
								<button type="reset" class="btn btn-default">Reset</button>
							  </div>
							  </div>
							</form>
						</div> 
					</div>
					
				</div>
			</div>
		</div>
		<!--/ Login modal ends -->


<div class="items">
  <div class="container">
    <div class="row">

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>User Management</h2>
	        </div>
	        <div class="pull-right">
	        	
	            <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
	          
	        </div>
	    </div>
	</div>

    @include('includes.alert')
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Credits</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td><label class="label label-success">{{ $user->credits }}</label></td>
		<td>
			<a href="#addCredit" userdata = "{{$user->id}}" role="button" data-toggle="modal" class="btn btn-info show-creditmodal">Add</a>
			<a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
</div>
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		

		$('.show-creditmodal').click(function(event) {
			$('#user-id').val($(this).attr('userdata'));
		});

		$('#addcredits').click(function(event) {
			var uid = $('#user-id').val();
			event.preventDefault();
			  $.ajax({
		      url: 'credits/update',
		      type: "post",
		      data: {'id':uid, '_token': '{!! csrf_token() !!}'},
		      success: function(data){
		      	console.log(data);
		       /*	$('#notice').empty();
	            $('#notice').append('<p id="code-info" class="alert alert-success fade in"> <strong>Success!</strong> Please copy the voucher code.</p>');
	            $('#vcode').val(data);*/
		      }
		    }); 
		});
	});
</script>
@endsection