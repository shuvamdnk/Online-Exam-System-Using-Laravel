<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Student</title> 


<style>
@keyframes rotate {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes rotate {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
.load {
  width: 25px;
  height: 25px;
  margin-left: 30px;
  border: solid 3px  #FF352E;
  border-radius: 50%;
  border-right-color: transparent;
  border-bottom-color: transparent;
  -webkit-transition: all 0.5s ease-in;
  -webkit-animation-name: rotate;
  -webkit-animation-duration: 1.0s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  transition: all 0.5s ease-in;
  animation-name: rotate;
  animation-duration: 1.0s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.dataTables.min.css">
  <script src="https://cdn.datatables.net/autofill/2.3.4/js/dataTables.autoFill.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" type="text/css" href="{{('/css/style.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">

  <!--- Chosen Class link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
  <!--- End chosen clsaa link -->    

  <!---- Tachyons link ---->
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
  <!---- End tachyons link ---->
   
   <!---- list search plugin bootstrap ----->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!--- End list search plugin bootstrap---->

  <style>
 .has-error{
    border:1px solid red;
    border-radius: 5px;
  }
  .row .form-control{
    outline: none;
    border: none;
  }
  .container-fluid{
    padding:5px;
  }
</style>
</head>

<body>


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="" id="sidebar-wrapper">
      <div class="sidebar-heading shadow bg-light" style="position: sticky; z-index:10; top: 0px; display: flex;">
         <a href="#"><img src="https://joeschmoe.io/api/v1/
{{Auth::guard('student')->user()->student_name}}" class="rounded-circle" width="37" height="37" style=" border:1px solid #ED1E1E; padding:1px;" /> </a>

         <p class="my-1 ml-1 text-truncate"> {{Auth::guard('student')->user()->student_name}} </p>
           

      </div>
      <div class="list-group list-group-flush">
        
        <a href="{{route('student.test')}}" class="list-group-item list-group-item-action shadow-sm">TESTS</a>

        <a href="{{route('student.result')}}" class="list-group-item list-group-item-action shadow-sm">RESULTS</a>

        <a href="{{route('student.profile')}}" class="list-group-item list-group-item-action shadow-sm">PROFILE</a>

          <a href="{{route('student.logout')}}" class="list-group-item list-group-item-action shadow-sm">LOGOUT</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow border-bottom" style="position: sticky; z-index:10; top: 0px; display: flex;">
        <button class="btn btn-outline-success shadow-sm" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>

         <div class="load"></div>

      </nav>

<!--       <section id="notification-section">
      <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
           
            <div class="col-md-4">
  @if(\Session::has('success'))
  <div class="alert alert-dismissible alert-success fade show shadow-5 br3 slide-top" id="alert">
   <p><i class="fa fa-check-circle" aria-hidden="true"></i> {{ \Session::get('success') }}</p>
  </div>
  @endif

    @if(\Session::has('complete'))
  <div class="alert alert-dismissible alert-warning fade show shadow-5 br3 slide-top" id="alert">
   <p><i class="fa fa-check-circle" aria-hidden="true"></i> {{ \Session::get('complete') }}</p>
  </div>
  @endif

    @if(\Session::has('check'))
  <div class="alert alert-dismissible alert-info fade show shadow-5 br3 slide-top" id="alert">
   <p><i class="fa fa-check-circle" aria-hidden="true"></i> {{ \Session::get('check') }}</p>
  </div>
  @endif
            </div>
          </div>
     </section> -->


     <div class="container-fluid">
        @yield('content')
      </div>



     </div>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


<script>
  $(document).ready(function () {
window.setTimeout(function() {
    $(".load").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".close").click(function(){
    $(".alert").fadeOut(1000);
  });
});
</script>
   <script>
  $(document).ready(function () {
 
    window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>


<!---- Sweet Alertd --->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <script>
      @if(\Session::has('success'))
      swal("{{ \Session::get('success') }}");
      @endif

      @if(\Session::has('complete'))
      swal({
        title: "{{ \Session::get('complete') }}",
        //text: "You clicked the button!",
        icon: "info",
        button: "Close",
      });
      @endif

      @if(\Session::has('check'))
      swal({
        title: "{{ \Session::get('check') }}",
        //text: "You clicked the button!",
        icon: "warning",
        button: "Close",
      });
      @endif

    </script>


<style>

  .alert-warning{
    outline: none;
  border:none;
  background: rgba(255, 127, 127, 0.9);
  color: #ffff;
  font-weight: bold;
  margin:2px;
  border-radius: none;
  padding: 15px 2px 2px 10px;

  }
  .alert-info{
    outline: none;
  border:none;
  background: rgba(177, 141, 255, 0.9);
  color: #ffff;
  font-weight: bold;
  margin:2px;
  border-radius: none;
  padding: 15px 2px 2px 10px;

  }
</style>

</body>
</html>