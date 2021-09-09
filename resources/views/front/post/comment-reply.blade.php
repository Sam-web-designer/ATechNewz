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
								<div class="central-meta item">
									<div class="user-post">
										<p style="text-align: center; color:black">This comment is posted by this
											 <a style="color: cornflowerblue" onclick="clicklink()" href="{{route('postname',$post->postcomments['0']->id)}} ">post.</a></p>
										<hr>
                                        <div class="coment-area">
                                            <ul class="we-comet">
												<ul class="we-comet">
													<li>
                                                        <div class="comet-avatar">
															@if (session()->get('user')['avatar'] == 'default.png')
																<img src="{{asset('front_asset/images/default.png')}}" alt="">
															@else
																<img class="avatar-img" src="{{asset('/storage/userimage/'.$post->user->avatar)}}" alt="" width="50">
															@endif
                                                        </div>
                                                        <div class="we-comment">
                                                            <div class="coment-head">
                                                                <h5><a onclick="clicklink()" href="time-line.html" title="">{{$post->user->name}} </a></h5>
                                                                <span>{{$post->created_at->diffForHumans() }}</span>
                                                            </div>
                                                            <p class="open-user-comment">
																@php
																$yourTextWithLinks = $post->comment;
																$text = strip_tags($yourTextWithLinks);
																$textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank" rel="nofollow">$1</a>', $text);
																echo  $textWithLinks;
																@endphp
															</p>
														</div>
														<hr>
                                                        <ul>
															<ul id="replycomment">
																@if (count($post->replycomments) > 0)										
																	<li >
																		@include('front.post.reply-comment')
																	</li>
																@else
																	<li>
																		<h5 class="p-3" >No comments</h5>
																	</li>	
																@endif
																
															</ul>
                                                        </ul>
                                                    </li>
												</ul>
														
												<li class="post-comment">
													@if (session()->get('user')['avatar'] == 'default')
														<div class="comet-avatar">
															<img src="{{asset('front_asset/images/'.session()->get('user')['avatar'])}}" alt="">
														</div>
													@else
														<div class="comet-avatar">
															<img src="{{asset('storage/userimage/'.session()->get('user')['avatar'])}}" alt="">
														</div>
													@endif
													<div class="post-comt-box">
                                                    <form class="add-comment"  >
																@csrf
															{{-- <input type="hidden" class="id" name="id" value="{{$post->id}}" > --}}
															<textarea placeholder="Post your comment" name="comment" class="comment" id="comment"></textarea>
															<div class="sumit">
															<button type="button" data-post="{{$post->id}} " id="save-comment"><i class="fa fa-comment" aria-hidden="true"></i></button>
															</div>
														</form>	
													</div>
												</li>
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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="{{asset('front_asset/js/myscript.js')}} "></script>
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
					url:"{{ route('replys-comment') }}",
					type:"post",
					dataType:'json',
					data:{
						// id:_id,
						comment:_comment,
						post:_post,
						_token:"{{ csrf_token() }}"
					},
					beforeSend:function(){
						vm.text('Saving...').addClass('disabled');
					},
					success:function(res){
						if(res.bool==true){
							fecth_reply_comments();
							$('#comment').val('');							
						}
						vm.text('Save').removeClass('disabled');
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
						$('#replycomment').html(data);
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
				$("body").on("click","#deletecomment",function(e){

				e.preventDefault();
				var id = $(this).data("id");
				// var id = $(this).attr('data-id');
				var token = $("meta[name='csrf-token']").attr("content");
				var url = e.target;

				$.ajax(
					{
						url: '{{ url('reply-comment') }}' + '/' + id, //or you can use url: "company/"+id,
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
							$('#replycomment').html(data);
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