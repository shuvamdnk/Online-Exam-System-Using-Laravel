<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Faculty</title>

    <!---- search bar css --->
<style> 
#ex-search{
  width: 10px;
  box-sizing: border-box;
  font-size: 16px;
  background-image: url('https://cdn1.iconfinder.com/data/icons/hawcons/32/698956-icon-111-search-512.png');
  background-size: 20px 20px;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  border:none;
  outline: none;
  color: blue;
  background-color:#E9E9E9;
  border-radius: 4px;
}

#ex-search:focus {
  width: 100%;
}
</style>
<!--- End search bar css -->


  <!--- icon link --->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!---End icon link --->
  <!-- Data tabel -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.dataTables.min.css">
  <script src="https://cdn.datatables.net/autofill/2.3.4/js/dataTables.autoFill.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <!-- End Data table -->
  <link rel="stylesheet" type="text/css" href="{{('/css/style.css') }}">
 <!--  <link rel="stylesheet" type="text/css" href="{{('/css/bootstrap.min.css') }}"> -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
  <!--- Chosen Class link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
  <!--- End chosen clsaa link -->    

  <!---- list search plugin bootstrap ----->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!--- End list search plugin bootstrap---->
   <!---- Tachyons link ---->
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
  <!---- End tachyons link ---->
  <style>
    #menu-toggle{
      outline: none;
      border: none;
    }
    .container-fluid{
      padding: 5px;
    }
     .container .row .col-md-3 input:focus{
      border:2px solid #80B2FF;
    }
  </style>

  <!---- time picker --->
  <link href="{{('/css/mdtimepicker.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="" id="sidebar-wrapper">
      <div class="sidebar-heading text-truncate shadow bg-white" style="position: sticky; z-index:10; top: 0px; display: flex;">
         @if(Auth::guard('faculty')->user()->avatar)
                  <a href="{{route('faculty.profile')}}">  <img class="rounded-circle shadow-sm" src="/storage/avatars/{{ Auth::guard('faculty')->user()->avatar }}" width="40" height="40" style="object-fit:cover; border:2px  solid #51D327;  padding:2px;"  /> </a>
                    @endif
                     @if(Auth::guard('faculty')->user()->avatar == null)
                   <a href="{{route('faculty.profile')}}">    <img src="https://joeschmoe.io/api/v1/
           {{Auth::guard('faculty')->user()->faculty_name}}" class="rounded-circle shadow-sm" width="40" height="40" style=" border:2px solid #ED1E1E; padding:2px; background-color:#FFE7E7;" /> </a>
                     @endif
        
          <span class="ml-2 mt-1">{{Auth::guard('faculty')->user()->faculty_username}}</span>
      </div>

      <div class="list-group list-group-flush">

        <a href="{{route('faculty')}}" class="list-group-item list-group-item-action shadow-sm">DASHBOARD</a>

        <a href="{{route('subject.show')}}" class="list-group-item list-group-item-action shadow-sm">SUBJECT</a>

        <a href="{{route('chapter.index')}}" class="list-group-item list-group-item-action shadow-sm">CHAPTER</a>

     <!--    <a href="{{route('question.index')}}" class="list-group-item list-group-item-action shadow-sm">ADD QUESTIONS</a> -->

        <a href="{{route('question.view')}}" class="list-group-item list-group-item-action shadow-sm">QUESTIONS</a>

        <!-- <a href="{{route('test.index')}}" class="list-group-item list-group-item-action shadow-sm">CREATE TEST</a> -->

         <a href="{{route('test.view')}}" class="list-group-item list-group-item-action shadow-sm">TESTS</a>

         <a href="{{route('faculty.profile')}}" class="list-group-item list-group-item-action shadow-sm">PROFILE</a>

         <a href="{{route('logout.faculty')}}" class="list-group-item list-group-item-action shadow-sm">LOGOUT</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light border-bottom shadow bg-white" style="position: sticky; z-index:10; top: 0px; display: flex;">
        <button class="btn btn-outline-primary shadow-sm" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>


       <form action="#" method="get" role="search">
      {{ csrf_field() }}
      <input id="ex-search" class="col-12 form-control aa-input-search shadow-sm rounded" type="text" name="search" placeholder="Search.." autocomplete="off">
    </form>
 
      </nav>


 


          <!--  <section id="notification-section">
      <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
           
            <div class="col-md-4">
            @if(\Session::has('success'))
            <div class="alert  alert-success fade show shadow-5 br3 slide-top">
             <p><i class="fa fa-check-circle" aria-hidden="true"></i> {{ \Session::get('success') }}</p>
            </div>
            @endif
             @if(\Session::has('warning'))
            <div class="alert alert-warning shadow-5 br3 slide-top" style="background-color: #FCE9B3; border:1px solid #FCE9B3;">
             <p style="font-weight: bold;"><i style="color:red; font-weight: bold;">Warning :</i> {{ \Session::get('warning') }} <p class="text-danger font-weight-bold ">Atleast One Admin Need To Registered In The System</p></p>
            </div>
            @endif
            @if(\Session::has('deniad'))
  <div class="alert alert-warning shadow-5 br3 slide-top" style="background-color: #C70039; border:1px solid #C70039;">
   <p style="font-weight: bold; color: #FFFFB2;"><i style="color:#ffff; font-weight: bold;">Warning :</i> {{ \Session::get('deniad') }}<p class="text-light font-weight-bold ">Permission Deniad!</p></p>
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
    <!--End Menu Toggle Script -->



<!------- hide alert js---->
<script>
  setTimeout(function() {
  $('.alert').fadeOut('slow');
}, 3000); // <-- time in milliseconds
</script>
<!-------End  hide alert js---->




   <!--  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

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

     <!--- Toster -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.2/dist/simple-notify.min.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
   
    <script src="{{('/js/algolia_search.js') }}"></script>

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
   
</html>
