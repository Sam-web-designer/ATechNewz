<!DOCTYPE html>
<html lang="en">
<head>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-NVWN635WVN"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-NVWN635WVN');
    </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('page_title')</title>
  <link rel="icon" href="{{asset('front_asset/logo/fav.png')}} " type="image/png" sizes="16x16"> 
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('front_asset/login/assets/css/login.css')}}">
    {{-- <style>
        #loading{
        position: fixed;
        width: 100%;
        height: 100vh;
        z-index: 99999;
      }
    </style> --}}

</head>
<body>
  <div id="loading" style="background: #fff url({{asset('front_asset/images/logo/loader.gif')}}) no-repeat center center ;	"></div>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{asset('front_asset/logo/logo.jpg')}}" alt="login" class="login-card-img">
          </div>
		  @section('login')
                            
		  @show
        </div>
      </div>
    
    </div>
  </main>
  <script>
      var preloader = document.getElementById("loading");

      function myFunction(){
        preloader.style.display = 'none';
      };
  </script>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>