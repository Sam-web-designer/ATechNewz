	// Save Comment
    $(document).ready(function(){
        $("#like-user").on('click',function(e){
            // console.log($("#comment").val());
            // var _id=$(".id").val();
            var _post=$(this).data('post');
            var vm=$(this);
        
            $.ajax({
                url:"{{ url('/like-user') }}",
                type:"post",
                dataType:'json',
                data:{
                    // id:_id,
                    like_id:_post,
                    _token:"{{ csrf_token() }}"
                },
                success:function(res){
                    if(res.bool==true){
                        // fecth_reply_comments();	
                        console.log('done');						
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