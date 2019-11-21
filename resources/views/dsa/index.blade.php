<!DOCTYPE html>
<html lang="en">
<head>
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
        @if(Session::has('info'))
        <div class="alert alert-info" role="alert">
        {{ Session::get('info')}}


        </div>





        @endif
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
            @if(Auth::check())
        <a class="nav-link active" href="{{route('home')}}">Home</a>
      </li>
      <form class="form-inline " role="search" action="{{ route('search.results') }}">
        <input class="form-control " name="query" type="search" placeholder="Find People" aria-label="Search">
        <button class="btn btn-outline-danger " type="submit">Search</button>
      </form>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('zac.index') }}">Messages</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('academics') }}">Academics</a>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.index',['username'=>Auth::user()->username]) }}">Profiles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('auth.signout')}}">Sign out</a>
      </li>
      </li>
    </nav>
      @else
      <li class="nav-item ml-auto">
            <a class="nav-link" href="{{ route('auth.signin') }}"><span class="glyphicon glyphicon-user"></span>Sign in</a>
          </li>
          <li class="nav-item ml-auto">
                <a class="nav-link" href="{{ route('auth.signup')}}">Sign up</a>
              </li>
    </ul>
  </div>
</nav>
@endif



<!-- Navbar end -->
<!-- Default Statcounter code for mulago  -->
<script type="text/javascript">
var sc_project=12146592;
var sc_invisible=0;
var sc_security="d7fc8729";
var sc_https=1;
var scJsHost = "https://";
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="Web Analytics"
href="https://statcounter.com/" target="_blank"><img class="statcounter"
src="https://c.statcounter.com/12146592/0/d7fc8729/0/" alt="Web
Analytics"></a></div></noscript>
<!-- End of Statcounter Code -->


  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">



      <div class="intro-info">
        <h2>With confidence and<br><span>dignity</span><br>we serve</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->
<div class="container">


  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <div class="container">
    <section id="about">
      <div class="container">


        <header class="section-header">
        @if(Auth::check())
          <h3>News feed</h3>

          <form method="post" action="{{route('status.post')}}" role="form" >
    <div class="form-group">
        <textarea class="form-control" name="status" placeholder="What's on your mind" rows="3" cols="2" required></textarea>

    </div>


          <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Post</button>

    <input type="hidden" name="_token" value="{{ Session::token()}}">
</form>

        </header>

        @if(!$statuses->count())
        <p> no news stuff</p>


        @else

        @foreach($statuses as $status)












        <div class="row about-extra">
          <div class="col-lg-6  wow fadeInUp">
<div class="container">

              <img src="https://dsamulago.com/storage/profile_pics/{{$status->user->profile_pic}}" alt="avatar" class="avatar rounded-circle mr-1 ml-lg-2 ml-0 z-depth-1" class="img-fluid" alt="">

</div>
                </div>

          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h3>{{ $status->user->getNameOrUsername() }} </h3>
            <h6>{{$status->user->profession}}</h6>

            <p>
                {{ $status->body }}
            </p>
           <p>{{$status->created_at->diffForHumans()}}</p>
          </div>
          @endforeach
        </div>
 </div>
      </div>

    </section><!-- #about -->
</div>

@endif
@endif

@if(!Auth::check())
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">


    <!--==========================
      Clients Section   here we shall include the companies that sponsor the marathon
    ============================-->
    <section id="clients" class="section-bg">

      <div class="container">

        <div class="section-header">
          <h3>Our Partners</h3>
          <p>DSA has various partners.</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">



          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ URL::to('img/clients/client-3.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ URL::to('img/clients/client-4.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ URL::to('img/clients/client-5.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ URL::to('img/clients/client-8.png') }}" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>



  </main>
@endif
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>dsa</h3>
            <p>The Dental Students Association is a student organization of dental students at UIAHMS Mulago</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Mulago, P.O BOX 34566<br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> dentalstudents@gmail.com<br>
            </p>

          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Fortune software</strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{ URL::to('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::to('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ URL::to('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::to('lib/easing/easing.min.js') }}"></script>
  <script src="{{ URL::to('lib/mobile-nav/mobile-nav.js') }}"></script>
  <script src="{{ URL::to('lib/wow/wow.min.js') }}"></script>
  <script src="{{ URL::to('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ URL::to('lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ URL::to('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::to('lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::to('lib/lightbox/js/lightbox.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ URL::to('contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ URL::to('js/main.js') }}"></script>

</body>
</html>
