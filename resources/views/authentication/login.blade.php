@extends('layouts.default')
@section('content')
{{-- register form row --}}
<div class="row">
  <div class="col-sm-12 col-md-6 col-md-offset-3 login-block">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Login
      </div>
      <div class="panel-body">
        <div class="panel-body">
          <form action="/login" method="POST">
            {{csrf_field()}}

            @if(session('credentialsIssue'))
            <div class="alert alert-danger">
              {{ session('credentialsIssue') }}
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
              </div>
            </div>

            <a href="/forgot-password">Forgot your password?</a>

            <div class="social-auth form-group">
              <a href="/auth/facebook/" class="btn btn-block btn-facebook facebook-btn">
                <span class="fa fa-facebook facebook"></span>
                Sign in with Facebook
              </a>
              <a href="/auth/google/" class="btn btn-block btn-google google-btn">
                <span class="fa fa-google google"></span>
                Sign in with Google 
              </a>
              <a href="/auth/twitter/" class="btn btn-block btn-twitter twitter-btn">
                <span class="fa fa-twitter twitter"></span>
                Sign in with Twitter
              </a>
            </div>

            <div class="form-group">
              <input type="submit" value="Login" class="btn btn-success pull-right">
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@stop
