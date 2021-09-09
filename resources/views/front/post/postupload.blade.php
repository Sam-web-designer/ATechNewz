@extends('front/master/layout')

@section('page_title' ,'ATechNewz | Upload')

<style>
	input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
@section('post')
	<section class=" d-flex align-content-center justify-content-center">
		<div class="gap gray-bg">
			<div class="container-fluid d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-12">
						<div class="row d-flex justify-content-center" id="page-contents">
							<!-- sidebar -->
							<div class="col-lg-12 ">
								<div>
									<p id="limit-error" ></p>
								</div>
								<div class="central-meta">
									<div class="new-postbox">
										<figure>
											@if (session()->get('user')['avatar'] == 'default.png')
												<div id="image-user">
													<img class="avatar-img" src="{{asset('/front_asset/images/'.session()->get('user')['avatar'])}}" alt="" width="40">
												</div>
											@else
												<div id="image-user">
													<img class="avatar-img" src="{{asset('/storage/userimage/'.session()->get('user')['avatar'])}}" alt="" width="40">
												</div>
											@endif
										</figure>
											<div class="newpst-input">
												<form accept-charset="utf-8" action="/post-upload" id="submitpost" method="post" enctype="multipart/form-data">
													@csrf
													<ul class="unlist list-unstyled inline-flex d-inline-block">
														<li>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="Mobile" required>
																<label class="form-check-label" for="inlineRadio1">Mobile</label>
															  </div>
															  <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="Laptop&Computer" required>
																<label class="form-check-label" for="inlineRadio2">Computer & Laptop</label>
															  </div>
															  <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="Tv" required>
																<label class="form-check-label" for="inlineRadio2">Tv</label>
															  </div>
															  <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="games" required>
																<label class="form-check-label" for="inlineRadio2">Games</label>
															  </div>
															  <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="Accessories" required>
																<label class="form-check-label" for="inlineRadio2">All Accessories</label>
															  </div>
															  <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="Suggestion" required>
																<label class="form-check-label" for="inlineRadio2">Suggestion</label>
															  </div>
														</li>
													</ul>
													<textarea rows="10" name="name" placeholder="write something" required  minlength="20"></textarea>
													<div class="attachments">
														<ul>
															<li>
																<i class="fa fa-image"><span class="badge text-primary" id="image-count"></span></i>
																<label class="fileContainer">
																	<input  type="file" id="image" name="image[]" accept="image/*"  multiple>
																</label>
															</li>
															<li>
																<button id="submit" type="submit">Post</button>
															</li>
														</ul>
														
																
														<div class="collapse" id="collapseExample">
															<form>
															  <input type="text">
															</form>
														  </div>
													</div>
												</form>
												<div class=" row" id="preview_img">

												</div>
												<div id="thumb-output"></div>
											</div>
										</div>
									</div>
								</div><!-- add post new box -->
								
									<!-- friends list sidebar -->
								
							</div><!-- sidebar -->	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<!-- Modal -->
	<div class="modal fade" id="myupload" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body">
			  <p id="error"></p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	  </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		var limit = 5;
		$(document).ready(function(){
			$('#image').change(function(){
				var files = $(this)[0].files;
				if(files.length){
					if(files.length > limit){
						$("#limit-error").html("You can select max "+limit+" images.");
						$('#image').val('');
						return false;
					}
					$("#image-count").html(files.length);
				}else{
					return true;
				}
			});
		});
	</script>
	<script>
		$('#submit').on('click', function(e) {
		var x = document.getElementById('submitpost').checkValidity();
		if (x) {
			clicklink();
		} else {
		    
		}

		});
	</script>
@endsection