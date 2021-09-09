@extends('front/master/loginlayout')

@section('page_title' ,'Register page')

@section('login')
<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<a href="/"><img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo"></a>
	  </div>
	  <p class="login-card-description">Sign into your account</p>
	  <form action="/reg" method="POST">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (session('msg'))
			<div class="alert alert-success">
				<ul>
						<li>{{ session('msg') }}</li>
				</ul>
			</div>
		@endif
		@csrf
		  <div class="form-group">
			<label for="username" class="sr-only">Username</label>
			<input type="text" name="name"  class="form-control" placeholder="Enter Username">
		  </div>
		  <div class="form-group mb-4">
			<label for="Email" class="sr-only">Email</label>
			<input type="email" name="email" class="form-control" placeholder="Enter Email">
		  </div>
		  <div class="form-group mb-4">
			<label for="password" class="sr-only">Password</label>
			<input type="password" name="pass" class="form-control" placeholder="***********">
		  </div>
		  <div class="form-group mb-4">
			<input name="trams_policy" type="checkbox" value="agree" required>
			<label class="ml-3" >
				<p style="font-size:13px">I have read and agree to <br>
					<a href="/Terms">Terms of Use</a> & <a href="/privacypolicy">Privacy Policy</a></p>
			</label>
		  </div>
		  <button type="submit" class="btn btn-block login-btn mb-4">Create Account</button>
		</form>
		<a href="/forget-password" class="forgot-password-link">Forgot password?</a>
		<p class="login-card-footer-text">If have an account? <a href="/login" class="text-reset">Login</a></p>
		<nav class="login-card-footer-nav">
		  <a href="/Terms">Terms of use.</a>
		  <a href="/privacypolicy">Privacy policy</a>
		</nav>
	</div>
  </div>

				
@endsection