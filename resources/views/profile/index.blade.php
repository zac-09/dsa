
@extends('templates.default')
@section('content')


<div class="row">
    <div class="col-md-4">

      @include('user.partials.userblock')
      <hr>

    </div>
    @if (!$statuses->count())
        <p> {{$user->getNameOrUsername()}} has no status yet</p>

    @else
        @foreach ($statuses as $status)
        <div class="media">
        <a href="{{route('profile.index',['username'=>$status->user->getNameOrUsername()])}}" class="pull-left">
        <img class="medai-object" alt="{{$status->user->getNameOrUsername()}}" source="{{$status->user->getAvatorUrl()}}">
        </a>

        <div class="media-body">
        <h4 class="medida-heading"><a href="{{route('profile.index',['username'=>$status->user->getNameOrUsername()])}}">{{$status->user->getNameOrUsername()}}</a></h4>
        <p>{{$status->body}}</p>
        <ul class="list-inline" >
        <li>{{$status->created_at->diffForHumans()}}</li>
          @if($status->user->id !== Auth::user()->id)
            <li><a href="{{ route('status.like',$status->id)}}">like</a></li>
            <li>{{$status->likes->count()}} {{str_plural('like',$status->likes->count())}}</li>
        @endif
        </ul>
    

@foreach($status->replies as $reply)
<div class="media">
        <a href="{{route('profile.index',['username'=>$reply->username])}}" class="pull-left">
        <img class="medai-object" alt="{{$reply->user->getNameOrUsername()}}" source="{{$reply->user->getAvatorUrl()}}">
        </a>

        <div class="media-body">
        <h5 class="medida-heading"><a href="{{route('profile.index',['username'=>$reply->username])}}">{{$reply->user->getNameOrUsername()}}</a></h5>
        <p>{{$reply->body}}</p>
        <ul class="list-inline" >
        <li>{{$status->created_at->diffForHumans()}}</li>
        @if($reply->user->id !== Auth::user()->id)
            <li><a href="{{ route('status.like',$reply->id)}}">like</a></li>
       
        @endif
        <li>{{$reply->likes->count()}} {{str_plural('like',$reply->likes->count())}}</li>
        </ul>
      </div>
 </div>  
 @endforeach
     @if($authUserIsFriend || Auth::user()->id === $status->user->id)
                <form action="{{route('status.reply',['statusId'=>$status->id])}}" method="post" >
              <div class="form-group col-lg-12">
                <textarea name="reply-{{$status->id}}" class="form-control" rows="2" placeholder="reply to this status" required></textarea>
                </div>
                <input type="submit" value="reply" class="btn btn-default btn-sm">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>

  @endif


</div>
 </div>

        


    @endforeach
   
    @endif

    </div>
    </div>
    <div class="col-md-4 ml-auto">
    @if(Auth::user()->hasFriendRequestsPending($user))
      <p> Waiting for {{$user->getFirstNameOrusername()}} to accept your request</p>

    @elseif(Auth::user()->hasFriendsRequestsReceived($user))

         <a href="{{route('friends.accept',['username'=>$user->username])}}" class="btn btn-primary">Accept Friend Request</a>

    @elseif(Auth::User()->isFriendsWith($user))

      <p>You are friends with {{$user->username}}</p>
      <form action="{{route('friend.delete',['username'=>$user->username])}}" method="post">
        <input type="submit" value="delete friend" class="btn btn-primary">
        <input type="hidden" value="{{Session::token()}}" name="_token">

      </form>

    @elseif(Auth::user()->id != $user->id)
      <a href="{{route('friends.add',['username'=>$user->username])}}" class="btn btn-primary">Add Friend</a>

    @endif
    <!-- friends -->
    <h3>{{$user->getFirstNameOrUSername()}}'s friends</h3>

    
    @if(!$user->friends()->count())
           <p>{{$user->getFirstNameOrUsername()}} has no friends</p>
    @else
          @foreach($user->friends() as $user)
            @include('user/partials/userblock')


          @endforeach

    @endif
    </div>
</div>



@stop