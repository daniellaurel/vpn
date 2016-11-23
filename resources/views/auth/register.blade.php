@extends('layouts.mackart')

@section('content')
<!-- Page content starts -->

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!-- Some content -->
                  <h3 class="title">Register Today <span class="color">!!!</span></h3>
                  <h4 >Morbi tincidunt posuere turpis eu laoreet</h4>
                  <p>Nullam in est urna. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. </p>
                  <h5>Maecenas hendrerit neque id</h5>
                  <div class="lists">
                  <ul>
                    <li>Etiam adipiscing posuere justo, nec iaculis justo dictum non</li>
                    <li>Cras tincidunt mi non arcu hendrerit eleifend</li>
                    <li>Aenean ullamcorper justo tincidunt justo aliquet et lobortis diam faucibus</li>
                    <li>Maecenas hendrerit neque id ante dictum mattis</li>
                    <li>Vivamus non neque lacus, et cursus tortor</li>
                  </ul>
                  </div>
                  <p>Nullam in est urna. In vitae adipiscing enim. In ut nulla est. Nullam in est urna. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. </p>

                </div>

                <div class="col-md-6">
                  <div class="formy well">
                     <h4 class="title">Register for New Account</h4>
                                  <div class="form">
                                      <!-- Register form (not working)-->
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                                          <!-- Name -->
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Full Name</label>

                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                        
                                          
                                          <!-- Buttons -->
                                          <div class="form-actions">
                                             <!-- Buttons -->
                                             <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-danger">Register</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                          </div>
                                      </form>
                                      <div class="clearfix"></div>
                                      <hr />
                                        <p>Already have an Account? <a href="{{ url('/login') }}">Login</a></p>
                                    </div> 
                                  </div>

                </div>
    </div>
  </div>
</div>

<!-- Page content ends -->
@endsection
