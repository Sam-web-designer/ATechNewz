
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" >
    
      <title>AtechnewZ | My Profile</title>
    
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
    
           
        <style>
            #loading{
                    position: fixed;
                    width: 100%;
                    height: 100vh;
                    
                    z-index: 99999;
            }
            .follow {
                    background-color: #088dcd;
                    padding: 0px 10px;
                    color: #fff;
            }
            .follow-link:hover{
                    color: white;
            }
            .item-id{
                    display: none;
            }
            .load{
               display: none;
                position: fixed;
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                z-index: 99999999999;
                background: rgba(0, 0, 0, 0.52);
                visibility: collapse;
            }
            .loader {
               margin-top: 50vh;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 90px;
                height: 90px;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
            }
        </style>
    
    
    </head>
    
    <body onload="myFunction()">
        <div class="load">
            <div class="loader d-flex justify-content-center"></div>
        </div>
        <div id="loading" style="background: #fff url({{asset('front_asset/images/logo/loader.gif')}}) no-repeat center center;	"></div>
 			<!---- mobile navbar ------>
             <div class="responsive-header" id="navbar_top" >
                <div class="mh-head ">
                    <span class="mh-btns-left">
                        <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                    </span>
                    <span class="mh-text">
                        <a href="/"  onclick="clicklink()"><img src="{{asset('front_asset/images/logo/logo.png')}}" width="80%" alt=""></a>
                    </span>
                </div>
                <div class="mh-head second">
                    <form action="{{route('search')}}" method="POST" class="mh-form">
                        @csrf
                        <input placeholder="search" value="{{ Route::currentRouteNamed('search') ? $search : '' }}" name="name" />
                        <button style="background: none" type="submit"  onclick="clicklink()"  class="fa fa-search"></button>
                    </form>
                </div>
                <nav id="menu" class="res-menu">
                    <ul>
                        <li><a class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}" href="{{route('home')}}"  onclick="clicklink()" ><i class="fas fa-home"></i>&nbsp;Home</a></li>
                        @if(session()->has('user'))
                        <li>
                            <a >Profile</a>
                            <ul>
                                <li><a class="{{ Route::currentRouteNamed('myprofile') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('myprofile')}}">My Profile</a></li>
                                <li><a href="timeline-friends.html" title="">Pending Post</a></li>
                                <li><a class="{{ Route::currentRouteNamed('userforget') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('userforget')}}">Change Password</a></li>
                            </ul>
                        </li>
                        @endif 
                        <li><a class="{{ Route::currentRouteNamed('mobile') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('mobile')}}"><i  class="fas fa-mobile-alt"></i>&nbsp;Mobile</a></li>
                        <li><a class="{{ Route::currentRouteNamed('computer') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('computer')}}"><i class="fas fa-laptop-code"></i>&nbsp;Computer & Laptop</a></li>
                        <li><a class="{{ Route::currentRouteNamed('tv') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('tv')}}"><i class="fas fa-tv"></i>&nbsp;Tv</a></li>
                        <li><a class="{{ Route::currentRouteNamed('games') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('games')}}"><i class="fas fa-gamepad"></i>&nbsp;Games</a></li>
                        <li><a class="{{ Route::currentRouteNamed('accessories') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('accessories')}}"><i class="fas fa-box-open"></i> &nbsp;All Accessories</a></li>
                        <li><a class="{{ Route::currentRouteNamed('suggestion') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('suggestion')}}"><i class="fab fa-ello"></i>&nbsp;Suggestion</a></li>
                        <li><a class="{{ Route::currentRouteNamed('about') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('about')}}">About-Us</a></li>
                        <li><a class="{{ Route::currentRouteNamed('terms') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('terms')}}">Terms Of Use</a></li>
                        <li><a class="{{ Route::currentRouteNamed('privacypolicy') ? 'active' : '' }}"  onclick="clicklink()" href="{{route('privacypolicy')}}">Privacy policy</a></li>
                        @if(session()->has('user'))
                        <li><a href="/logout" title="">Logout</a></li>
                        @else
                        <li><a href="/login"  onclick="clicklink()">Login</a></li>
                        <li><a href="/register"  onclick="clicklink()">Register</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
                    <!---- mobile navbar ------>
        
                                            <!---- Topbar stick ------>
        
            <div class="topbar stick">
                <div class="logo">
                    <a onclick="clicklink()" href="/"><img src="{{asset('front_asset/images/logo/logo2.png')}}" width="140px" alt=""></a>
                </div>
                
                <div class="top-area">
                    <ul class="main-menu">
                        <li>
                        <a class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}" onclick="clicklink()"  href="{{route('home')}}" ><i class="fas fa-home"></i>&nbsp;Home</a>
                        </li>
                        
                        <li>
                            <a class="{{ Route::currentRouteNamed('mobile') ? 'active' : '' }}" href="{{route('mobile')}}"  onclick="clicklink()"><i  class="fas fa-mobile-alt"></i>&nbsp;Mobile</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('computer') ? 'active' : '' }}" href="{{route('computer')}}"  onclick="clicklink()"><i class="fas fa-laptop-code"></i>&nbsp;Computer & Laptop  </a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('tv') ? 'active' : '' }}" href="{{route('tv')}}"  onclick="clicklink()" ><i class="fas fa-tv"></i>&nbsp;Tv</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('games') ? 'active' : '' }}" href="{{route('games')}}"  onclick="clicklink()" ><i class="fas fa-gamepad"></i>&nbsp;Games</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('accessories') ? 'active' : '' }}" href="{{route('accessories')}}"  onclick="clicklink()" ><i class="fas fa-box-open"></i> &nbsp;All Accessories</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('suggestion') ? 'active' : '' }}" href="{{route('suggestion')}}" onclick="clicklink()"><i class="fab fa-ello"></i> &nbsp;Suggestion</a>
                        </li>
                    </ul>
                    <ul class="setting-area" style="margin-top:0px">
                        <li>
                            <a href="#" title="Home"><i class="ti-search" style="color: #088dcd"></i></a>
                            <div class="searched">
                                <form action="{{route('search')}}" method="Post"  class="form-search">
                                    @csrf
                                    <input placeholder="Search Post" value="{{ Route::currentRouteNamed('search') ? $search : '' }}" name="name" style="color: #099dcd">
                                    <button type="submit"  onclick="clicklink()" style="color: #088dcd">search</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                   @if (!session()->get('user'))
                   <ul style="margin-top:0px">
                        <li>
                            <div class="user-img">
                                <a><i class="fas fa-chevron-circle-down"></i>&nbsp;Menu</a>
                                
                                 <div class="user-setting">
                                    <a href="/about-Us"  onclick="clicklink()">About Us</a>
                                    <a href="/Terms"  onclick="clicklink()">Terms of use</a>
                                    <a href="/privacypolicy"  onclick="clicklink()">Privacy policy</a>
                                    <a href="/login"  onclick="clicklink()"><i class="ti-power-off"></i>Login</a>
                                    <a href="/register" onclick="clicklink()"><i class="ti-power-off"></i>Register</a>
                                 </div>
                             </div>
                        </li>
                    </ul>
                    @else
                    <div class="user-img">
                       @if (session()->get('user')['avatar'] == 'default.png')
                       <img class="avatar-img" src="{{asset('/front_asset/images/default.png')}}" width="50" alt="">
                       @else
                       <img class="avatar-img" src="{{asset('/storage/userimage/'.session()->get('user')['avatar'])}}" width="60" alt="">
                       @endif
                        <span class="status f-online"></span>
                       
                        <div class="user-setting">
                        <a href="{{route('myprofile')}}"  onclick="clicklink()"><i class="ti-user"></i> View profile</a>
                            <a href="/pendingpost"  onclick="clicklink()"><i class="ti-target"></i>Pending Post</a>
                            <a href="{{route('userforget')}}"  onclick="clicklink()">Change Password</a>
                            <a href="/about-Us"  onclick="clicklink()">About Us</a>
                            <a href="/Terms"  onclick="clicklink()">Terms of use</a>
                            <a href="/privacypolicy"  onclick="clicklink()">Privacy policy</a>
                           @if(session()->get('user'))
                           <a href="/logout"  onclick="clicklink()"><i class="ti-power-off"></i>log out</a>
                           @else
                           <a href="/login" onclick="clicklink()"><i class="ti-power-off"></i>Login</a>
                           @endif
                        </div>
                    </div>
                   @endif
                </div>
            </div>
                <!---- /Topbar stick ------>
        <section>
            <div class="feature-photo">
                <figure><img src="{{asset('front_asset/logo/coverimage1.jpg')}}" alt=""></figure>
                
                <div class="container-fluid">
                    <div class="row merged">
                        <div class="col-lg-2 col-sm-3">
                            <div class="user-avatar">
                                <figure>
                                    @if (session()->get('user')['avatar'] == 'default.png')
                                        <img src="{{asset('front_asset/images/default.png')}}" alt="">
                                    @else
                                            <img src="{{asset('/storage/userimage/'.session()->get('user')['avatar'])}}" alt="">
                                    @endif
                                    
                                    <form action="{{route('avatar-change')}}" method="post"  class="edit-phto"  enctype="multipart/form-data">
                                        @csrf
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                            Edit Display Photo
                                            <input  type="file" name="avatar"  onchange="form.submit()"/>
                                        </label>
                                    </form>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="timeline-info">
                                <ul>
                                    <li class="admin-name mt-3">
                                        <h6 style="color: #088dcd;font-weight: 800;">{{session()->get('user')['name']}} @if (session()->get('user')['role_id'] == 'yes' )
                                            <span></span>
                                        @endif </h6>
                                        <p>{{session()->get('user')['email']}} </p>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteNamed('myprofile') ? 'active' : '' }}" onclick="clicklink()" href="{{route('myprofile')}}" >Time Line</a>
                                        <a class="{{ Route::currentRouteNamed('myfollowing') ? 'active' : '' }}" onclick="clicklink()"  href="{{route('myfollowing')}} "> Following</a>
                                        <a class="{{ Route::currentRouteNamed('your-follow') ? 'active' : '' }}" onclick="clicklink()" href="{{route('your-follow')}} ">Follow</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
        </section>
                            
                       
      @section('post')
      @show
   
    
      <hr>
      <!-- Footer -->

    
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('front_asset/js/main.min.js')}}"></script>
    <script src="{{asset('front_asset/js/script.js')}} "></script>
    <script src="{{asset('front_asset/js/map-init.js')}} "></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
    <!----------------loader--------->
    <script>
        if ($(window).width() < 992) {
            $(window).scroll(function(){  
                if ($(this).scrollTop() > 40) {
                    $('#navbar_top').addClass("fixed-top");
                    // add padding top to show content behind navbar
                    $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
                }else{
                    $('#navbar_top').removeClass("fixed-top");
                    // remove padding top from body
                    $('body').css('padding-top', '0');
                }   
            });
    } // end if
    </script>
     <script>
        function clicklink(){
                $('.load').css({
                    'background':' rgba(0, 0, 0, 0.52)',
                    'visibility':'visible',
                });
                $('nav').removeClass('res-menu mm-menu mm-offcanvas mm-opened');
                $('nav').css({
                    'display': 'none',
                });
    
        }
    </script>
    <script>
           var preloader = document.getElementById("loading");
            function myFunction(){
                preloader.style.display = 'none';
            };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    </body>
    
    </html>