@foreach ($post['0']->posts->sortBydesc('created_at') as $item)
                                        
<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                @if ($item->user->avatar == 'default.png')
                    <img src="{{asset('front_asset/images/default.png')}}" alt="">
                @else
                    <div id="image-user">
                        <img class="avatar-img" src="{{asset('/storage/userimage/'.$item->user->avatar)}}" width="50">
                    </div>
                @endif
            </figure>
            <a href="{{route('user',$item->user->name)}}">
                <div class="friend-name pl-3">
                    <ins>{{$item->user->name}}</ins>
                    <span>{{$item->created_at->diffForHumans() }}</span>
                </div>
            </a>
            <div class="post-meta">
                <a href="{{route('postname',$item->id)}} ">
                    <div class="description">
                        <p id="index-text">
                            @php
                                $yourTextWithLinks = $item->name;
                                $text = strip_tags($yourTextWithLinks);
                                $textWithLinks = preg_replace('@(https?://([-\w\.com]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" style="color:#4bb5ef" target="_blank" rel="nofollow">$1</a>', $text);
                                echo  \Illuminate\Support\Str::words(nl2br($textWithLinks), 65,'See More');
                            @endphp
                        </p>
                    </div>
                    @php
                        $data = App\Models\Imagepost::where(['post_id'=>$item->id])->first();
                    @endphp
                    @if (count($item->images) > 0)
                    <img src="{{asset('/storage/post/image/'.$data['image'])}}">
                           <div class="description d-flex justify-content-center text-center">
                                <a onclick="clicklink()" href="{{route('postname',$item->id)}} ">
                                <p style="color: #4bb5ef">See more image ({{count($item->images) - 1 }}) </p>
                                </a>
                            </div>
                    @endif
                </a>
                <div class="we-video-info">
                    <ul>
                        @if (session()->get('user'))
                            <li >
                                @include('front.userprofile.like-unlike')
                            </li>
                        @else 
                            <li id="likeuser">
                                <span>
                                    <a style="background: none; color:black" type="button" href="#modal-center" uk-toggle><i class="ti-heart "></i></a>
                                    <ins class="ml-3">{{count($item->likes)}}</ins>
                                </span>
                            </li>
                        @endif
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