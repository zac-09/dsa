<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Dental Students Association</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
	<title>sign in</title>
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


@if(Session::has('info'))
<div class="alert alert-info" role="alert">
{{ Session::get('info')}}


</div>
@endif
<div class="signup-form">
    <form action="{{ route('auth.signin') }}" method="post">
		<h2>Sign in to DSA</h2>
		<p class="hint-text">Sign in to continue</p>

        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Sign in</button>
        </div>
         <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
	<div class="text-center">Don't have an account? <a href="{{route('auth.signup')}}">Sign up</a></div>
</div>
</body>
</html>
