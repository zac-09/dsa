<!DOCTYPE html>
<html>
<head>
    <title>results/title>

<meta charset="utf-8">
  <title>Dental Students Association</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <!-- Main Stylesheet File -->
  <link href="{{ URL::to('css/style.css') }}" rel="stylesheet">


</head>
<body>
        <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
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
        <a class="nav-link" href="{{ route('zac.index') }}">Messages</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('academics') }}">Academics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('profiles') }}">Profiles</a>
      </li>
    </ul>
  </div>

  <form class="form-inline" action="{{ route('search.results') }}" method="get">
    <input class="form-control mr-sm-2" name="query" type="text" placeholder="Search">
    <button class="btn btn-outline-success " type="submit">Search</button>
  </form>
</nav>


<h3>Your search for "{{Request::input('query')}}"</h3>

@if(!$users->count())
    <p>no Reuslts found , sorry</p>
@else
        @foreach($users as $user)


              {{-- <img src="/social/public/storage/profile_pics/{{$user->profile_pic}}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">{{ $user->getNameOrUsername()}} </strong> --}}




<div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="https://dsamulago.com/storage/profile_pics/{{$user->profile_pic}}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">


                </div>
                 <h4 class="primary-font"><a href="{{route('profile.index',['username'=>$user->username])}}">{{ $user->getNameOrUsername()}}</a> </h4>
                 <h4>{{$user->profession}}</h4>
              </div>
            </div>
          </div>


        @endforeach
@endif
</body>
</html>
