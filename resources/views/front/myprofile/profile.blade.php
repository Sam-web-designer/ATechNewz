@extends('front/master/profile')

@section('page_title' ,'AtechnewZ | My Profile')

@section('post')
<section class=" d-flex align-content-center justify-content-center">
    <div class="gap gray-bg">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-center" id="page-contents">
                        <!-- sidebar -->
                        <div class="col-lg-6" id="replypost" >
                           @include('front.myprofile.post')
                        </div><!-- sidebar -->
                    </div>	
                </div>
            </div>
        </div>
    </div>	
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  

<script>
    $(document).ready(function () {
        $("body").on("click","#deletepost",function(e){

        e.preventDefault();
        var id = $(this).data("id");
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;

        $.ajax(
            {
                url: '{{ url('deletepost') }}' + '/' + id, //or you can use url: "company/"+id,
                type: 'get',
                data: {
                _token: token,
                    id: id
            },
            success: function (response){
                Swal.fire(
                    'Delete!',
                    'Your Post deleted successfully!',
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
                success: function(data) {
                    $('#replypost').html(data);
                },
            });
        }

    });
</script>
@endsection