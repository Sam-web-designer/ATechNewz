@if(count($item->likes) >0)
    @php
        $find =App\Models\like::where(['post_id' => $item->id, 'user_id' => session()->get('user')['id']])->first();
    @endphp
    @if ($find)
        <span class="like" data-toggle="tooltip" title="like">
            <a style="background: none; color:red" type="button" onclick='unlike({{$find->id}})' data-post="{{$find->id}}"><i class="ti-heart "></i></a>
            <ins class="ml-3">{{count($item->likes)}}</ins>
        </span>
    @else 
    <span class="like">
        <a style="background: none; color:black" type="button" onclick='like({{$item->id}})' data-post="{{$item->id}}"><i class="ti-heart "></i></a>
        <ins class="ml-3">{{count($item->likes)}}</ins>
    </span>
    @endif   
@else
    <span class="like" >
        <a style="background: none; color:black" type="button" onclick='like({{$item->id}})' data-post="{{$item->id}}"><i class="ti-heart "></i></a>
        <ins class="ml-3">{{count($item->likes)}}</ins>
    </span>
@endif
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                success:function(res){
                    if(res.bool==true){
                        fecth_like();							
                    }
                } 
            });
    }
    function unlike(id){
        $.ajax({
                url:'{{ url('ppost/unlike') }}' + '/' + id,
                success:function(res){
                    if(res.bool==true){
                        fecth_like();							
                    }
                } 
            });
        
    }
    function fecth_like(){
        $.ajax({
            url: window.location.href ,
            success: function(data) {
                $('#replypost').html(data);
            },
        });
    }
</script>