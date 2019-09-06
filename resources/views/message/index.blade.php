@extends('templates.default')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

<h3>Send a Text to Your Friends</h3>
    @if(!$friends->count())
<p>look for Friends to text</>
@else
@foreach($friends as $user)

 <div class="media">

<a class="pull-left" href="{{route('message.conversation',['username'=>$user->username])}}">
 <img class="mr-3" alt="{{$user->getNameOrUsername()}}" src="{{$user->getAvatorUrl()}}"> 
 </a>
<div class="media-body">
<h4 class="mt-0"><a href="{{route('message.conversation',['username'=>$user->username])}}">{{$user->getNameOrUsername()}}</a><h4>


@if($user->location)
<p> {{$user->location}}</p>
</div>
</div>

@endif
@endforeach
@endif
 
@stop
    


