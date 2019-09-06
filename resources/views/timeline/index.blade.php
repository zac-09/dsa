@extends('templates.default')
@section('content')
<div class="row">
<div class="col-lg-12">
<form method="post" action="{{route('status.post')}}" role="form">
    <div class="form-group">
        <textarea class="form-control" name="status" placeholder="What's up {{Auth::user()->getFirstNameOrUsername()}}" rows="2" required></textarea>

    </div>
    <button type="submit" class=" btn btn-primary">Update Status </button>
    <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
<hr>
</div>
</div>

    <div class="row">
    <div class="col-lg-5">
    @if (!$statuses->count())
        <p> there are  no statuses yet</p>

    @else
        @foreach ($statuses as $status)
        <div class="media">
        <a href="{{route('profile.index',['username'=>$status->user->getNameOrUsername()])}}" class="pull-left">
        <img class="media-object" alt="{{$status->user->getNameOrUsername()}}" source="{{$status->user->getAvatorUrl()}}">
        </a>

        <div class="media-body">
        <h4 class="media-heading"><a href="{{route('profile.index',['username'=>$status->user->getNameOrUsername()])}}">{{$status->user->getNameOrUsername()}}</a></h4>
        <p>{{$status->body}}</p>
        <ul class="list-inline" >
        <li>{{$status->created_at->diffForHumans()}}</li>
        @if($status->user->id !== Auth::user()->id)
        <li><a href="{{ route('status.like',$status->id)}}">like</a></li>
        <li>{{$status->likes->count()}} {{str_plural('like',$status->likes->count())}} </li>

    @endif
        </ul>
    

@foreach($status->replies as $reply)
<div class="media">
        <a href="{{route('profile.index',['username'=>$reply->username])}}" class="pull-left">
        <img class="media-object" alt="{{$reply->user->getNameOrUsername()}}" source="{{$reply->user->getAvatorUrl()}}">
        </a>

        <div class="media-body">
        <h5 class="media-heading"><a href="{{route('profile.index',['username'=>$reply->username])}}">{{$reply->user->getNameOrUsername()}}</a></h5>
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
     
                <form action="{{route('status.reply',['statusId'=>$status->id])}}" method="post" >
              <div class="form-group col-lg-12">
                <textarea name="reply-{{$status->id}}" class="form-control" rows="2" placeholder="reply to this status" required></textarea>
                </div>
                <input type="submit" value="reply" class="btn btn-default btn-sm">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>




</div>
` </div>

        


    @endforeach
    {{!! $statuses->render()}}
    @endif

    </div>
    </div>
@stop