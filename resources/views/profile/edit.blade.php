@extends('templates.default')
@section('content')
<h3>Update Profile</h3> 
<form method="post" class="needs-validation" action="{{ route('profile.edit') }}">
  <div class="form-group{{ ($errors->has('first_name')) ? ' required':''}}">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" name="first_name" value="{{Auth::user()->first_name ?: Request::old('first_name')}}" class="form-control" id="validationCustom01" aria-describedby="emailHelp" placeholder="Enter first name">
    @if($errors->has('first_name'))
        <span class="form-text">{{$errors->first('first_name')}}  </span>
     @endif
  
  </div>

  <div class="form-group{{ ($errors->has('last_name')) ? ' required':''}}">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" name="last_name" value="{{Auth::user()->last_name ?: Request::old('last_name')}}" class="form-control" id="validationCustom01" aria-describedby="emailHelp" placeholder="Enter last name">
    @if($errors->has('last_name'))
        <span class="form-text">{{$errors->first('last_name')}}  </span>
     @endif
     
  </div>

  <div class="form-group{{ ($errors->has('location')) ? ' required':''}}">
    <label for="exampleInputEmail1">Location</label>
    <input type="text" name="location" value="{{Auth::user()->location ?: Request::old('location')}}" class="form-control" id="validationCustom01" aria-describedby="emailHelp" placeholder="Enter Location">
    @if($errors->has('location'))
        <span class="form-text">{{$errors->first('location')}}  </span>
     @endif
     
  </div>
  <div class="form-group">
    <input type="file" name="profile_pic"  placeholder="change picture" accept="image/*">
        </div>
  
 
  <button type="submit" class="btn btn-primary">Edit</button>
  <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
<div class="media">

<a class="pull-right" href="{{route('profile.index',['username'=>$user->username])}}">
 <img class="media-object" alt="{{$user->getNameOrUsername()}}" src="{{$user->profile_pic}}"> 
 </a>
<div class="media-body">
<h4 class="media-heading"><a href="{{route('profile.index',['username'=>$user->username])}}">{{$user->getNameOrUsername()}}</a><h4>
</div>
</div>

<!-- <img src="{{$user->profile_pic}}" class="rounded float-right" alt="{{Auth::user()->getNameOrUsername()}}"> -->


@stop

