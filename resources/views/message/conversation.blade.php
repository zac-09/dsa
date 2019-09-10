
<!DOCTYPE html>
<html>
<head>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
	<title>messages</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="msgstyle.css">
</head>
<body>

@if(!$messages->count())
<div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0" >
<form method="post" action="{{route('message.poste',['username'=>$user->username])}}" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <textarea class="form-control" name="message" placeholder="" rows="2" required></textarea>

    </div>

    <div class="form-group">
    <input type="file" name="file">
        </div>
         <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">send Message </button>

    <input type="hidden" name="_token" value="{{ Session::token()}}">
</form>
</div>
@else

@foreach ($messages as $message)


<!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0" >

        <div class="chat-message">

          <ul class="list-unstyled chat">
            <li class="d-flex justify-content-between mb-4">
              <img src="https://dsamulago.com/storage/profile_pics/{{($message->user_id==Auth::user()->id) ? Auth::user()->profile_pic:$user->profile_pic}}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">{{($message->user_id==Auth::user()->id) ? Auth::user()->getNameOrUsername() : $user->getNameOrUsername()}} </strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> {{ Carbon\Carbon::parse( $message->created_at)->diffForHumans()}}</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
               {{ $message->message}}
                </p>
                @if($message->file_name)
            <p > <a href="https://dsamulago.com/storage/files/{{$message->file_name}}">{{$message->file_name}}</a></p>
            @endif
              </div>
            </li>


        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>

</body>
</html>
@endforeach
<div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0" >
<form method="post" action="{{route('message.poste',['username'=>$user->username])}}" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <textarea class="form-control" name="message" placeholder="" rows="2" required></textarea>

    </div>

    <div class="form-group">
    <input type="file" name="file">
        </div>
         <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">send Message </button>

    <input type="hidden" name="_token" value="{{ Session::token()}}">
</form>
</div>
@endif
