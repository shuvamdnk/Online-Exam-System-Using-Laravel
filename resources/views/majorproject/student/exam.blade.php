<!DOCTYPE html>
<html>
<head>
   <title>Online Exam</title>
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="{{('/css/style2.css') }}">
   <link rel="stylesheet" type="text/css" href="{{('/css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <section id="nav-ber">
   <nav>
      <div class="nav-wrapper">
        <div class="brand-logo"><span id="time">60:00</span> minute</div>
      </div>
   </nav>
</section>


   <section id="details">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">
           <div class="row">
             <div class="col-md-12" id="candidate-details">
               <h3>Shuvam Dutta</h3>
               <h3>Reg No : 123456789</h3>
             </div>
             <div class="col-md-12">
               <button class="btn btn-secondary" id="1">1</button>
               <button class="btn btn-secondary">2</button>
               <button class="btn btn-secondary">3</button>
               <button class="btn btn-secondary">4</button>
               <button class="btn btn-secondary">5</button>
               <button class="btn btn-secondary">6</button>
               <button class="btn btn-secondary">7</button>
               <button class="btn btn-secondary">8</button>
               <button class="btn btn-secondary">9</button>
               <button class="btn btn-secondary">10</button>
               <button class="btn btn-secondary">11</button>
               <button class="btn btn-secondary">12</button>
               <button class="btn btn-secondary">13</button>
               <button class="btn btn-secondary">14</button>
               <button class="btn btn-secondary">15</button>
             </div>
             <div class="col-md-8">
               <button class="btn btn-success" type="button">1</button>
               <samp class="text-success">Answer checked</samp>
                <button class="btn btn-danger" type="button">1</button>
               <samp class="text-danger">Answer Unchecked</samp>
                <button class="btn btn-warning" type="button">1</button>
               <samp class="text-warning">Mark as review</samp>
                <button class="btn btn-secondary" type="button">1</button>
               <samp>Not attend</samp>
             </div>
           </div>
         </div>
         <div class="col-md-9">
          <div class="col-md-12"> <h4><i>Q1: </i>What is your name What is your name What is your name What is your name What is your name What is your name What is your name What is your name What is your name?</h4></div>
      <form>
      <div class="form-group">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label></div>
    </div>

    <div class="form-group">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio2">Toggle this custom radio</label></div>
    </div>

    <div class="form-group">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio3">Toggle this custom radio</label></div>
    </div>

    <div class="form-group">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
      <label class="custom-control-label" for="customRadio4">Toggle this custom radio</label></div>
    </div>

    <div class="form-group">
     <button class="btn btn-primary" type="button"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
     <button type="reset" class="btn btn-success" id="reset"><i class="fa fa-repeat" aria-hidden="true"></i></button>
    <button class="btn btn-warning" id="mark" type="button"><i class="fa fa-thumb-tack" aria-hidden="true"></i></button>
    <button class="btn btn-primary" type="button"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
    </div>
           </form>
         </div>
       </div>
     </div>
   </section>



</body>
<!-- timer --->
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 60,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>
<!--######### RadioButton Color Change ########-->
<!-- <script>
  function uncheck() {
  if(document.getElementByClassName(".form-group input:radio").checked = false){
   document.getElementById("1").style.background = "#DF0000";
   document.getElementById("1").style.color = "#ffff";
 }
}
</script>   -->
<script>
document.getElementById("1").style.background = "#DF0000";
document.getElementById("1").style.color = "#ffff";
</script>  

<script>
$(document).ready(function() {
  $('.form-group input:radio').change(function() {
   document.getElementById("1").style.background = "#5CC24E";
   document.getElementById("1").style.color = "#ffff";
  });
});
$(document).ready(function() {
  $('#reset').click(function() {
   document.getElementById("1").style.background = "#DF0000";
   document.getElementById("1").style.color = "#ffff";
  });
});
$(document).ready(function() {
  $('#mark').click(function() {
   document.getElementById("1").style.background = "#F4720C";
   document.getElementById("1").style.color = "#ffff";
  });
});
</script>
<style>
  .btn{
    outline: none;
    box-shadow: none;
    border:none;
  }
  #candidate-details{
    background-image: linear-gradient(to bottom,#ffff,#D3D3D3);
  }
</style>
</html>