@foreach ($data as $item)
@foreach ($item->userlists as $item)
   @foreach ($item->posts->sortByDesc('created_at') as $item)
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
                <div class="post-meta">
                    <a href="{{route('postname',$item->id)}} ">
                        <div class="description">
                            <p id="index-text">
                                @php
                                    $yourTextWithLinks = $item->name;
                                    $text = strip_tags($yourTextWithLinks);
                                    $textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank" rel="nofollow">$1</a>', $text);
                                    echo  \Illuminate\Support\Str::words(nl2br($textWithLinks), 65,'See More');
                                @endphp
                            </p>
                        </div>
                        @foreach ($item->images as $file)
                        
                        <img src="{{asset('/storage/post/image/'.$file->image)}}" alt="">
                        @endforeach
                    </a>
                    <div class="we-video-info">
                        <ul>
                            <li id="likeuser">
                                @include('front.post.like-index')
                            </li>
                            <a href="{{route('postname',$item->id)}} ">
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="far fa-comment"></i>
                                        <ins>{{count($item->comments)}}</ins>
                                    </span>
                                </li>
                            </a>
                        </ul>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
  @endforeach
@endforeach
@endforeach