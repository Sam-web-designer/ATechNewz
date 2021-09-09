@extends('backend/master/layout')

@section('page_title' ,'AtechNewz | AdminPanel')
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
			<div class="" style="background: none;border:none">
				<div class="post-follow-btn mb-5" style="text-align: center">
					<a style="color: white"> Pending post  {{count($post)}} </a>
				</div>
			</div>
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-6" id="replypost">
								
							@include('backend.post.include.postview')
								
							</div><!-- sidebar -->	
					</div>
				</div>
			</div>
		</div>	
	</section>
@endsection