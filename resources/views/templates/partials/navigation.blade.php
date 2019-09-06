<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">Social</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">


      @if(Auth::check())


    <ul class=" navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link " href="{{route('home')}}"> Timeline </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('friends.index')}}">Friends</a>
      </li>



      <form class="form-inline " role="search" action="{{ route('search.results') }}">
      <input class="form-control " name="query" type="search" placeholder="Find People" aria-label="Search">
      <button class="btn btn-outline-success " type="submit">Search</button>
    </form>


      @endif
      <ul class=" navbar-nav ml-auto">
      @if(Auth::check())
      <li class="nav-item active">
        <a class="nav-link " href="{{route('profile.index',['username'=>Auth::user()->username])}}">{{Auth::user()->getNameOrUsername()}} </a>
      </li>
      <li class="nav-item my-2 my-lg-0">
        <a class="nav-link my-2 my-sm-0" href="{{route('profile.edit')}}">Update Profile</a>
      </li>
      <li class="nav-item my-2 my-lg-0">
        <a class="nav-link my-2 my-sm-0" href="#">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link my-2 my-sm-0" href="{{route('auth.signout')}}">Sign out</a>
      </li>
  @else
  <li class="nav-item active">
        <a class="nav-link " href="{{ route('auth.signin') }}">Sign in </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.signup')}}">Sign up</a>
      </li>

      @endif
      </ul>


      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
