@extends('templates.default')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-4">

<h3>Your Friends</h3>
@if(!$friends->count())
           <p>You have no friends</p>
    @else
          @foreach($friends as $user)
            @include('user/partials/userblock')


          @endforeach

    @endif
</div>
    <div class="col-md-4 offset-md-4">
        <h4>Friend Request</h4>
            @if(!$requests->count())
                <p> You have no friend request</p>

            @else
            @foreach($requests as $user)
            @include('user/partials/userblock')


          @endforeach
            @endif
    </div>
</div>
</div>
@stop