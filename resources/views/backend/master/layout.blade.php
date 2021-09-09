<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}" >

  <title>@yield('page_title')</title>

  <!-- Bootstrap core CSS -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="{{asset('front_asset/logo/fav.png')}} " type="image/png" sizes="16x16"> 
    <link rel="stylesheet" href="{{asset('front_asset/css/main.min.css')}} ">
    <link rel="stylesheet" href="{{asset('front_asset/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('front_asset/css/mystyle.css')}} ">
    <link rel="stylesheet" href="{{asset('front_asset/css/color.css')}} ">
    <link rel="stylesheet" href="{{asset('front_asset/css/responsive.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('front_asset/lightgallery/lightgallery.css')}} ">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">

</head>

<body onload="myFunction()">
    <div id="loading" style="background: #fff url({{asset('front_asset/images/logo/loader.gif')}}) no-repeat center center;	"></div>
 			<!---- mobile navbar ------>
             <div class="responsive-header">
                <div class="mh-head first Sticky">
                    <span class="mh-btns-left">
                        <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                    </span>
                    <span class="mh-text">
                        <a href="/AdminHome" title=""><img src="{{asset('front_asset/images/logo/logo.png')}}" width="80%" alt=""></a>
                    </span>
                </div>
                <div class="mh-head second">
                    <form action="{{route('search')}}" method="POST" class="mh-form">
                        @csrf
                        <input placeholder="search" value="{{ Route::currentRouteNamed('search') ? $search : '' }}" name="name" />
                        <button style="background: none" type="submit"  class="fa fa-search"></button>
                    </form>
                </div>
                <nav id="menu" class="res-menu">
                    <ul>
                        <li><a class="{{ Route::currentRouteNamed('adminhome') ? 'active' : '' }}" href="{{route('adminhome')}}" >Pending Post</a></li>
                        <li><a class="{{ Route::currentRouteNamed('adminuserlist') ? 'active' : '' }}" href="{{route('adminuserlist')}}" >User List</a></li>
                    </ul>
                </nav>
            </div>
                    <!---- mobile navbar ------>
        
                                            <!---- Topbar stick ------>
        
            <div class="topbar stick">
                <div class="logo">
                    <a title="" href="/"><img src="{{asset('front_asset/images/logo/logo2.png')}}" width="140px" alt=""></a>
                </div>
                
                <div class="top-area">
                    <ul class="main-menu">
                         <li>
                            <a class="{{ Route::currentRouteNamed('adminhome') ? 'active' : '' }}" href="{{route('adminhome')}}" >&nbsp;Pending Post</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('adminuserlist') ? 'active' : '' }}" href="{{route('adminuserlist')}} " >&nbsp;User</a>
                        </li>
                    </ul>
                    <ul class="setting-area" style="margin-top:15px">
                       @if (route('adminhome') == url('AdminHome'))
                       <li>
                            <a href="#" title="Home"><i class="ti-search" style="color: #088dcd"></i> Search Post</a>
                            <div class="searched">
                                <form action="{{route('search')}}" method="Post"  class="form-search">
                                    @csrf
                                    <input placeholder="Search Post" value="{{ Route::currentRouteNamed('search') ? $search : '' }}" name="name" style="color: #099dcd">
                                    <button type="submit" style="color: #088dcd">search</button>
                                </form>
                            </div>
                        </li>
                        @endif
                        @if (route('adminuserlist'))
                        <li>
                            <a href="#" title="Home"><i class="ti-search" style="color: #088dcd"></i></a>
                            <div class="searched">
                                <form action="{{route('search')}}" method="Post"  class="form-search">
                                    @csrf
                                    <input placeholder="Search User" value="{{ Route::currentRouteNamed('search') ? $search : '' }}" name="name" style="color: #099dcd">
                                    <button type="submit" style="color: #088dcd">search</button>
                                </form>
                            </div>
                        </li>
                        @endif
                    
                      
                    </ul>
                   @if (!session()->get('admin'))
                   <ul style="margin-top:17px">
                        <li>
                            <a href="/login"><i class="ti-power-off"></i>Login</a>
                        </li>
                    </ul>
                    @else
                    <div class="user-img">
                       <img class="avatar-img" src="{{asset('/front_asset/images/logo/fav.jpg')}}" width="50" alt="">
                        <span class="status f-online"></span>
                       
                        <div class="user-setting">
                           @if(session()->get('admin'))
                           <a href="/adminlogout" title=""><i class="ti-power-off"></i>log out</a>
                           @endif
                        </div>
                    </div>
                   @endif
                </div>
            </div>
                <!---- /Topbar stick ------>
  @section('post')
  @show


  <hr>
  <!-- Footer -->
  




<script src="{{asset('front_asset/js/main.min.js')}}"></script>
<script src="{{asset('front_asset/js/script.js')}} "></script>

<script src="{{asset('front_asset/js/map-init.js')}} "></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>



<script>
       var preloader = document.getElementById("loading");

		function myFunction(){
			preloader.style.display = 'none';
		};
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</body>

</html>