<style>
    .unfollow{
        padding: 5px 10px;
        border-radius: 10px;
        color: #088dcd;
        border: 2px solid #088dcd;
    }
    .follow{
        padding: 5px 10px;
        border-radius: 10px;
        color: white;
        background: #088dcd
        border: 2px solid #088dcd;
    }
</style> 

@if (session()->get('user'))
    @if (count($follow) == 1)
        <a type="button" id="deletefollow" class="unfollow" style="background:#fff;" href="{{route('followdelete',$follow['0']->id)}}" data-id="{{$follow['0']->id}}">Unfollow</a>
    @else 
        <a type="button" data-post="{{$post['0']->id}}" id="follow-btn" class="follow" style="color:#fff;" >Follow</a>
    @endif
@else
    <a style="color: #fff" class="follow" type="button" href="#modal-center" uk-toggle>Follow</a>
@endif

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    // Save Comment
    $(document).ready(function(){
        $("#follow-btn").on('click',function(e){
            // console.log($("#comment").val());
            // var _id=$(".id").val();
            var _post=$(this).data('post');
            var vm=$(this);
        
            $.ajax({
                url:"{{ route('follow') }}",
                type:"post",
                dataType:'json',
                data:{
                    // id:_id,
                    follow_id:_post,
                    _token:"{{ csrf_token() }}"
                },
                beforeSend:function(){
                    vm.text('Following').addClass('disabled');
                },
                success:function(res){
                    if(res.bool==true){
                        fecth_reply_comments();							
                    }
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
<script>
$(document).ready(function () {
$("body").on("click","#deletefollow",function(e){

e.preventDefault();
var id = $(this).data("id");
// var id = $(this).attr('data-id');
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
});
});
function fecth_reply_comments(){
                $.ajax({
                    url: window.location.href ,
                    success: function(data) {
                        $('#follow-user-id').html(data);
                    },
                });
            }

});
</script>


