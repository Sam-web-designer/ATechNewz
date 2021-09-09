@extends('front/master/loginlayout')

@section('page_title' ,'Otp ')

@section('login')

<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<a href="/"><img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo"></a>
	  </div>
	  <p class="login-card-description">Sign into your account</p>
	  <form action="forget-password" method="post">
		@if (session('msg'))
        <div class="alert alert-danger">
            <ul>
                    <li>{{ session('chack_mail') }}</li>
            </ul>
        </div>
    	@endif
		@csrf
		  <div class="form-group">
			<label for="email" class="sr-only">Enter your otp</label>
			<input type="text" name="email_token"  class="form-control" placeholder="Enter your otp">
		  </div>
		  <button type="submit" class="btn btn-block login-btn mb-4">Login </button>
		</form>
		<p class="login-card-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p>
		<nav class="login-card-footer-nav">
		  <a href="#!">Terms of use.</a>
		  <a href="#!">Privacy policy</a>
		</nav>
	</div>
  </div>


@endsection