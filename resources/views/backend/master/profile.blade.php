
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    
      <title>AtechnewZ | My Profile</title>
    
      <!-- Bootstrap core CSS -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="icon" href="winku/images/fav.png" type="image/png" sizes="16x16"> 
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
            </style>
    
    
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
                        <a href="/" title=""><img src="{{asset('front_asset/images/logo/logo.png')}}" width="80%" alt=""></a>
                    </span>
                </div>
                <div class="mh-head second">
                    <form class="mh-form">
                        <input placeholder="search" />
                        <a href="#/" class="fa fa-search"></a>
                    </form>
                </div>
                <nav id="menu" class="res-menu">
                    <ul>
                        <li><a class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}" href="{{route('home')}}" ><i class="fas fa-home"></i>&nbsp;Home</a></li>
                        @if(session()->has('user'))
                        <li>
                            <a >Profile</a>
                            <ul>
                                <li><a class="{{ Route::currentRouteNamed('myprofile') ? 'active' : '' }}" href="{{route('myprofile')}}">My Profile</a></li>
                                <li><a href="timeline-friends.html" title="">Pending Post</a></li>
                                <li><a href="timeline-groups.html" title="">Reject Post</a></li>
                                <li><a class="{{ Route::currentRouteNamed('userforget') ? 'active' : '' }}" href="{{route('userforget')}}">Forget Password</a></li> 
                            </ul>
                        </li>
                        @endif
                        <li><a class="{{ Route::currentRouteNamed('mobile') ? 'active' : '' }}" href="{{route('mobile')}}"><i  class="fas fa-mobile-alt"></i>&nbsp;Mobile</a></li>
                        <li><a class="{{ Route::currentRouteNamed('computer') ? 'active' : '' }}" href="{{route('computer')}}"><i class="fas fa-laptop-code"></i>&nbsp;Computer & Laptop</a></li>
                        <li><a class="{{ Route::currentRouteNamed('tv') ? 'active' : '' }}" href="{{route('tv')}}"><i class="fas fa-tv"></i>&nbsp;Tv</a></li>
                        <li><a class="{{ Route::currentRouteNamed('games') ? 'active' : '' }}" href="{{route('games')}}"><i class="fas fa-gamepad"></i>&nbsp;Games</a></li>
                        <li><a class="{{ Route::currentRouteNamed('accessories') ? 'active' : '' }}" href="{{route('accessories')}}"><i class="fas fa-box-open"></i> &nbsp;All Accessories&nbsp;All Accessories</a></li>
                        @if(session()->has('user'))
                        <li><a href="/logout" title="">Logout</a></li>
                        @else
                        <li><a href="/login" title="">Login</a></li>
                        @endif
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
                        <a class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}" href="{{route('home')}}" ><i class="fas fa-home"></i>&nbsp;Home</a>
                        </li>
                        
                        <li>
                            <a class="{{ Route::currentRouteNamed('mobile') ? 'active' : '' }}" href="{{route('mobile')}}" ><i  class="fas fa-mobile-alt"></i>&nbsp;Mobile</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('computer') ? 'active' : '' }}" href="{{route('computer')}}"><i class="fas fa-laptop-code"></i>&nbsp;Computer & Laptop  </a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('tv') ? 'active' : '' }}" href="{{route('tv')}}"  ><i class="fas fa-tv"></i>&nbsp;Tv</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('games') ? 'active' : '' }}" href="{{route('games')}}"  ><i class="fas fa-gamepad"></i>&nbsp;Games</a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteNamed('accessories') ? 'active' : '' }}" href="{{route('accessories')}}"><i class="fas fa-box-open"></i> &nbsp;All Accessories</a>
                        </li>
                    </ul>
                    <ul class="setting-area" style="margin-top:15px">
                        <li>
                            <a href="#" title="Home" data-ripple=""><i class="ti-search" style="color: #088dcd"></i></a>
                            <div class="searched">
                                <form method="post" class="form-search">
                                    <input type="text" placeholder="Search Post" style="color: #099dcd">
                                    <button style="color: #088dcd" data-ripple><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </li>
                    
                    </ul>
                @if (!session()->get('user'))
                <ul style="margin-top:17px">
                    <li>
                        <a href="/login"><i class="ti-power-off"></i>Login</a>
                    </li>
                </ul>
                @endif
                    {{-- @if(session()->get('user'))
                        
                        @else
                        
                        @endif --}}
                    @if(session()->get('user'))
                    <div class="user-img">
                        
                        <img class="avatar-img" src="{{asset('/storage/userimage/'.session()->get('user')['avatar'])}}" width="50" alt="">
                        <span class="status f-online"></span>
                    
                        <div class="user-setting">
                            <a href="/profile" title=""><i class="ti-user"></i> View profile</a>
                            <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                            <a href="#" title=""><i class="ti-target"></i>Pending Post</a>
                            <a href="#" title=""><i class="ti-settings"></i>Reject Post</a>
                        @if(session()->get('user'))
                        <a href="/logout" title=""><i class="ti-power-off"></i>log out</a>
                        @else
                        <a href="/login" title=""><i class="ti-power-off"></i>Login</a>
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
                                                <img src="{{asset('/storage/userimage/'.session()->get('user')['avatar'])}}" alt="">
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
                                                <li class="admin-name">
                                                  <h6>{{session()->get('user')['name']}} @if (session()->get('user')['role_id'] == 'yes' )
                                                      <span>bhai</span>
                                                  @endif </h6>
                                                  <p>{{session()->get('user')['email']}} </p>
                                                </li>
                                                <li>
                                                    <a class="{{ Route::currentRouteNamed('myprofile') ? 'active' : '' }}" href="{{route('myprofile')}}" >Time Line</a>
                                                    <a class="{{ Route::currentRouteNamed('myfollowing') ? 'active' : '' }}"  href="{{route('myfollowing')}} "> Following</a>
                                                    <a class="{{ Route::currentRouteNamed('your-follow') ? 'active' : '' }}"  href="{{route('your-follow')}} ">Follow</a>
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
           var preloader = document.getElementById("loading");
            function myFunction(){
                preloader.style.display = 'none';
            };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <script>
        $('.ti-heart').click(function () {
            if(meta_data.data('user') == 0){
                toastr.error('Login First');
                return;
            }
            var elem = $(this).parents('.card');
            var data = {};
            data.post_id = elem.data('post');
            $.ajax({
                url : 'like',
                data,
                success : function (data) {
                    elem.find('.ti-heart').text(data.likes);
                    if(elem.find('.ti-heart').hasClass('redHeart')){
                        elem.find('.ti-heart').removeClass('redHeart');
                    }else{
                        elem.find('.ti-heart').addClass('redHeart');
                    }
                }
            });
        });
    </script>  
    </body>
    
    </html>