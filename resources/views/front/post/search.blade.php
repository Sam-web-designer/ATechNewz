@extends('front/master/layout')

@section('page_title' ,'AtechZ | Search')

@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-6 ">
								@if (count($post) == 0)
                                        <div class="alert " style="text-align: center; color:#4bb5ef" role="alert">
                                            <span><i class="fa fa-search"></i>&nbsp;{{$search}} is not found</span>
                                        </div>
                                @else
                                    <div class="alert " style="text-align: center; color:#4bb5ef" role="alert">
                                        <span><i class="fa fa-search"></i>&nbsp;{{$search}} is got it </span>
                                    </div>
                                @endif
								@if (count($post) >10)
                                <div class="loadMore">
                                @endif
								@foreach ($post->sortBydesc('created_at') as $item)
								
								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure>
												@if ($item->user->avatar  == 'default.png')
													<div id="image-user">
														<img class="avatar-img" src="{{asset('/front_asset/images/'.$item->user->avatar)}}" alt="" width="40">
													</div>
												@else
													<div id="image-user">
														<img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" alt="" width="40">
													</div>
												@endif
											</figure>
											<div class="friend-name">
												<ins><a href="" title="">{{$item->user->name}} 
												        @if($item->user->role_id == 'yes' )
                        									<span><i style="color:#007bff" class="fas fa-check-circle"></i></span>
                        								@endif
												</a></ins>
												<span>{{$item->created_at->diffForHumans() }}</span>
											</div>
											<a href="{{route('postname',$item->id)}} ">
											<div class="post-meta">
												<a href="{{route('postname',$item->id)}} ">
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
    												@php
                                                        $data = App\Models\Imagepost::where(['post_id'=>$item->id])->first();
                                                    @endphp
                                                    @if (count($item->images) > 0)
                                                    <img src="{{asset('/storage/post/image/'.$data['image'])}}" alt="">
                                                        <div class="d-flex justify-content-center text-center">
                                                            <p style="color: #4bb5ef">See more image ({{count($item->images) - 1 }}) </p>
                                                        </div>
                                                    @endif
												</a>
												<div class="we-video-info">
													<ul>
														<a href="{{route('postname',$item->id)}} ">
															<li>
																<span class="comment" data-toggle="tooltip" title="Comments">
																	<i class="far fa-comment"></i>
																	<ins>{{count($item->comments)}}</ins>
																</span>
															</li>
														</a>
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