@extends('front/master/loginlayout')

@section('page_title' ,'Otp Worng')

@section('login')

<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<a href="/"><img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo"></a>
	  </div>
		@if (session('msg'))
        <div class="alert alert-danger">
            <ul>
                    <li>{{ session('chack_mail') }}</li>
            </ul>
        </div>
    	@endif
		@csrf
		  <div class="form-group">
			<h3 style="text-align:center">Please enter Valid OTP.</h3>
		  </div>
		<p class="login-card-footer-text"><a href="/register" class="text-reset"></a></p>
		<nav class="login-card-footer-nav">
			<a href="/Terms">Terms of use.</a>
			<a href="/privacypolicy">Privacy policy</a>
		  </nav>
	</div>
  </div>


@endsection