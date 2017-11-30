@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Login
                  </button>
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                  </a>
                </div>
                <div style="text-align:center; padding:1em">
                  <br><br>
                  <div class="btn-group">
                    <a class='btn btn-danger disabled'><i class="fa fa-google-plus" style="width:16px; height:20px"></i></a>
                    <a class='btn btn-danger' href='/auth/google' style="width:12em;"> Sign in with Google</a>
                  </div>
                  <br /><br />
                  <div class="btn-group">
                    <a class='btn btn-primary disabled'><i class="fa fa-facebook" style="width:16px; height:20px"></i></a>
                    <a class='btn btn-primary ' href='' style="width:12em"> Sign in with Facebook</a>
                  </div>
                  <br /><br />
                  <div class="btn-group">
                    <a class='btn btn-info disabled'><i class="fa fa-twitter" style="width:16px; height:20px"></i></a>
                    <a class='btn btn-info ' href='' style="width:12em"> Sign in with Twitter</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
