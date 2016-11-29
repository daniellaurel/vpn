@extends('layouts.mackart')
 
@section('content')

<div class="items">
  <div class="container">
    <div class="row">

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Voucher Management</h2>
	        </div>
	        <div class="pull-right">
	        	
	            <a class="btn btn-success"> Create New Voucher</a>
	          
	        </div>
	    </div>
	</div>

    @include('includes.alert')
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Code</th>
			<th>Date Use</th>
			<th>Expiration Date</th>
			<th>Expired</th>
			<th>Voucher User</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($vouchers as $key => $v)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $v->code }}</td>
		<td>{{ date('F j, Y, g:i a', strtotime($v->date_use)) }}</td>
		<td>{{ date('F j, Y, g:i a', strtotime($v->expiration_date)) }}</td>
		<td>
		@if($v->is_expired == 1)
		<p>Yes</p>
		@else
		<p>No</p>
		@endif
		
		</td>
		<td>{{App\User::find($v->user_id)->name}}</td>

		<td>
			<a class="btn btn-info">Show</a>
			<a class="btn btn-primary" >Edit</a>
			
		</td>
	</tr>
	@endforeach
	</table>
	{!! $vouchers->render() !!}
</div>
</div>
</div>
@endsection