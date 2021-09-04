<!DOCTYPE html>
<html>
<head>
   <title>Online Exam</title>
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   <link rel="stylesheet" type="text/css" href="{{('/css/style2.css') }}">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---- Tachyons link ---->
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
  <!---- End tachyons link ---->
   <style>
    body{
      background-color: #ffff;
    }
    footer{ 
        position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
  height: auto;
  background-color: #FFEEEE;
    }
  </style>
</head>
<body>
<section id="nav-ber">
   <nav>
      <div class="nav-wrapper shadow-5" style="height:60px;">
         <a href="#!" class="brand-logo"><img  style="margin-top: 8px;" src="https://miro.medium.com/proxy/1*IQ9laxKlEm6CodFOZIbgLQ.png" width="120"></a>
      </div>
   </nav>
 </section>

<!-- <section id="register" style="margin: 7px 10px -5px 10px; padding: 0;background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)) , url('https://racolblegal.com/wp-content/uploads/2016/03/edn-1.jpg'); border-radius: 10px; color: #ffff;">
<marquee behavior="scroll" direction="left"><h2>IF YOU ARE A STUDENT REGISTER YOURSELF AND LOGIN TO TAKE EXAM </h2></marquee>
</section> -->

    <!--   <section id="notification-section">
      <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
           
            <div class="col-md-4">
    
              @if(count($errors) > 0)
  <div class="alert alert-danger shadow-5 br3 slide-top">
   <ul style="list-style: none;">
   @foreach($errors->all() as $error)
    <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif

            </div>
          </div>
     </section> -->

<!-- <section>
  <div class="container-fluid">

    
</div>
</section> -->

<section id="content1">
  <div class="row center-block row justify-content-center align-items-center" id="start-exam">
    <div class="col-md-3 center-block row justify-content-center align-items-center" id="login-panel">
      <a href="#" data-toggle="modal" data-target="#AdminLoginModal"><i class="fa fa-user-secret" aria-hidden="true"></i></a>
    </div>
    <div class="col-md-3 center-block row justify-content-center align-items-center"  id="login-panel">
       <a href="#" data-toggle="modal" data-target="#FacultyLoginModal"><i class="fa fa-users" aria-hidden="true"></i></a>

    </div>
    <div class="col-md-3 center-block row justify-content-center align-items-center"  id="login-panel">
       <a href="#" data-toggle="modal" data-target="#RegistrationModal"><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
    </div>
  </div>

  <!--  <div class="row center-block row justify-content-center align-items-center" id="login-name-row">
    <div class="col-md-3 center-block row justify-content-center align-items-center" id="login-panel">
      <a href="{{route('exam')}}"><h3>ADMIN</h3>
    </div>
    <div class="col-md-3 center-block row justify-content-center align-items-center"  id="login-panel">
      <a href="#"><h3>TEACHERS</h3></a>
    </div>
    <div class="col-md-3 center-block row justify-content-center align-items-center"   id="login-panel" >
      <a href="{{route('student.test')}}"><h3>STUDENTS</h3></a>
    </div>
  </div> -->
</section>


<!--  <footer>
                  <p class="copy-right mb-3">Create by @Shuvam</p>
   </footer> -->
</body>
<!------ Modal ---->
<!----- REGISTRATION MODAL ----->
<div class="modal" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(100, 100, 100, 0.01); box-shadow: none;outline: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #F75440;">STUDENT REGISTRATION / <a href="#" data-toggle="modal" data-target="#LoginModal" style="color:#55E5FF; 
;" data-dismiss="modal">LOGIN</a></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="shadow-5">&times;</span>
        </button>
  
      </div>
      <form action="{{route('student.register')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Student Name</label>
          <input type="text" class="form-control shadow-sm" id="name" aria-describedby="emailHelp" placeholder="Enter Student Name" name="student_name" onkeyup="myupper()" value="{{old('student_name')}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Roll Number</label>
          <input type="number" class="form-control shadow-sm" placeholder="Roll number" name="roll_number" value="{{old('roll_number')}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control shadow-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="student_email" value="{{old('student_email')}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control shadow-sm" id="thresholdconfig" maxlength="10" aria-describedby="emailHelp" placeholder="Enter phone number" name="phone_number" value="{{old('phone_number')}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control shadow-sm" id="password" placeholder="Enter Password" name="password">

               <div class="progress progress-striped active" style="height:5px;">
                <div id="jak_pstrength" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Stream</label>
          <select  class="form-control shadow-sm" class="chosen" name="student_stream">
           <option value="">Select Stream</option>
            @foreach($stream as $s_stream)
            <option value="{{$s_stream->id}}">{{$s_stream->stream_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Semester</label>
          <select  class="form-control shadow-sm" class="chosen" name="semester">
            <option value="">Select Semester</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Session</label>
          <input type="number" class="form-control shadow-sm"  id="thresholdconfig" maxlength="4" aria-describedby="emailHelp" placeholder="Enter Session" name="session">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Section</label>
          <select class="form-control shadow-sm" class="chosen" name="section">
            <option value="">Select Section</option>
            <option>ALPHA</option>
            <option>BETA</option>
          </select>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger shadow-5" data-dismiss="modal">CLODE</button>
        <!-- <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#LoginModal" data-dismiss="modal">LOGIN</button> -->
        <button type="Submit" class="btn btn-success shadow-5">REGISTER</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!----END REGISTRATION MODAL------>

<!------LOGIN MODAL --->
<div class="modal" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(100, 100, 100, 0.01); box-shadow: none;outline: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #F75440;">STUDENT LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="shadow-5">&times;</span>
        </button>
      </div>
      <form action="{{route('student.login')}}" method="get">
      <div class="modal-body">
  <div class="form-group">
    <input type="number" class="form-control shadow-sm"  aria-describedby="emailHelp" placeholder="Enter Roll Number" name="roll_number">
  </div>
  <div class="form-group">
    <input type="password" class="form-control shadow-sm"  placeholder="Password" name="password">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger shadow-5" data-dismiss="modal">CLODE</button>
        <button type="submit" class="btn btn-success shadow-5">LOGIN</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--END LOGIN MODAL--->


<!------ADMIN LOGIN MODAL --->
<div class="modal" id="AdminLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(100, 100, 100, 0.01); box-shadow: none;outline: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #F75440;">ADMIN LOGIN / <!-- <a href="#" style="color:#40D6F7;" data-toggle="modal" data-target="#AdminRegisterModal" data-dismiss="modal">REGISTER</a> --> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="shadow-5">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.login')}}" method="post">
        @csrf
      <div class="modal-body">
  <div class="form-group">
    <input type="text" class="form-control shadow-sm"  aria-describedby="emailHelp" placeholder="Username" name="username" value="shuvam" autocomplete="off">
  </div>
  <div class="form-group">
    <input type="password" class="form-control shadow-sm" value="admin"  placeholder="Password" name="password">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger shadow-5" data-dismiss="modal">CLODE</button>
        <button type="submit" class="btn btn-success shadow-5">LOGIN</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--END ADMIN LOGIN MODAL--->


<!---- Admin Registration modal --->
<div class="modal" id="AdminRegisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(100, 100, 100, 0.01); box-shadow: none;outline: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #F75440;">ADMIN REGISTRATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="shadow-5">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.register.self')}}" method="post">
        @csrf
      <div class="modal-body">
  <div class="form-group">
    <input type="text" class="form-control shadow-sm"  aria-describedby="emailHelp" placeholder="Username" name="username" autocomplete="off">
  </div>
  <div class="form-group">
    <input type="password" class="form-control shadow-sm"  placeholder="Password" name="password">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger shadow-5" data-dismiss="modal">CLODE</button>
        <button type="submit" class="btn btn-success shadow-5">REGISTER</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!---- Admin Registration modal --->

<!----- Faculty Login Model ---->
<div class="modal" id="FacultyLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(100, 100, 100, 0.01); box-shadow: none;outline: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #F75440;">FACULTY LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="shadow-5">&times;</span>
        </button>
      </div>
      <form action="{{route('faculty.login')}}" method="post">
        @csrf
      <div class="modal-body">
  <div class="form-group">
    <input type="text" class="form-control shadow-sm"  aria-describedby="emailHelp" placeholder="Username" name="faculty_username" autocomplete="off">
  </div>
  <div class="form-group">
    <input type="password" class="form-control shadow-sm"  placeholder="Password" name="password">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger shadow-5" data-dismiss="modal">CLODE</button>
        <button type="submit" class="btn btn-success shadow-5">LOGIN</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!------ End Faculty Login Model ---->
<!-------End modal ---->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!---- Sweet Alertd --->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <script>
      @if(\Session::has('success'))
      swal("{{ \Session::get('success') }}");
      @endif

      @if(\Session::has('error'))
      swal({
        title: "{{ \Session::get('error') }}",
        //text: "You clicked the button!",
        icon: "error",
        button: "Close",
      });
      @endif



      @if(count($errors) > 0)
      swal({
        title: "All Fields Are Required",
        icon: "warning",
        button: "Close",
      });
      @endif
    </script>

 <!-------- PASSWORD STRENGTH CHECKING JS---->
    <script src="{{'/js/jaktutorial.js'}}"></script>
    <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery("#password").keyup(function() {
        passwordStrength(jQuery(this).val());
      });
    });
    </script>
 <!-------- END PASSWORD STRENGTH cHECKING jS ---->
          <!----Fade out js --->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".close").click(function(){
    $(".alert").fadeOut(1000);
  });
});
</script>
<!---End fadeout js --->


<!------- hide alert js---->
<!-- <script>
  setTimeout(function() {
  $('.alert').fadeOut('slow');
}, 3000); 
</script> -->
<script>
  $(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>
<!-------End  hide alert js---->


<!-- Auto upper case text -->
<script>
function myupper() {
  var x = document.getElementById("name");
  x.value = x.value.toUpperCase();
}
</script>
<!--END AUTO UPPER CASE TEXT --->

<style>
  .modal-header{
   background-color:#fff;
   border:none;
   position: sticky;
   z-index: 10;
   top: 0;
   border-radius: 10px;
  }


  .modal-footer{
    border:none;
    background-color:#FFEFF1;
    border-radius: 0px 0px 10px 10px;
  }
  .close{
    color:#D82727;
    font-weight: bold;
  }
  .close span{
    background-color: #ffff;
    padding: 0px 8px 3px 8px;
    border-radius: 50%
  }

  .modal .modal-body .form-control{
    outline: none;
    border:none;
    box-shadow: none;
    padding-left: 10px;
    background-color: #F4F4F4;
  }
  .modal .modal-body .form-control:focus{
    border:2px solid #80B2FF;
  }
</style>
</html>