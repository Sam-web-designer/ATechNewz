@extends('front/master/layout')

@section('page_title' ,'Atechnewz | Post ')

<style>
	
</style>

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
														<img class="avatar-img" src="{{asset('/front_asset/images/'.$post->user->avatar)}}" alt="" width="40">
													</div>
												@else
													<div id="image-user">
														<img class="avatar-img" src="{{asset('/storage/userimage/'.$post->user->avatar)}}" alt="" width="40">
													</div>
												@endif
											</figure>
											<div class="friend-name">
												<ins style="background: none;"><a onclick="clicklink()" href="{{route('user',$post->user->name)}}">{{$post->user->name}}</a></ins>
                                            <span>{{$post->created_at->diffForHumans() }}</span>
											</div>
											<div class="post-meta">
												<div class="description">
													
													<p>
													@php
														$yourTextWithLinks = $post->name;
														$text = strip_tags($yourTextWithLinks);
														$textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank"  style="color:#4bb5ef" target="_blank" rel="nofollow">$1</a>', $text);
														echo  nl2br($textWithLinks);
													@endphp
													</p>
												</div>
												@include('front.post.openimage')
												
												<div class="we-video-info">
													<ul>
														@if (session()->get('user'))
															<li id="like-system-user">
																@include('front.post.like-unlike')
															</li>
														@else 
															<li id="likeuser">
																<span>
																	<a style="background: none; color:black" type="button" href="#modal-center" uk-toggle><i class="ti-heart "></i></a>
																	<ins class="ml-3">{{count($post->likes)}}</ins>
																</span>
															</li>
														@endif
														
														<li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="far fa-comment"></i>
																<ins>{{count($post->comments)}}</ins>
															</span>
														</li>
													</ul>
												</div>
												
											</div>
										</div>
										<hr>
                                        <div class="coment-area">
                                            <ul class="we-comet"  >
												<li class="post-comment">
													@if (session()->get('user'))
														@if (session()->get('user')['avatar'] == 'default')
															<div class="comet-avatar">
																<img src="{{asset('front_asset/images/'.session()->get('user')['avatar'])}}" alt="">
															</div>
														@else
															<div class="comet-avatar">
																<img src="{{asset('storage/userimage/'.session()->get('user')['avatar'])}}" alt="">
															</div>
														@endif
													@else
														<div class="comet-avatar">
															<img src="{{asset('front_asset/images/default.png')}}" alt="">
														</div>
													@endif
													<div class="post-comt-box">
                                                    <form class="add-comment"  >
																@csrf
															{{-- <input type="hidden" class="id" name="id" value="{{$post->id}}" > --}}
															<textarea placeholder="Post your comment" name="comment" class="comment" id="comment" required></textarea>
															<div class="sumit">
															@if (session()->get('user')['id'])
															<button style="height: 70%" type="button" data-post="{{$post->id}} " id="save-comment"><i class="fa fa-comment" aria-hidden="true"></i></button>
															@else
															<button type="button" href="#modal-center" uk-toggle><i class="fa fa-comment" aria-hidden="true"></i></button>
															@endif
															</div>
														</form>	
													</div>
												</li>
												<ul class="we-comet" id="comments1" >
													<li >
														@include('front.post.comments')
													</li>
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
		

	

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		// Save Comment
		$(document).ready(function(){
			$("#save-comment").on('click',function(e){
				// console.log($("#comment").val());
				// var _id=$(".id").val();
				var _comment=$("#comment").val();
				var _post=$(this).data('post');
				var vm=$(this);
			
				$.ajax({
					url:"{{ route('save-comment') }}",
					type:"post",
					dataType:'json',
					data:{
						// id:_id,
						comment:_comment,
						post:_post,
						_token:"{{ csrf_token() }}"
					},
					beforeSend:function(){
						vm.text('Commenting...').addClass('disabled');
					},
					success:function(res){
						if(res.bool==true){
							fecth_reply_comments();
							$('#comment').val('');							
						}
						vm.text('commented').removeClass('disabled');
					} 
				});
			return false;
			});
			function fecth_reply_comments(){
				$.ajax({
					url: window.location.href,
					beforeSend: function() {
						$('[rel="tooltip"]').tooltip('dispose');
						$('.spinner').show();
					},
					success: function(data) {
						$('#comments1').html(data);
					},
					error: function() {
						$('.spinner').hide();
						$('#table_data').html('<h2> Something went wrong  Relod Page</h2>');
					}
				});
			}
  		});
	</script>
	<script>
			$(document).ready(function () {
			$("body").on("click","#deleteCompany",function(e){

			e.preventDefault();
			var id = $(this).data("id");
			// var id = $(this).attr('data-id');
			var token = $("meta[name='csrf-token']").attr("content");
			var url = e.target;

			$.ajax(
				{
					url: '{{ url('comment') }}' + '/' + id, //or you can use url: "company/"+id,
					type: 'get',
					data: {
					_token: token,
						id: id
				},
				success: function (response){
					$("#success").html(response.message)

					Swal.fire(
						'Delete!',
						'Your comment deleted successfully!',
						'success'
					);
					fecth_reply_comments();
				},
				error:function(){
					console.log('error');
				}
				});
				return false;
			});
			function fecth_reply_comments(){
							$.ajax({
								url: window.location.href,
								beforeSend: function() {
									$('[rel="tooltip"]').tooltip('dispose');
									$('.spinner').show();
								},
								success: function(data) {
									$('#comments1').html(data);
								},
								error: function() {
									$('.spinner').hide();
									$('#table_data').html('<h2> Something went wrong  Relod Page</h2>');
								}
							});
						}

			});
	</script>
	
@endsection