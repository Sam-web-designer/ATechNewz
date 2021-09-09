@extends('front/master/layout')

@section('page_title','ATechNewz | About US')

@section('post')
        <div class="ext-gap bluesh high-opacity">
            <div class="content-bg-wrap"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-banner">
                            <h1>About Us</h1>
                            <nav class="breadcrumb">
                            <a class="breadcrumb-item" href="/">Home</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="gap100 no-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-winku">
                                <h4>Welcome to AtechNewz</h4>
                                <span>This Site Is Only For Tech, every one can Post about tech in our Site
                                    and Our ATechNewz Team also Post about the computers, the Internet, science, social media, gadgets and more. <br/> Technology is our core Area Of Writing</span>
                                    <br/>
                                    - ATechNewz Team
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <figure class="about-picture">
                                <img class="pr-3" src="{{asset('front_asset/logo/coverimage.png')}} " alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                               <!-- team -->
        <section id="team" class="team" align="center">
            <div class="container text-center" style="align-item: center">
                <div class="team-title">
                    <h1>TEAM</h1>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3 p-3 ">
                        <div class="card">
                            <div class="memebr team-box">
                                <img src="{{asset('front_asset/team/shahruk.jpg')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://instagram.com/bhaijaan_shahrukh_?igshid=16c3zkkmo62ww"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/profile.php?id=100006579732292"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="team-img-title">
                                    <h2>Shahrukh Khan</h2>
                                    <p>Co-Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-3">
                        <div class="card">
                            <div class="memebr team-box">
                                <img src="{{asset('front_asset/team/sameer.jpg')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://instagram.com/x_sam__xx?igshid=qm6bc5xqdrhv"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/profile.php?id=100010339155035"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="team-img-title">
                                    <h2>Sameer Ali</h2>
                                    <p>Co-Founder & Web Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                             <!-- contact -->

        <section id="contact" class="contact">
            <div class="container mt-3">
                <div class="contact-title text-center">
                    <h1>CONTACT</h1>
                </div>
                <div class="row ">
                    <div class="col-md-12 d-flex justify-content-center">
                        <a  href="mailto:atechnewz@gmail.com"><i class="far fa-envelope"></i></a>
                        <a href="https://facebook.com/Atechnewz"><i class="fab fa-twitter"></i></a>
                        <a href="https://facebook.com/Atechnewz"><i class="fab fa-facebook-f"></i></a>
                        <a href="http://t.me/ATechNewz"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>
            </div>
        </section>
                            <!-- footer -->
        <footer class="footer-about">
            <div class="container text-center">
                <div class="row d-flex justify-content-center"> 
                    <div id="left" class="order-2 order-md-1 text-center">
                    <P>© Copyright <strong>ATechNewz.</strong> All Rights Reserved </P>
                    <p>Designed by<a href="https://www.facebook.com/profile.php?id=100010339155035"> Sameer</a></p>
                    </div>
                </div>
            </div>
        </footer>
@endsection