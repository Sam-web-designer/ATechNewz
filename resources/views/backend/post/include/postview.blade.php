@if(count($post) > 20)
<div class="loadMore">
@endif
    @foreach ($post as $item)
{{-- <h1>{{$item->count('user_id')}}</h1> --}}

<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure >
                @if ($item->user->avatar  == 'default.png')
                    <div id="image-user">
                        <img class="avatar-img" src="{{asset('/front_asset/images/'.$item->user->avatar)}}" width="40">
                    </div>
                @else
                    <div id="image-user">
                        <img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" width="40">
                    </div>
                @endif
            </figure>
            
            
            <div class="friend-name pl-3">
                <ins><a href="{{route('user',$item->user->name)}}">{{$item->user->name}}</ins></a>
                <span>{{$item->created_at->diffForHumans() }}</span>
            </div>
            
            <a href="{{route('adminpending',$item->id)}} ">
            <div class="post-meta">
                <div class="description">
                    <p>
                    {!! \Illuminate\Support\Str::words(nl2br(e($item->name)), 65,'See More')  !!}
                    </p>
                </div>

                {{-- @php
                    $image = json_decode($item->image);
                    
                @endphp --}}
                @foreach ($item->images as $file)
                
                <img src="{{asset('/storage/post/image/'.$file->image)}}" alt="">
                @endforeach

                @if (count($item->images) < 0 )
                @foreach ($item->videos as $video)
                <iframe src="{{asset('/storage/post/video/'.$video->video)}}" height="auto" controls  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                @endforeach
                @endif
                    {{-- <h1>{{$item->images->image}}</h1> --}}
                {{--  --}}
            </a>
                <div class="we-video-info">
                    <ul>
                        <li>
                            <a type="button" onclick="approve({{$item->id}})" data-id="{{$item->id}} " >Approve</a>
                        </li>
                        <li>
                            <a type="button" onclick="deletepost({{$item->id}})" data-id="{{$item->id}}" style="color: red">Delete</a>
                        </li>
                    </ul>
                </div>
                
            </div>
            
        </div>
    </div>
</div>

@endforeach

<script>
    function approve(id){
        $.ajax(
            {
                url: '{{ url('approvepost') }}' + '/' + id, //or you can use url: "company/"+id,
                type: 'get',
            success: function (response){
                Swal.fire(
                    'Approve Post!',
                    'Post Approved successfully!',
                    'success'
                );
                fecth_reply_comments();
            },
            });
            return false;
        function fecth_reply_comments(){
            $.ajax({
                url: window.location.href,
                success: function(data) {
                    $('#replypost').html(data);
                },
            });
        }
    }
    function deletepost(id){
        $.ajax(
            {
                url: '{{ url('deletepostadmin') }}' + '/' + id, //or you can use url: "company/"+id,
                type: 'get',
            success: function (response){
                Swal.fire(
                    'Approve Post!',
                    'Post Approved successfully!',
                    'success'
                );
                fecth_reply_comments();
            },
            });
            return false;
        function fecth_reply_comments(){
            $.ajax({
                url: window.location.href,
                success: function(data) {
                    $('#replypost').html(data);
                },
            });
        }
    }
</script>