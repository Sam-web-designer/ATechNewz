@extends('front/master/profile')

@section('page_title' ,'AtechZ')
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
  transition: .3s;
}
#loadMore:hover {
  color: #fff;
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
          <div class="row d-flex justify-content-center">
              <div class="col-lg-6">
                          <div class="central-meta">
                              <div class="frnds">
                                  <ul class="nav nav-tabs">
                                  <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Followers</a> <span>{{count($data)}}</span></li>
                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div style="background: white" class="tab-pane active fade show " id="frends" >
                                      <ul class="nearby-contct" id="follow-user-id">
                                       @forelse ($data as $people)
                                                        @foreach ($people->following->sortByDesc('created_at') as $item)
                                                        <li id="item-id" class="content" style="padding:0">
                                                            <a href="{{route('user',$item->name)}} ">
                                                            <div class="nearly-pepls">
                                                                <figure>
                                                                <a href="{{route('user',$item->name)}} ">
                                                                    @if ($item->avatar == 'default.png')
                                                                        <img class="avatar-img m-2" src="{{asset('/front_asset/images/'.$item->avatar)}}" width="40">
                                                                    @else
                                                                        <img class="m-2" src="{{asset('/storage/userimage/'.$item->avatar)}}" alt="">
                                                                    @endif
                                                                </a>
                                                                </figure>
                                                                <div class="pepl-info">
                                                                    <h4><a href="{{route('user',$item->name)}} " >{{$item->name}}</a></h4>
                                                                </div>
                                                            </div>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    @empty
                                                        No Followers any
                                                    @endforelse
                                                    <a href="#" style="background:#088dcd;" id="loadMore" >loadMore</a>
                                  </ul>
                                  </ul>	
                                    </div>
                                  </div>
                              </div>
                          </div>	
              </div>
          </div>
      </div>
  </div>	
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
  $(".content").slice(0, 10).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".content:hidden").slice(0, 10).slideDown();
    if($(".content:hidden").length == 0) {
      $("#loadMore").text("No more friends").addClass("noContent");
    }
  });
  
})
</script>
@endsection