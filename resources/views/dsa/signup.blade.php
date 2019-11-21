<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Dental Students Association</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
	<title>login</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

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
	<nav class="navbar navbar-expand-md  navbar-dark bg-info" id="navi">
  <!-- Brand -->
  <a class="navbar-brand" href="{{ route('home') }}">DSA</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.signin') }}">Sign in</a>
      </li>
    </ul>
  </div>
</nav>
@if(Session::has('info'))
<div class="alert alert-info" role="alert">
{{ Session::get('info')}}

@endif
</div>
<div class="signup-form">
    <form action="{{ route('auth.signup') }}" method="post">
		<h2>Register for DSA</h2>
		<p class="hint-text">Create your account. Its free and only takes a minute.</p>
        <div class="form-group">

				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>

        </div>

        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
         <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="username" required="required">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="year" placeholder="Year of study" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
	<div class="text-center">Already have an account? <a href="{{ route('auth.signin') }}">Sign in</a></div>
</div>

</body>
</html>
