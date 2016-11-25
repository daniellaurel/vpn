@extends('layouts.mackart')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('user.admin') }}">Employee List</a>

					</span>
                </header>
                <div class="panel-body">
                   <div class="formy well">
                     <h4 class="title">Add New User</h4>
                                  <div class="form">

                                      <!-- Login  form (not working)-->
                                     {{ Form::open(array('route' => 'user.store', 'class' => 'form-horizontal','files' => true)) }}
                                          <!-- Name -->
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Full Name</label>

                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" name="name">

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div> 
                                          <!-- Email -->
                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                <div class="col-md-8">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                                                         
                                          <!-- Username -->
                                           <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label for="username" class="col-md-4 control-label">username</label>

                                                <div class="col-md-8">
                                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                                    @if ($errors->has('username'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                          <!-- Password -->
                                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-8">
                                                <input id="password" type="password" class="form-control" name="password">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                        
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- roles -->
                                         <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                                            <label for="roles" class="col-md-4 control-label">Role</label>

                                            <div class="col-md-8">
                                                 {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}

                                                @if ($errors->has('roles'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('roles') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
        
                                        
                                          
                                          <!-- Buttons -->
                                          <div class="form-actions">
                                             <!-- Buttons -->
                                             <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-danger">Add</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                          </div>
                                     {{ Form::close() }}
                                      <hr />
                                      <br />
                                      <br />
                                          
                                    </div> 
                                  </div>
                </div>
                
            </section>
        </div>
    </div>
@endsection





