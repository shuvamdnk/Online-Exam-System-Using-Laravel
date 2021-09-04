<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title> 


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

 .container .row .col-md-3 input:focus{
  border:2px solid #80B2FF;
 }

 #search-all{
  border: none;
  outline: none;
 }


 #search-all:focus{
  border:2px solid #80B2FF;
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



  <link rel="stylesheet" type="text/css" href="{{('/css/algolia_search.css') }}">

  <link rel="stylesheet" type="text/css" href="{{('/css/style.css') }}">
  <!-- <link rel="stylesheet" type="text/css" href="{{('/css/bootstrap.min.css') }}"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  

  
  <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">

  <!--- Chosen Class link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
  <!--- End chosen clsaa link -->    

  <!---- Tachyons link ---->
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
  <!---- End tachyons link ---->


  <!--- Toster -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.2/dist/simple-notify.min.css" />


  
</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="" id="sidebar-wrapper">
      <div class="sidebar-heading shadow bg-light" style="position: sticky; z-index:10; top: 0px; display: flex;">
         @if(Auth::guard('admin')->user()->avatar)
                  <a href="{{route('admin.profile')}}">  <img class="rounded-circle shadow-sm" src="/storage/avatars/{{ Auth::guard('admin')->user()->avatar }}" width="40" height="40" style="object-fit:cover; border:2px solid #51D327;  padding:2px;"  /> </a>
                    @endif
                     @if(Auth::guard('admin')->user()->avatar == null)
                   <a href="{{route('admin.profile')}}">    <img src="https://joeschmoe.io/api/v1/
           {{Auth::guard('admin')->user()->username}}" class="rounded-circle shadow-sm" width="40" height="40" style=" border:2px solid #ED1E1E; padding:2px; background-color:#FFE7E7;" /> </a>
                     @endif

         <p class="my-1 ml-1 text-truncate"> {{Auth::guard('admin')->user()->username}} </p>
           

      </div>
      <div class="list-group list-group-flush" style="position: sticky;  top: 55px;">
        
        <a href="{{route('admin')}}" class="list-group-item list-group-item-action  rounded shadow-sm">DASHBOARD</a>

        <a href="{{route('A_addstream')}}" class="list-group-item list-group-item-action  rounded shadow-sm">STREAMS</a>

        <a href="{{route('subject.view')}}" class="list-group-item list-group-item-action  rounded shadow-sm">SUBJECTS</a>

        <a href="{{route('student.view')}}" class="list-group-item list-group-item-action  rounded shadow-sm">STUDENTS</a>

        <a href="{{route('A_viewfaculty')}}" class="list-group-item list-group-item-action  rounded shadow-sm">FACULTIES</a>

        <a href="{{route('admin.register')}}" class="list-group-item list-group-item-action  rounded shadow-sm">ADMIN</a>

        <a href="{{route('notice.view')}}" class="list-group-item list-group-item-action  rounded shadow-sm">NOTICE</a>

        <a href="{{route('result.view')}}" class="list-group-item list-group-item-action  rounded shadow-sm">RESULTS</a>

        <a href="{{route('admin.profile')}}" class="list-group-item list-group-item-action  rounded shadow-sm">PROFILE</a>

        <a href="/telescope" class="list-group-item list-group-item-action  rounded shadow-sm">TELESCOPE</a>

        <a href="{{ route('logout.admin') }}" class="list-group-item list-group-item-action  rounded shadow-sm">LOGOUT</a>

     <!--    <a href="{{route('A_addfaculty')}}" class="list-group-item list-group-item-action  rounded shadow-sm">ADD FACULTY</a> -->

        <!-- <a href="{{route('student.insert')}}" class="list-group-item list-group-item-action  rounded shadow-sm">ADD STUDENT</a> -->
  

       <!--   <a href="{{route('admin.search')}}" class="list-group-item list-group-item-action  rounded shadow-sm">SEARCH</a> -->

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow" style="justify-content: space-between; position: sticky; z-index: 10; top: 0px;">

  <div style="display: flex;">
  
  <button class="btn bg-info text-light shadow-sm" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>

 <form action="{{route('admin.search.data')}}" method="get" role="search" style="display: flex;"> 
   {{ csrf_field() }}
  <input type="text" id="search-all" name="search" class="form-control aa-input-search shadow-sm bg-white rounded" autocomplete="off" placeholder="search..">

  <button type="submit" style="outline: none; border: none;" class="btn btn-success shadow-sm rounded"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>

</div>

</nav>


      <div class="container-fluid">
        @yield('content')
      </div>

  </div>
  <!--@@@@@@@@@@@@@@@@@ Java Script @@@@@@@@@@-->

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
    <!------ Password show hide Javascript ------->
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 </script>
<!------- End password Show Hide javascript ---->

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

<!---Data table js--->
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<!---End Data table js--->

<!-------  Table search script ----->
<script>
$(document).ready(function(){
  $("#mysearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!---- End table search script ---->

<!--- list search script --->
<script type="text/javascript">
      $(".chosen").chosen();
</script>
<!---End list search script --->

<!-- Auto upper case text -->
<script>
function myupper() {
  var x = document.getElementById("name");
  x.value = x.value.toUpperCase();
}
</script>
<!--END AUTO UPPER CASE TEXT --->

  <!---- Input limit js-------->
        <script>
     $(document).ready(function(){
           $('input#defaultconfig').maxlength()
           $('input#thresholdconfig').maxlength({
              threshold: 20,
              warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
           });
           $('input#moreoptions').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
            });
            $('input#alloptions').maxlength({
              alwaysShow: true,
              threshold: 10,
              warningClass: "badge label-success",
              limitReachedClass: "badge label-danger",
              separator: ' of ',
              preText: 'You have ',
              postText: ' chars remaining.'
            });
     });
     </script>
   <script src="{{'/dist/bootstrap-maxlength.js'}}"></script>
 <!------ End input limit js ------->    
<!---- tooltips---->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>
<!---End tooltips----->

<!---- No space inside input ---->
<script>
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}
</script>
<!----- end no space inside input ares --->




<!--hide loading js--->
<!-- <script>
  setTimeout(function() {
  $('.load').fadeOut('slow');
}, 3000); 
</script> -->
<script>
  $(document).ready(function () {
window.setTimeout(function() {
    $(".load").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>
<!-- End -hide loading js--->





<!------- hide alert js---->
<!-- <script>
  $(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
});
</script> -->
<!-------End  hide alert js---->





<!-------- Date Time Js ---->
<script>
/*I'll be cleaning this code up. There's definitely some redundancy in calling a new Date() object, for example*/

//create document ready function
$(document).ready(function(){

//create function to display the time
  function displayTime(){
//create variable currentTime and have the Date() object store computer's time
    var currentTime = new Date();
//create variables for hours, minutes, and seconds    
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds(); 
    var meridiem = " AM";

    if(hours>11){
      hours = hours - 12;
      meridiem = " PM";
    }
    if(hours === 0){
      hours = 12;
    }
    if (hours<10){
      hours = "0" + hours;
    }
    if (minutes<10){
      minutes = "0" + minutes;
    }
    if (seconds<10){
      seconds = "0" + seconds;
    }
    $("#clock").text(hours + ":" + minutes + ":" + seconds +  meridiem);
    //set variable to change clockDiv in HTML
    //var clockDiv = document.getElementById('clock');

    //innerText to set text inside an HTML element
    //clockDiv.innerText = hours + ":" + minutes + ":" + seconds + meridiem;
  }
  function displayDay(){
    var currentDay = new Date();
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var day = days[currentDay.getDay()];
    $("#day").text(day);
  } 
  function displayDate(){
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var date = currentDate.getDate();
    var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var month = months[currentDate.getMonth()];
    if (date<10){
      date = "0" + date;
    }

    $("#date").text(month +" "+ date +" "+ year);
  }
  displayTime();
  setInterval(displayTime, 1000);
  displayDay();
  displayDate();

});
</script>
<!------- End Date Time js ----->

<!------ get current year js--->
<script>
 
  var year = new Date().getFullYear();
  var preyear = year - 1;
   document.getElementById('year').value =preyear +'-'+ year;
</script>
<!------- end get current year js code --->


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
   
    <script src="{{('/js/algolia_search.js') }}"></script>



     <!------Sweet Alerts ---->

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <script>
      @if(\Session::has('successlog'))
      swal("{{ \Session::get('successlog') }}");
      @endif

      @if(\Session::has('success'))
      swal({
        title: "{{ \Session::get('success') }}",
        text: "You clicked the button!",
        icon: "success",
        button: "Close",
      });
      @endif

      @if(\Session::has('warning'))
      swal({
        title: "{{ \Session::get('warning') }}",
        text: "You clicked the button!",
        icon: "warning",
        button: "Close",
      });
      @endif

      @if(\Session::has('deniad'))
      swal({
        title: "{{ \Session::get('deniad') }}",
        icon: "error",
        button: "Close",
      });
      @endif
    </script> -->



    <!--- Toster --->
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.2/dist/simple-notify.min.js"></script>

    <script>
      @if(\Session::has('deniad'))
         new Notify ({
          status: 'error',
          // title: '{{ \Session::get('deniad') }}',
          title: 'Permission Denied!',
          text: '',
          effect: 'fade',
          speed: 300,
          customClass: null,
          customIcon: null,
          showIcon: true,
          showCloseButton: true,
          autoclose: true,
          autotimeout: 3000,
          gap: 20,
          distance: 20,
          type: 3,
          position: 'top-right'
        })

      @endif


      @if(\Session::has('success'))
         new Notify ({
          status: 'success',
          title: '{{ \Session::get('success') }}',
          text: '',
          effect: 'fade',
          speed: 300,
          customClass: null,
          customIcon: null,
          showIcon: true,
          showCloseButton: true,
          autoclose: true,
          autotimeout: 3000,
          gap: 20,
          distance: 20,
          type: 3,
          position: 'top-right'
        })
      @endif

      @if(\Session::has('warning'))
      new Notify ({
        status: 'warning',
        title: '{{ \Session::get('warning') }}',
        text: '',
        effect: 'fade',
        speed: 300,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 20,
        distance: 20,
        type: 3,
        position: 'top-right'
      })
      @endif

      @if(\Session::has('successlog'))
      new Notify ({
          status: 'success',
          title: '{{ \Session::get('successlog') }}',
          text: '',
          effect: 'fade',
          speed: 300,
          customClass: null,
          customIcon: null,
          showIcon: true,
          showCloseButton: true,
          autoclose: true,
          autotimeout: 3000,
          gap: 20,
          distance: 20,
          type: 3,
          position: 'top-right'
        })
      @endif

    </script>


</body>
</html>