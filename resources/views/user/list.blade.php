@extends('layouts.mackart')
 
@section('content')

<div class="items">
  <div class="container">
    <div class="row">

    @include('includes.alert')
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
@endsection