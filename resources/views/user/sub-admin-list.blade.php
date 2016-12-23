@extends('layouts.mackart')
 
@section('content')

<div class="items">
  <div class="container">
    <div class="row">
	 @include('includes.alert')
	<div class="col-md-3 col-sm-3">


	@if( Auth::check() ) 
		@if(Auth::user()->hasRole('admin'))
	        @include('sidebar.admin-sidebar')
	    @elseif(Auth::user()->hasRole('sub-admin'))
	    	@include('sidebar.subadmin-sidebar')
	    @elseif(Auth::user()->hasRole('reseller'))
	    	@include('sidebar.reseller-sidebar')
	    @elseif(Auth::user()->hasRole('sub-reseller'))
	    	@include('sidebar.subreseller-sidebar')
	    @else
	    	@include('sidebar.client-sidebar')
	    @endif
    @else
    
	@endif

      </div>
<!-- Main content -->
    <div class="col-md-9 col-sm-9">
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
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
</div>
</div>
</div>
</div>
@endsection