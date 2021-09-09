@extends('front/master/layout')

@section('page_title' ,'AtechZ')
@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-6 ">
								<div class="central-meta" style="text-align: center">
									<i class="fas fa-tv"></i>&nbsp;TV
								</div><!-- add post new box -->
								@if (count($post) > 10 )
								<div class="loadMore">
								@endif
									@foreach ($post->sortBydesc('created_at') as $item)
								{{-- <h1>{{$item->count('user_id')}}</h1> --}}
								
								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure >
												<div id="image-user">
													<img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" width="50">
												</div>
											</figure>
											<div class="friend-name pl-3">
												<ins><a href="{{route('user',$item->user->name)}}">{{$item->user->name}}</ins></a>
												<span>{{$item->created_at->diffForHumans() }}</span>
											</div>
											<a href="{{route('postname',$item->id)}} ">
											<div class="post-meta">
												<div class="description">
													
													<p>
													{!! \Illuminate\Support\Str::words(nl2br(e($item->name)), 150,'....')  !!}
													</p>
												</div>

												{{-- @php
													$image = json_decode($item->image);
													
												@endphp --}}
												@foreach ($item->images as $file)
												
												<img src="{{asset('/storage/post/image/'.$file->image)}}" alt="">
												@endforeach

												@if (count($item->images) < 0 )
												@foreach ($item->videos as $video)
												<iframe src="{{asset('/storage/post/video/'.$video->video)}}" height="auto" controls  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
												@endforeach
												@endif
													{{-- <h1>{{$item->images->image}}</h1> --}}
												{{--  --}}
											</a>
												<div class="we-video-info">
													<ul>
														<li>
															<form action="/like" method="post">
																@csrf
																<span class="like" data-toggle="tooltip" title="like">
																<input type="hidden" name="post_id" value="{{$item->id}}">
																<button style="background: none; color:black" type="submit"><i class="ti-heart "></i></button>
																<ins class="ml-3">{{count($item->likes)}}</ins>
																</span>
															</form>
														</li>
														<li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="far fa-comment"></i>
																<ins>{{count($item->comments)}}</ins>
															</span>
														</li>
														@if (session()->get('user')['id'] == $item->user_id )
														<li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<ins>delete</ins>
															</span>
														</li>
														@endif
														<li class="social-media">
															<div class="menu">
															  <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
																</div>
															  </div>
																<div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
																</div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
																</div>
															  </div>

															</div>
														</li>
													</ul>
												</div>
												
											</div>
											
										</div>
									</div>
								</div>
							
								@endforeach
									</div><!-- friends list sidebar -->
								
							</div><!-- sidebar -->	
					</div>
				</div>
			</div>
		</div>	
	</section>
@endsection
