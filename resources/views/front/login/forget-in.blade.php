@extends('front/master/loginlayout')

@section('page_title' ,'New password')

@section('login')

<div class="col-md-7">
	<div class="card-body">
	  <div class="brand-wrapper">
		<a href="/"><img src="{{asset('front_asset/logo/logo.png')}}" alt="logo" class="logo"></a>
	  </div>
	  <p class="login-card-description"> <span style="color: #">{{$user->name}}</span> Apply your new password</p>
    <form action="{{ route('password-reset', $user->email_token) }}" method="post">
		@csrf
		<div class="form-group">
			<label for="email" class="sr-only">New Password</label>
			<input type="text" id="password" class="form-control" placeholder="Enter your new password" required>
		  </div>	
		  <div class="form-group">
			<label for="email" class="sr-only">New Password</label>
			<input type="password" name="pass" id="confirm_password" class="form-control" placeholder="Confirm password" required>
		  </div>
		  <button type="submit" class="btn btn-block login-btn mb-4">Set new password</button>
		</form>
	</div>
  </div>

  <script>
		var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords Don't Match");
	} else {
		confirm_password.setCustomValidity('');
	}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	</script>
@endsection