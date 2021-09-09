@extends('front/master/loginlayout')

@section('page_title' ,'Forget Password')

@section('login')

<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo">
	  </div>
	  <p class="login-card-description">Sign into your account</p>
	  <form action="/forget_password" method="post">
        @if (session('msg'))
        <div class="alert alert-danger">
            <ul>
                    <li>{{ session('msg') }}</li>
            </ul>
        </div>
    @endif
		@csrf
		  <div class="form-group">
			<label for="email" class="sr-only">Email</label>
			<input type="text" name="email"  class="form-control" placeholder="Email address">
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



{{-- <div class="login100-pic js-tilt" style="margin-top: 100px" data-tilt>
	<img src="{{asset('front_asset/logo	/logo2.png')}}" class="mt-5" alt="IMG">
</div>
						<div class="login">
							<form action="/login" method="POST" class="login100-form validate-form  ">
								@csrf
								<span class="login100-form-title ">
									 Login
								</span>
																
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<div style="text-align: center; background:#797979; border-radius:10px; margin-bottom:15px; color:white" >
								<ul>
								<li>{{session('verify')}}</li>
								</ul>
							</div>
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" name="email" placeholder="Email">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</span>
								</div>
			
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="pass" placeholder="Password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>
								
								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn">
										Login
									</button>
								</div>
			
								<div class="text-center p-t-12">
									<span class="txt1">
										Forgot
									</span>
									<a class="txt2" href="#">
										Username / Password?
									</a>
								</div>
			
								<div class="text-center p-t-30">
									<a class="txt2" href="/register">
										Create your Account
										<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
									</a>
								</div>
							</form>
						</div>
				 --}}
@endsection