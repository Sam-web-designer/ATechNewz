@extends('backend/master/layout')

@section('page_title' ,'ATechNewz | UserList')
<style>
    #item-id{
        display: none;
    }
    .content{
        display: none;
    }

    *, body {
  margin: 0;
  padding: 0;
}
.flex {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
.content {
  height: 100px;
  width: 45%;
  font-size: 24px;
  line-height: 100px; 
  background-color: grey;
  margin: 5px;
  border: 1px solid lightgrey;
  display: none;
}
#loadMore {
  width: 200px;
  color: #fff;
  display: block;
  text-align: center;
  margin: 20px auto;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid transparent;
  background-color: #007bff;
  transition: .3s;
}
#loadMore:hover {
  color: #007bff;
  background-color: #fff;
  border: 1px solid #007bff;
  text-decoration: none;
}
.noContent {
  color: #000 !important;
  background-color: transparent !important;
  pointer-events: none;
}
</style>

@section('post')
<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                        </div><!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="frnds">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">User Lists</a> <span>{{count($user)}} </span></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                      <div class="tab-pane active fade show " id="frends" >
                                        <ul class="nearby-contct flex" id="follow-user-id">
                                            @foreach ($user->sortByDesc('created_at') as $item)
                                            <li id="item-id" class="content">
                                                <a href="{{route('user',$item->name)}} ">
                                                <div class="nearly-pepls">
                                                    <figure>
                                                    <a href="{{route('user',$item->name)}} ">
                                                        @if ($item->avatar == 'default.png')
                                                            <img class="avatar-img" src="{{asset('/front_asset/images/'.$item->avatar)}}" width="40">
                                                        @else
                                                            <img src="{{asset('/storage/userimage/'.$item->avatar)}}" alt="">
                                                        @endif
                                                    </a>
                                                    </figure>
                                                    <div class="pepl-info">
                                                        <h4><a href="{{route('user',$item->name)}}" >{{$item->name}}</a></h4>
                                                        @if ($item->role_id == 'yes')
                                                        <a type="button" id="deletefollow" class="add-butn more-action" style="background: black" href="{{route('removeadmin',$item->id)}} " data-id="{{$item->id}}">Admin</a>
                                                        @else
                                                        <a type="button" id="deletefollow" class="add-butn more-action" href="{{route('approveuseradmin',$item->id)}}" data-id="{{$item->id}}">User</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                </a>
                                            </li>
                                            @endforeach
                                            <a href="#" id="loadMore" >loadMore</a>
                                        </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>	
                        </div><!-- centerl meta -->
                    </div>	
                </div>
            </div>
        </div>
    </div>	





</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
  $(".content").slice(0, 20).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".content:hidden").slice(0, 15).slideDown();
    if($(".content:hidden").length == 0) {
      $("#loadMore").text("No more friends").addClass("noContent");
    }
  });
  
})
</script>
@endsection