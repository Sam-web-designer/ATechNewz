@if (count($like) == 1)
    <span>
        <a style="background: none; color:red" onclick="unlike({{$like['0']->id}})" type="button"  ><i class="ti-heart "></i></a>
        <ins class="ml-3">{{count($post->likes)}}</ins>
    </span>
@else
    <span  >
        <a style="background: none; color:black"  onclick="like({{$post->id}})" type="button" ><i class="ti-heart "></i></a>
        <ins class="ml-3">{{count($post->likes)}}</ins>
    </span>
@endif
<script>
    function like(id){
        var _post =id;
        $.ajax({
                url:"{{ url('/like-user') }}",
                type:"post",
                dataType:'json',
                data:{
                    // id:_id,
                    post_id:_post,
                    _token:"{{ csrf_token() }}"
                },
                  beforeSend:function(){
                    $('.ti-heart').css('display','none');
				},
                success:function(res){
                    if(res.bool==true){
                        fecth_unlike();							
                    }
                } 
            });
    }
    function unlike(id){
        $.ajax({
                url:'{{ url('ppost/unlike') }}' + '/' + id,
                type:'get',
                  beforeSend:function(){
                    $('.ti-heart').css('display','none');
				},
                success:function(res){
                    if(res.bool==true){
                        fecth_unlike();							
                    }
                } 
            });
        
    }
    function fecth_unlike(){
        $.ajax({
            url: window.location.href + '/1',
            success: function(data) {
                $('#like-system-user').html(data);
            },
        });
    }
	// });
</script>