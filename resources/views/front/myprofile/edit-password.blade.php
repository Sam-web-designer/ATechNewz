@extends('front/master/profile')

@section('page_title' ,'AtechZ')

@section('post')
<section class=" d-flex align-content-center justify-content-center">
    <div class="gap gray-bg">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-center" id="page-contents">
                        <!-- sidebar -->
                        <div class="col-lg-6" id="replypost">
                            @if (session('msg'))
                                <div class="alert  alert-success">
                                    <ul>
                                            <li>{{ session('msg') }} {{session('msg-forget')}} </li>
                                    </ul>
                                </div>
                            @endif
                            <div class="central-meta">
                                <div class="editing-info">
                                    <h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>
                                    
                                    <form action="/user-new-pass" method="post">
                                        @csrf
                                        <div class="form-group">	
                                          <input type="password" id="password" required/>
                                          <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">	
                                          <input type="password"  name="pass" id="confirm_password" required/>
                                          <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="submit-btns">
                                            <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                            <button type="submit" class="mtr-btn"><span>Update</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- sidebar -->	
                </div>
            </div>
        </div>
    </div>	
</section>

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