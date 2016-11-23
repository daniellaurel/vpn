@extends('layouts.mackart')
@section('content')
<!-- Page content starts -->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">

        <!-- Some content -->
                  <h3 class="title">Login to Smarty <span class="color">!!!</span></h3>
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


<!-- Login form -->
                <div class="col-md-6">
                  <div class="formy well">
                     <h4 class="title">Login to Your Account</h4>
                                  <div class="form">
                                       <!-- Login  form (not working)-->
                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}                                       
                                          <!-- Username -->
                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label col-md-3" for="username2">Username</label>
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
                                            <label class="control-label col-md-3" for="password2">Password</label>
                                            <div class="controls col-md-8">
                                              <input id="password" type="password" class="form-control" name="password">
                                              @if ($errors->has('password'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                              @endif
                                            </div>
                                          </div>
                                          <!-- Checkbox -->
                                          <div class="form-group">
                                             <div class="col-md-8 col-md-offset-3">
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineCheckbox3" name="remember"> Remember Password
                                                </label>
                                             </div>
                                          </div> 
                                          
                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
                                           <div class="col-md-8 col-md-offset-3">
                                            <button type="submit" class="btn btn-danger">Login</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                           </div>
                                          </div>
                                      </form>
                                  
                                      <hr />
                                      <h5>New Account</h5>
                                             Don't have an Account? <a href="{{ url('/register') }}">Register</a>
                                      <h5></h5>
                                             Forgot Your Password? <a href="{{ url('/password/reset') }}">Reset Password</a>

                                    </div> 
                                  </div>

                </div>
    </div>
  </div>
</div>
@endsection
<!-- Page content ends -->
