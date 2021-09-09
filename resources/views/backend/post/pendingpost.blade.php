@extends('backend/master/layout')

@section('page_title' ,'Atechnewz post')



@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-6 ">
								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure>
												@if ($post->user->avatar  == 'default.png')
													<div id="image-user">
														<img class="avatar-img" src="{{asset('/front_asset/images/'.$post->user->avatar)}}" width="40">
													</div>
												@else
													<div id="image-user">
														<img class="avatar-img" src="{{asset('/storage/userimage/'.$post->user->avatar)}}" width="40">
													</div>
												@endif
											</figure>
											<div class="friend-name">
												<ins><a href="{{route('user',$post->user->name)}}">{{$post->user->name}}</a></ins>
                                            <span>{{$post->created_at->diffForHumans() }}</span>
											</div>
											<div class="post-meta">
												<div class="description">
													<p>
													{!! nl2br(e($post->name)) !!}
													</p>
												</div>
												@include('front.post.openimage')
												@foreach ($post->videos as $video)
												<iframe src="{{asset('/storage/post/video/'.$video->video)}}" height="auto" controls  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
												@endforeach
												
												<div class="we-video-info">
													<ul>
														
													</ul>
												</div>
												
											</div>
										</div>
										<hr>
                                        <div class="coment-area">
                                            <ul class="we-comet"  >
												<ul class="we-comet" id="comments1" >
												</ul>
														
												
                                            </ul>
                                        </div>
									</div>
								</div>
								
							</div><!-- sidebar -->	
					</div>
				</div>
			</div>
		</div>	
	</section>
		
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script> --}}
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	
@endsection