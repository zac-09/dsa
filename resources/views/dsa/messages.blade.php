<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">

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
	<!-- Navbar -->
	<nav class="navbar navbar-expand-md bg-info navbar-dark" style="background-color: orange;">
  <!-- Brand -->
  <a class="navbar-brand" href="{{ route('home') }}">DSA</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('zac.index') }}">Messages</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('academics') }}">Academics</a>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.index',['username'=>Auth::user()->username]) }}">Profiles</a>
      </li>
      </li>
    </ul>
  </div>
</nav>

<!-- Navbar end -->

<div class="card grey lighten-3 chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

      <!-- Grid column -->
      {{--  <div class="col-md-6 col-xl-4 px-0">
        <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right" onclick="tutorSend()">Send to tutor</button><p>.</p>
        <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right" onclick="showMessage()">View messages</button><p>.</p>
<button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right" onclick="showMessage1()">New message</button>  --}}

        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Messages</h6>
        @if(!$users->count())
        <p> you have no friends</p>
        @else


        @foreach ($users as $user)
        @if($user->id != Auth::user()->id)
        <div class="white z-depth-1 px-3 pt-3 pb-0" >
          <ul class="list-unstyled friend-list">
            <li class="active grey lighten-3 p-2">
              <a href="{{route('message.conversation',['username'=>$user->username])}}" class="d-flex justify-content-between">
                <img src="/social/public/storage/profile_pics/{{$user->profile_pic}}"  alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                <div class="text-small">
                  <strong> {{ $user->username }}</strong></a>
                  @if($user->year)
                  <p class="last-message text-muted">{{  $user->year}}  </p>
                  @endif
                </div>
                <div class="chat-footer">
                  <p class="text-smaller text-muted mb-0"></p>
                  <span class="badge badge-danger float-right"></span>
                </div>
              
            </li>
            @endif
            @endforeach
            @endif


        </div>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0" id="chat" style="display: none;">

        <div class="chat-message">

          <ul class="list-unstyled chat">
            <li class="d-flex justify-content-between mb-4">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">Brad Pitt</strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.
                </p>
              </div>
            </li>
            <li class="d-flex justify-content-between mb-4">
              <div class="chat-body white p-3 z-depth-1">
                <div class="header">
                  <strong class="primary-font">Lara Croft</strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> 13 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                  laudantium.
                </p>
              </div>
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
            </li>
            <li class="d-flex justify-content-between mb-4 pb-3">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">Brad Pitt</strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.
                </p>
              </div>
            </li>
            <li class="white">
              <div class="form-group basic-textarea">
                <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
              </div>
            </li>
            <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
            <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Upload</button>
          </ul>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
<!-- tutor message compose -->


              <div class="form-group basic-textarea" id="tutorcompose" style="display: none;">
                <div class="container">
                <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>

              <label class="control-label col-sm-2" for="email">Tutor:</label>
    <div class="col-sm-10">
      <input  class="form-control"  placeholder="Enter tutor name">
    </div>
 </div>

            <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
            <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Upload</button>
          </div>
        </div>

        <!-- tutor compose -->
        <div class="form-group basic-textarea" id="messagecompose1" style="display: none;">
                <div class="container">
                <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>

              <label class="control-label col-sm-2" for="email">Tutor:</label>
    <div class="col-sm-10">
      <input  class="form-control"  placeholder="Enter user name">
    </div>
 </div>

            <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
            <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Upload</button>
          </div>
        </div>
</body>
<script type="text/javascript">
  function showMessage() {
    var s = document.getElementById("hidde")
    s.style.display = "block";

    var c = document.getElementById("chat")
    c.style.display = "block";
  }
  function tutorSend() {
    var h = document.getElementById("tutorcompose")
    h.style.display = "block";

    var m = document.getElementById("messagecompose1")
    m.style.display = "none";
  }
function showMessage1() {
  var m = document.getElementById("messagecompose1")
    m.style.display = "block";

    var h = document.getElementById("tutorcompose")
    h.style.display = "none";
}
</script>
</html>
