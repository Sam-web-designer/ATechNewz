@extends('front/master/layout')

@section('page_title' ,'ATechNewz | Home')
<style>
	.post-follow-btn a{
		background: #088dcd;
		margin: 9px;
		margin-bottom: 20px;
		padding: 8px 12px;
		outline: none;
		border-radius: 20px;
	}
	.post-follow-btn .active{
		background: none;
		border: 2px solid #088dcd;
		color: #088dcd;
	}
</style>
@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					
					<div class="col-lg-12">
						<div class="d-flex justify-content-center" style="background: none;border:none; align-items:center;">
							<div class="post-follow-btn " style="text-align: center">
								<span class="pendingpost"><a onclick="clicklink()"  class="active" href="/">All Post</a>
									<a style="color: white;" onclick="clicklink()" href="/follower" >Follow</a></span>
							</div>
						</div>
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-6 ">
								<div class="" style="background: none;border:none">
									<div class="post-follow-btn mb-5" style="text-align: center">
										
									</div>
								</div>
								<div class="central-meta">
									<div class="new-postbox">
										<figure>
											@if (session()->get('user'))
												@if (session()->get('user')['avatar'] == 'default.png')
													<div id="image-user">
														<img class="avatar-img" src="{{asset('front_asset/images/default.png')}}" width="50">
													</div>
												@else
												<div id="image-user">
													<img class="avatar-img" src="{{asset('/storage/userimage/'.session()->get('user')['avatar'])}}" width="50">
												</div>
												@endif
											@else
											<img src="{{asset('front_asset/images/default.png')}}" alt="">
											@endif
										</figure>
										<a onclick="clicklink()" href="/postview">
											<div class="newpst-input">
												<form method="post">
													<textarea rows="2" placeholder="write something" disabled></textarea>
													<div class="attachments">
														<ul>
															<li>
																<i class="fa fa-image"></i>
																<label class="fileContainer">
																	<input disabled type="file">
																</label>
															</li>
															<li>
																<button disabled type="submit">Post</button>
															</li>
														</ul>
													</div>
												</form>
											</div>
										</div>
										</a>
								</div><!-- add post new box -->
								<div id="like-user-index">
									@include('front.index-post')
								</div>
							</div><!-- sidebar -->	
					</div>
				</div>
			</div>
		</div>	
	</section>
@endsection