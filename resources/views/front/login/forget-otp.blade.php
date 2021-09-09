@extends('front/master/loginlayout')

@section('page_title' ,'Otp ')

@section('login')

<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<a href="/"><img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo"></a>
	  </div>
	  <p class="login-card-description">Your chack someone's email</p>
	  <form action="forget-password" method="post">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@csrf
		  <div class="form-group">
			<label for="email" class="sr-only">Enter your otp</label>
			<input type="text" name="email_token"  class="form-control" placeholder="Enter your otp" required>
		  </div>
		  <button type="submit" class="btn btn-block login-btn mb-4">OTP Verify</button>
		</form>
		</nav>
	</div>
  </div>


@endsection