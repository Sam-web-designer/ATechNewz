@forelse ($data->sortBydesc('created_at') as $follow)
    @foreach ($follow->userlists as $item)
    <li style="padding: 10px 10px">
        <div class="nearly-pepls">
            <figure>
            <a href="{{route('user',$item->name)}}">
                @if ($item->avatar == 'default.png')
                    <img class="avatar-img" src="{{asset('/front_asset/images/'.$item->avatar)}}" width="40">
                @else
                    <img src="{{asset('/storage/userimage/'.$item->avatar)}}" alt="">
                @endif
            </a>
            </figure>
            <div class="pepl-info">
                <h4><a href="{{route('user',$item->name)}} ">{{$item->name}}</a></h4>
                <a type="button" id="deletefollow" class="add-butn more-action" href="{{route('followdelete',$follow->id)}}" data-id="{{$follow->id}}">unfollow</a>
            </div>
        </div>
    </li>
    @endforeach
@empty
    No following any
@endforelse