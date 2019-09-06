@extends('templates.default')
@section('content')
<head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="bootstrap-grid.css">
            <link rel="stylesheet" href="bootstrap-reboot.css">
            <link rel="stylesheet" href="bootstrap-reboot.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Social</title>
        </head>
<h3>Sign Up</h3> 
<form method="post" class="needs-validation" action="">
  <div class="form-group{{ ($errors->has('email')) ? ' required':''}}">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{ Request::old('email') ?: ''}}" class="form-control" id="validationCustom01" aria-describedby="emailHelp" placeholder="Enter email">
    @if($errors->has('email'))
        <span class="form-text">{{$errors->first('email')}}  </span>
     @endif
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group:invalid " >
    <label for="username">Username </label>
    <input type="text" name="username" value="{{ Request::old('username') ?: ''}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" username">
     @if($errors->has('username'))
        <span class="form-text">{{$errors->first('username')}}  </span>
     @endif
  </div>
  <div class="form-group :invalid">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" s invalid class="form-control" id="exampleInputPassword1" placeholder="Password">
    @if($errors->has('password'))
        <span class="form-text">{{$errors->first('password')}}  </span>
     @endif
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">SignUp</button>
  <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
@stop