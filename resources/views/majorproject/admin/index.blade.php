@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
  
<h3 align="center" style="color:#FF1E66;">ADMIN DASHB<!--<a href="{{route('admin.useless')}}">-->O<!--</a>-->ARD</h3>
         <div style="color: blue; display: flex;margin: 0; padding: 0; justify-content: center;">
            <p>
              <h6 id="day" style="color: #FF1E66"></h6><i style="color: #ffff;">----</i>
              <h6 id="date" style="color: #FF1E66"></h6><i style="color: #ffff;">----</i>
              <h6 id="clock" style="color: #FF1E66"></h6>
           </p>
         </div> 
</div>
 
  <!--  <button class="btn purple btn-l no-shadow" onclick="Myfun();" id="btn">Push Notification</button> -->



  <style>
  .row .col-md-6 input{
    border:1px solid #FF1E66;
    outline: none;
    box-shadow: none;
    background-color: #E5E8E8 ;
    font-weight: bold;
    color: red;
        margin-top: 20px;
  }
  .row .col-md-6 button{
    border:none;
    outline: none;
    box-shadow: none;
    background-color: #FF1E66;
    color: #ffff;
    font-size: 17.5px;
        margin-top: 20px;
  }

  .container-fluid{
    padding: 5px;
  }
  </style>


   


   <script>
    function Myfun() {
  new Notify ({
    status: 'warning',
    title: 'Shuvam Dutta',
    text: 'Notify text lorem ipsum',
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
    type: 1,
    position: 'right top'
  })
    }
    
   </script>
</div>

@endsection