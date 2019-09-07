<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
    <meta charset="utf-8">


    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="profstyle.css">
<!------ Include the above in your HEAD tag ---------->

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
        <a class="nav-link active" href="{{ route('profile.index',['username'=>Auth::user()->username]) }}">Profiles</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Navbar end -->
<div class="container">
<nav  class="navbar navbar-expand-sm bg-dark navbar-dark">
  <form class="form-inline" action="{{ route('search.results') }}" method="get">
    <input class="form-control mr-sm-2" name="query" type="text" placeholder="Search">
    <button class="btn btn-outline-danger " type="submit">Search</button>
  </form>
</nav>
</div>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                                
                                <img src="http://157.245.79.198/storage/profile_pics/{{$user->profile_pic}}"
                            {{--  <img src="{{ URL::to('storage/profile_pics/{{$user->profile_pic}}') }}" alt=""/>  --}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{ $user->getNameOrUsername() }}
                                    </h5>
                                    <h6>
                                        {{ $user->profession }}
                                    </h6>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="profile-edit-btn" href="{{ route('profile.edit') }}">Edit Profile</a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK UPLOADED</p>
                            <a href="">Course work</a><br/>
                            <a href="">Slides</a><br/>
                            <a href="">Notes</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->id }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->getNameOrUsername() }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->Email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->phone_number }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->profession}}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10 years</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
