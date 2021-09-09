@foreach ($post->replycomments as $item)
<li>
    <div class="comet-avatar">
        @if ($item->user->avatar == 'default')
            <img src="{{asset('front_asset/images/default.png')}}" alt="" alt="">
        @else
                <img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" alt="" width="50">
        @endif
    </div>
    <div class="we-comment">
        <div class="coment-head">
            <h5><a href="time-line.html" title="">{{$item->user->name}}</a></h5>
            <span>{{$item->created_at->diffForHumans() }}</span>
            @if(session()->get('user')['id'] == $item->user_id)
              <a href="{{ route('replycomment.delete',$item->id) }}" class="we-reply" style="font-size: 0.8em; color:red;" id="deletecomment" data-id="{{ $item->id }}">
                <i class="fas fa-trash-alt"></i>
            </a>
            @endif
        </div>
        <p class="comment-reply"> 
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

