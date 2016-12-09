@extends('layouts.mackart')
 
@section('content')

<div class="items">
  <div class="container">
    <div class="row">

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Duration Management</h2>
	        </div>
	      
	    </div>
	</div>

    @include('includes.alert')
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Duration</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->duration }}</td>
		<td>
			<a class="btn btn-primary" href="{{ route('duration.edit',$user->id) }}">Add</a>
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
@endsection