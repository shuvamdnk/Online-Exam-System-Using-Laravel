<!DOCTYPE html>
<html>
<head>
	<title>quiz</title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{('/exam/style.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body onmousemove="openFullscreen();" onmousedown = 'return false' onselectstart = 'return false'>

<form action="{{route('test.over')}}" id="MCQuestion" style="position: sticky; top:0; z-index: 10;">
    @csrf
    <input type="hidden" name="student_id" value="{{Auth::guard('student')->user()->id}}">
    <input type="hidden" name="test_id" value="{{$test->id}}">
    <input type="hidden" id="your_score" name="score" value="0">
    <input type="hidden" id="Total_question" name="total_question" value="0">
    <input type="hidden"  name="exam_status" value="disabled">

	<nav class="navbar navbar-light bg-light shadow-sm mb-5">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#"><div><span id="display"></span></div></a>
	    <button type="submit" id="submit" class="btn rounded my-1 shadow-sm">Submit Test</button>
	  </div>
	</nav>
</form>




	<div class="container my-5">
		<div id="quiz"></div>
		<div id="results"></div>
	</div>

<!-- @foreach($fetch as $q)
  <p>{!! $q->question !!}</p>
     {{$q->option_a}}
     {{$q->option_b}}
     {{$q->option_c}}
     {{$q->option_d}}
@endforeach -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
var myQuestions = [

@foreach($fetch as $q)
  {
    question: '{{$no++}}) {!! $q->question !!}',
    answers: {
      a: '{!! $q->option_a !!}',
      b: '{!! $q->option_b !!}',
      c: '{!! $q->option_c !!}',
      d: '{!! $q->option_d !!}'
    },
    correctAnswer: '{{$q->answer}}'
  },
@endforeach
];

var quizContainer = document.getElementById('quiz');
var resultsContainer = document.getElementById('results');
var submitButton = document.getElementById('submit');

generateQuiz(myQuestions, quizContainer, resultsContainer, submitButton);

function generateQuiz(questions, quizContainer, resultsContainer, submitButton){

  function showQuestions(questions, quizContainer){
    // we'll need a place to store the output and the answer choices
    var output = [];
    var answers;

    // for each question...
    for(var i=0; i<questions.length; i++){
      
      // first reset the list of answers
      answers = [];

      // for each available answer...
      for(letter in questions[i].answers){

        // ...add an html radio button
   
        answers.push(
          '<label class="col-md-12 my-2 shadow-sm p-2 rounded" id="optin">'
            + '<input type="radio" class="form-check-input mx-3" name="question'+i+'" value="'+letter+'">'
            + letter + ': '
            + questions[i].answers[letter]
          + '</label>'
        );
      }

      // add this question and its answers to the output
      output.push(
        '<div class="question col-md-12 shadow-sm p-2 bg-light my-2 rounded border border-info"><h4><b>' + questions[i].question + '</b></h4></div>'
        + '<div class="answers col-md-12 mb-5">' + answers.join('') + '</div> <hr>'
      );
    }

    // finally combine our output list into one string of html and put it on the page
    quizContainer.innerHTML = output.join('');
  }


  function showResults(questions, quizContainer, resultsContainer){
    
    // gather answer containers from our quiz
    var answerContainers = quizContainer.querySelectorAll('.answers');
    
    // keep track of user's answers
    var userAnswer = '';
    var numCorrect = 0;
    
    // for each question...
    for(var i=0; i<questions.length; i++){

      // find selected answer
      userAnswer = (answerContainers[i].querySelector('input[name=question'+i+']:checked')||{}).value;
      
      // if answer is correct
      if(userAnswer===questions[i].correctAnswer){
        // add to the number of correct answers
        numCorrect++;
        
        // color the answers green
        answerContainers[i].style.color = '#00E259';
      }
      // if answer is wrong or blank
      else{
        // color the answers red
        answerContainers[i].style.color = '#FF1D1D';
      }
    }

    // show number of correct answers out of total
    resultsContainer.innerHTML ="<input id='score' type='hidden' value='"+numCorrect+"' readonly/>"+' out of '+"<input id='total_q' type='hidden' value='"+ questions.length+"' readonly/>";
  }

  // show questions right away
  showQuestions(questions, quizContainer);
  
  // on submit, show results
  submitButton.onclick = function(){
    showResults(questions, quizContainer, resultsContainer);
    var inputVal = document.getElementById("score").value;
    var inputValq = document.getElementById("total_q").value;
               // Displaying the value
    document.getElementById("your_score").value = inputVal;
    document.getElementById("Total_question").value = inputValq;
  }

}
</script>

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

        <script>
        	 setTimeout(function() {
		        $('#submit').trigger('click');
		      }, ({{$test->test_duration}}+1)*1000);
        </script>



        <script>
         function deselectableRadios(rootElement) {
			  if(!rootElement) rootElement = document;
			  if(!window.radioChecked) window.radioChecked = null;
			  window.radioClick = function(e) {
			    const obj = e.target;
			    if(e.keyCode) return obj.checked = e.keyCode!=32;
			    obj.checked = window.radioChecked != obj;
			    window.radioChecked = obj.checked ? obj : null;
			  }
			  rootElement.querySelectorAll("input[type='radio']").forEach( radio => {
			    radio.setAttribute("onclick", "radioClick(event)");
			    radio.setAttribute("onkeyup", "radioClick(event)");
			  });
			}
		deselectableRadios();
        </script>

        
        <!--- Disable Right click -->
        <script>
        	document.oncontextmenu = new Function("return false;");
        </script>


        <!--- Disable Browser F5 button -->
	    <script type = "text/javascript">  
		    window.onload = function () {  
		        document.onkeydown = function (e) {  
		            return (e.which || e.keyCode) != 116;  
		        };  
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
        // document.getElementById("submit").click();
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