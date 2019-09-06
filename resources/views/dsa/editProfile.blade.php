
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
	<title>Update</title>

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

<div>
@if(Session::has('info'))
        <div class="alert alert-info" role="alert">
        {{ Session::get('info')}}


@endif
</div>

<div class="col-6">

    <form form method="post" class="needs-validation" action="{{ route('profile.post') }}" enctype="multipart/form-data">

    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">profession</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="profession" id="gridRadios1" value="student" checked>
            <label class="form-check-label" for="gridRadios1">
             Student
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="profession" id="gridRadios2" value="Tutor">
            <label class="form-check-label" for="gridRadios2">
              Tutor
            </label>
          </div>

        </div>
      </div>
    </fieldset>

    <div class="form-group row">
        <label for="inputPassword3" name="phone_number" class="col-sm-2 col-form-label">phone number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{Auth::user()->phone_number ?: Request::old('phone_number')}}"id="inputPassword3" placeholder="phone number">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3"  class="col-sm-2 col-form-label">first Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name ?: Request::old('first_name')}}" id="inputPassword3" placeholder="firstname">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name" value="{{Auth::user()->last_name ?: Request::old('last_name')}}" id="inputPassword3" placeholder="last Name">
        </div>
      </div>
      <div class="form-group">
    <input type="file"   name="file">
        </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      @csrf
    </div>
     <input type="hidden" name="_token" value="{{Session::token()}}">
  </form>
</div>

</body>
</html>
