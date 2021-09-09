@extends('front/master/profile')

@section('page_title' ,'AtechZ')

@section('post')
<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="frnds">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Following</a> <span>{{count($data)}}</span></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                      <div class="tab-pane active fade show" style="background: white" id="frends" >
                                        <ul class="nearby-contct" id="follow-user-id">
                                        @include('front.myprofile.following-list')
                                    </ul>
                                    </ul>	
                                          <button class="btn-view btn-load-more"></button>
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
    $(document).ready(function () {
    $("body").on("click","#deletefollow",function(e){

    e.preventDefault();
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    var url = e.target;

    $.ajax(
    {
        url: '{{ url('followdelete') }}' + '/' + id, //or you can use url: "company/"+id,
        type: 'get',
        data: {
        _token: token,
            id: id
    },
    success: function (res){
        if(res.bool==true){
            fecth_reply_comments();							
        }
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
            success: function(data) {
                $('#follow-user-id').html(data);
            },
        });
    }

    });
    </script>

@endsection