@extends('front/master/layout')

@section('page_title' ,'ATechNewz | Mobile')
<style>
</style>
@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="" style="background: none;border:none">
							<div class="post-follow-btn mb-5" style="text-align: center">
								<span class="pendingpost"><i  class="fas fa-mobile-alt"></i>&nbsp; Mobile</span>
							</div>
						</div>
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-6 ">
								@if (count($post) > 10 )
								<div class="loadMore">
								@endif
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