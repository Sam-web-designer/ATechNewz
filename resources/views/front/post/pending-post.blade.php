@extends('front/master/layout')

@section('page_title' ,'AtechZ')
<style>
	.pendingpost{
        background-color: #4bb5ef;
        padding: 10px 30px;
        color: #fff;
        border-radius: 20px;
    }
</style>
@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="" style="background: none;border:none">
							<div class="post-follow-btn mb-5" style="text-align: center">
								<span class="pendingpost">Your Pending Post</span>
							</div>
						</div>
						<div class="row d-flex justify-content-center" id="page-contents">
							
							<!-- sidebar -->
							<div class="col-lg-6 ">
                               
									@foreach ($post->sortBydesc('create_at') as $item)
								{{-- <h1>{{$item->count('user_id')}}</h1> --}}
								
								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure >
												<div id="image-user">
													<img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" width="40">
												</div>
											</figure>
											
											
											<div class="friend-name pl-3">
												<ins><a >{{$item->user->name}}</ins></a>
												<span>{{$item->created_at->diffForHumans()}} Pending Post</span>
											</div>
											<div class="post-meta">
													<div class="description">
														<p id="index-text">
															@php
																$yourTextWithLinks = $item->name;
																$text = strip_tags($yourTextWithLinks);
																$textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank" rel="nofollow">$1</a>', $text);
																echo  \Illuminate\Support\Str::words(nl2br($textWithLinks), 65,'See More');
															@endphp
														</p>
													</div>
													@foreach ($item->images as $file)
													
													<img src="{{asset('/storage/post/image/'.$file->image)}}" alt="">
													@endforeach
												<div class="we-video-info">
													
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