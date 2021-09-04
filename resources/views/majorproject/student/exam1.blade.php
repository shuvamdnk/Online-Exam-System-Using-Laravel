<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta name="apple-mobile-web-app-title" content="CodePen">
<title>Exam</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://storage.googleapis.com/chydlx/plugins/dlx-quiz/css/main.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="{{('/css/style2.css') }}">
   <link rel="stylesheet" type="text/css" href="{{('/css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<!--    <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script> -->

<style>

#score{
  outline: none;
  box-shadow: none;
  border:none;
  width:50px;
  font-weight: bold;
}

#total_q{
  outline: none;
  box-shadow: none;
  border:none;
  width:50px;
  font-weight: bold;
}

#quiz1 {
  width: auto;
  background: #fff;
  padding: 2rem;
  border-radius: 3px;
}
#test-submit{
  margin: 20px;
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
</head>
<body  onmousemove="openFullscreen();"  translate="no" onmouseover="getInputValue();">

 <section id="nav-ber">
   <nav>
      <div class="nav-wrapper">
       <center>
          <span  style="color:blue;font-size:20px ;">Time Left: </span><span id="display" style="color:#FF0000;font-size:20px;"></span>
       </center>
      </div>
   <!--   <button class="btn btn-light"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button> -->
<!-- <button onclick="closeFullscreen();"   class="btn btn-light"><span class="iconify" style="font-size: 26px;" data-icon="mdi-fullscreen-exit" data-inline="false"></span></button> -->
   </nav>
 </section>

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3">
  <form action="{{route('test.over')}}" id="MCQuestion">
    @csrf
    <input type="hidden" name="student_id" value="{{Auth::guard('student')->user()->id}}">
    <input type="hidden" name="test_id" value="{{$test->id}}">
    <input type="hidden" id="your_score" name="score" value="0">
    <input type="hidden" id="Total_question" name="total_question" value="0">
    <input type="hidden"  name="exam_status" value="disabled">

     <div><span id="display" style="color:#FF0000;font-size:15px"></span></div>
            <div><span id="submitted" style="color:#FF0000;font-size:35px"></span>
     </div>

     <button type="submit" id="test-submit" class="btn btn-success" style="float: right;" onclick="getInputValue();">Submit Test</button>

  </form>
</div>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-12">
<div id="quiz1"></div>
</div>
</div>
</div>




<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<!-- <script src='https://storage.googleapis.com/chydlx/plugins/dlx-quiz/js/main.js'></script> -->

<script src="{{('/js/quiz.js') }}"></script>

<script id="rendered-js">
$("#quiz1").dlxQuiz({
  quizData: {
    questions: [
    @foreach($fetch as $q)
    {     
      q:
      '{!! $q->question !!}',
      a: "{!! $q->answer !!}",
      options: [
      "{!! $q->option_a !!}",
      "{!! $q->option_b !!}",
      "{!! $q->option_c !!}",
      "{!! $q->option_d !!}"
      ]
    },
   @endforeach
  ] 
    } });
//# sourceURL=pen.js
    </script>
   
    <!------- Auto Submit form code --------->
<script>
            var div = document.getElementById('display');
            var submitted = document.getElementById('submitted');

              function CountDown(duration, display) {

                        var timer = duration, minutes, seconds;

                      var interVal=  setInterval(function () {
                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;
                    display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";
                            if (timer > 0) {
                               --timer;
                            }else{
                       clearInterval(interVal)
                                SubmitFunction();
                             }

                       },1000);

                }

              function SubmitFunction(){
                document.getElementById('MCQuestion').submit();
               }
              
              CountDown(({{$test->test_duration}}),div);  
             
            </script>
            <!-------End Auto Submit form code --------->


            <script>
               function getInputValue(){
                // Selecting the input element and get its value 
               var inputVal = document.getElementById("score").value;
               var inputValq = document.getElementById("total_q").value;
               // Displaying the value
               document.getElementById("your_score").value = inputVal;
               document.getElementById("Total_question").value = inputValq;
              }
            </script>


      <script language="javascript" type="text/javascript">
     document.onkeydown = function(){
     switch (event.keyCode){
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false;
        case 82 : //R button
            if (event.ctrlKey){ 
                event.returnValue = false;
                event.keyCode = 0;
                return false;
            }
    }
}
</script>


   <!----- full screen js --->
<script>
var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
</script>
<!---- End full screen js --->




</body>
</html>
