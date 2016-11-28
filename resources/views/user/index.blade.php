@extends('layouts.mackart')
@section('content')
<div class="items">
<div class="container">
    <div class="row">
    @include('includes.alert')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection