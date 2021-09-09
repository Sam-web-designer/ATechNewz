

@if (count($post) > 7)
<div class="loadMore">
@endif
    @foreach ($post->sortByDesc('created_at') as $item)
            {{-- <h1>{{$item->count('user_id')}}</h1> --}}
            
            <div class="central-meta item">
                <div class="user-post">
                    <div class="friend-info">
                        <figure >
                            @if ($item->user->avatar  == 'default.png')
                                <div id="image-user">
                                    <img class="avatar-img" src="{{asset('/front_asset/images/'.$item->user->avatar)}}" alt="" width="40">
                                </div>
                            @else
                                <div id="image-user">
                                    <img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" alt=""  width="40">
                                </div>
                            @endif
                        </figure>
                        
                        
                        <div class="friend-name pl-3">
                           @if (session()->get('user'))
                           @if(session()->get('user')['id'] == $item->user_id)
                                <ins><a onclick="clicklink()" href="{{route('myprofile')}}">{{$item->user->name}}</ins></a>
                            @else
                                <ins><a onclick="clicklink()" href="{{route('user',$item->user->name)}}">{{$item->user->name}}</ins></a>
                            @endif
                           @else
                                <ins><a onclick="clicklink()" href="{{route('user',$item->user->name)}}">{{$item->user->name}}</ins></a>
                           @endif
                            <span>{{$item->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="post-meta">
                            <a onclick="clicklink()" href="{{route('postname',$item->id)}} ">
                                    <div class="description">
                                        <p class="index-text">
                                            @php
                                                $yourTextWithLinks = $item->name;
                                                $text = strip_tags($yourTextWithLinks);
                                                $textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank"  style="color: #4bb5ef" id="post-link">$1</a>', $text);
                                                echo  Str::words(nl2br($textWithLinks), 65,' <br/>  .......See More');
                                            @endphp
                                        </p>
                                    </div>
                                        @php
                                            $data = App\Models\Imagepost::where(['post_id'=>$item->id])->first();
                                        @endphp
                                        @if (count($item->images) > 0)
                                        <img src="{{asset('/storage/post/image/'.$data['image'])}}" alt="" >
                                            <div class="description d-flex justify-content-center text-center">
                                                <a onclick="clicklink()" href="{{route('postname',$item->id)}} ">
                                                <p style="color: #4bb5ef">See more image ({{count($item->images) - 1 }}) </p>
                                                </a>
                                            </div>
                                        @endif
                                        
                            </a>
                            <div class="we-video-info">
                                <ul >
                                    @if (session()->get('user'))
                                        <li >
                                            @include('front.post.like-index')
                                        </li>
                                    @else 
                                        <li id="likeuser">
                                            <span>
                                                <a style="background: none; color:black" type="button" href="#modal-center" uk-toggle><i class="ti-heart "></i></a>
                                                <ins class="ml-3">{{count($item->likes)}}</ins>
                                            </span>
                                        </li>
                                    @endif
                                    <a onclick="clicklink()" href="{{route('postname',$item->id)}} ">
                                        <li>
                                            <span class="comment" >
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
</div><!-- friends list sidebar -->
