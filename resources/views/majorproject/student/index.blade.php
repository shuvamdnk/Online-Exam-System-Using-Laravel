<!DOCTYPE html>
<html>
<head>
   <title>Online Exam</title>
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    #log{
      outline: none;
      border: none;
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
 
  
  <section id="content">
    <div class="row">
      <div class="col-md-8">
        <h2>TECHNO INDIA HOOGHLY</h2>
      <ul>
        <li>A Technical & Management College Under Techno India Group
Affiliated to M.A.K.A.U.T, WB formerly WBUT. Approved by AICTE and Accredited by TCS</li>
     <!--    <li>1500+ On and off campus drives annually</li>
        <li>2,000,000+ students have taken the AMCAT till date</li>
        <li>3 Lac+ Interview calls sent to AMCAT takers every month</li> -->
      </ul>
      <a id="log" href="{{route('login.all')}}" class="btn-success btn shadow-5">Login</a>
      </div>
    </div>
  </section>




 <!--   <footer>
       <p class="copy-right mb-3">Create by @Shuvam</p>
   </footer> -->
</body>
</html>

