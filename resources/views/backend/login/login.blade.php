@extends('front/master/loginlayout')

@section('page_title' ,'login Page')

@section('login')

<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<a href="/"><img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo"></a>
	  </div>
	  <p class="login-card-description">Admin Login  {{session()->get('admin')['password']}} </p>
	  <form action="/adminlogin" method="post">
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
			<div class="alert alert-danger">
				<ul>
						<li>{{ session('msg') }} {{session('msg-forget')}} </li>
				</ul>
			</div>
		@endif
		@csrf
		  <div class="form-group">
			<label for="email" class="sr-only">Email</label>
			<input type="text" name="email"  class="form-control" placeholder="Email address">
		  </div>
		  <div class="form-group mb-4">
			<label for="password" class="sr-only">Password</label>
			<input type="password" name="password" class="form-control" placeholder="***********">
		  </div>
		  <button type="submit" class="btn btn-block login-btn mb-4">Login </button>
		</form>
		<a href="/forget-admin-password" class="forgot-password-link">Forgot password?</a>
	</div>
  </div>

@endsection