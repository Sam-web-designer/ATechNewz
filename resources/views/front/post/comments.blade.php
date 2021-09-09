@if (count($post->comments) > 0)										
    @foreach ($post->comments as $item)
    <li class="comments">
    <div class="comet-avatar">
        @if (session()->get('user')['avatar'] == '')
        <img src="{{asset('front_asset/images/default.png')}}" alt="" alt="">
        @else
                <img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" alt="" width="50">
                
        @endif
    </div>
    <div class="we-comment">
        <div class="coment-head">
        <h5><a href="time-line.html" title="">{{$item->user->name}}</a></h5>
        <span>{{$item->created_at->diffForHumans() }}</span>
            <a class="we-reply" href="{{route('replycomment.id',$item->id)}}" title="Reply"><i class="fa fa-reply"><span class="badge">{{count($item->replycomments)}} </span></i></a>
            @if (session()->get('user')['id'] == $item->user_id)
            <a href="{{ route('comment.delete',$item->id) }}" class="we-reply" style="font-size: 0.8em; color:red;" id="deleteCompany" data-id="{{ $item->id }}">
                <i class="fas fa-trash-alt"></i>
            </a>
            @endif
        </div>
        <p  class="comm">
            @php
                $yourTextWithLinks = $item->comment;
                $text = strip_tags($yourTextWithLinks);
                $textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank" rel="nofollow">$1</a>', $text);
                echo  $textWithLinks;
            @endphp
        </p>
    </div>
    </li>
@endforeach
@else
    <li>
        <h5 class="p-3" style="text-align: center">No comments</h5>
    </li>	
@endif