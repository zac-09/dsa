<!DOCTYPE html>
<html>
<head>
	<title>academics.html</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ URL::to('academicstyle.css') }}">
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
  <div class="collapse navbar-collapse" id="collapsibleNavbar" >
    <ul class="navbar-nav ">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('zac.index') }}">Messages</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('academics') }}">Academics</a>
      </li>
<li class="nav-item">
        <a class="nav-link" href="{{ route('profile.index',['username'=>Auth::user()->username]) }}">Profiles</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<!-- Navbar end -->
<form action="{{ route('notes.post') }}" method="POST" enctype="multipart/form-data">
<button type="button" class="btn btn-primary btn-rounded btn-sm waves-effect waves-light float-right" onclick="showUpload()">Upload work</button>
  <div class="form-group basic-textarea" id="upload" style="display: none;">

    <div class="form-group">
        <input type="file" name="file">
            </div>
             <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">upload to server</button>



        <label class="control-label">Course unit:</label>
      <input  type="text" name="course_unit"  placeholder="Enter course unit">
      <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Category
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <legend class="col-form-label col-sm-2 pt-0">Category</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input  type="radio" name="type" id="gridRadios1" value="notes" >
        <label class="form-check-label" for="gridRadios1">
         Notes
        </label>
      </div>
      <div class="form-check">
        <input  type="radio" name="type" id="gridRadios1" value="slides" >
        <label class="form-check-label" for="gridRadios1">
         Slides
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="Text-books">
        <label class="form-check-label" for="gridRadios2">
          Text books
        </label>
      </div>
      </div>

  </ul>
</div>
    </div>
    </div>
    <input type="hidden" name="_token" value="{{ Session::token()}}">
</form>
<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Slides and notes</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Txt books</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Results</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                 @if(!$notes->count())

                                <p>there no slides yet</p>

                               @endif
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Course unit</th>
                                            <th>Author</th>
                                            <th>download</th>
                                        </tr>
                                    </thead>
                                     @foreach($notes as $slide)
                                    <tbody>
                                        <tr>
                                            <td>{{$slide->course_unit}}</td>
                                            <td>{{Auth::user()->getNameOrUsername()}}</td>
                                            <td> <a href="https://dsamulago.com/storage/notes/{{$slide->file_name}}">{{$slide->file_name}}</a></td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                               <table class="table" cellspacing="0">
                               @if(!$textbooks->count())

                                <p>there no text books yet</p>

                               @endif
                                    <thead>
                                        <tr>

                                            <th>Course unit</th>
                                            <th>Author</th>
                                            <th>download</th>
                                        </tr>
                                    </thead>
                                     @foreach($textbooks as $book)
                                    <tbody>
                                        <tr>
                                            <td>{{$book->course_unit}}</td>
                                            <td>{{Auth::user()->getNameOrUsername()}}</td>
                                            <td> <a href="https://dsamulago.com/storage/notes/{{$book->file_name}}">{{$book->file_name}}</a></td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Test set</th>
                                            <th>Date</th>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>

                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>

                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>
<script type="text/javascript">
    function showUpload() {
        var y = document.getElementById("upload")
        y.style.display = "block";
    }

</script>
</html>
