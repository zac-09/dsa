@extends('templates.default')


@section('content')
<h3>Sign In</h3> 
<form method="post" class="needs-validation" action="{{ route('auth.signin') }}">
  <div class="form-group{{ ($errors->has('email')) ? ' required':''}}">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{ Request::old('email') ?: ''}}" class="form-control" id="validationCustom01" aria-describedby="emailHelp" placeholder="Enter email">
    @if($errors->has('email'))
        <span class="form-text">{{$errors->first('email')}}  </span>
     @endif
     
  </div>
  
  <div class="form-group ">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"  invalid class="form-control" id="exampleInputPassword1" placeholder="Password">
    @if($errors->has('password'))
        <span class="form-text">{{$errors->first('password')}}  </span>
     @endif
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" name="remember" for="exampleCheck1">Remember Me </label>
  </div>
  <button type="submit" class="btn btn-primary">Sign In</button>
  <input type="hidden" name="_token" value="{{Session::token()}}">
</form>




@stop