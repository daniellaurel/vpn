@extends('layouts.mackart')
 
@section('content')
<!-- My Account -->

<div class="items">
  <div class="container">
    <div class="row">
    @include('includes.alert')
      <div class="col-md-3 col-sm-3">

        <!-- Sidebar navigation -->
        <h5 class="title">Pages</h5>
        <!-- Sidebar navigation -->
          <nav>
            <ul id="navi">
              <li><a href="#">My Credits</a></li>
              <li><a href="#">My Downline</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Edit Profile</a></li>
            </ul>
          </nav>

      </div>

<!-- Main content -->
      <div class="col-md-9 col-sm-9">

          <h5 class="title">Hello {{ strtoupper($data->name) }} </h5>
        @if( Auth::check() ) 
          @if(Auth::user()->hasRole('admin'))
              <strong><h3>You have Unlimited Credits</h3></strong>
          @else
             <strong><h3>You have {{ $data->credits }} Credits</h3></strong>
          @endif
        @else
        @endif
         
          <div class="address">
            <address>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890.<br />
              <a href="mailto:#">{{ $data->email }}</a>
            </address>
          </div>

          <div id="filter-panel" class="collapse filter-panel">
            <div class="panel panel-info">
             <div class="panel-heading">Transfer Credits</div>
                <div class="panel-body">
                {!! Form::open(['method' => 'PATCH','route' => ['credits.transcred', $data->id],'class'=>'form-horizontal']) !!}
                    <div class="form-group">
                      <label class="control-label col-md-1" for="credit">Credits</label>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="credits">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4" for="credit">Transfer</label>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-1" for="credit">To</label>
                      <div class="col-md-5">
                        <select class="form-control" name="credits_to_user">
                         @foreach($downline as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                         @endforeach
                        </select>      
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-5 col-md-offset-1">
                      <button type="submit" class="btn btn-primary">Go</button>
                      </div>
                    </div>
               {!! Form::close() !!}
                  </div>
            </div>
        </div>    
        <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#filter-panel">
            <span class="glyphicon glyphicon-cog"></span> Transfer
        </button>

      </div>                                                                    



    </div>
  </div>
</div>

@endsection