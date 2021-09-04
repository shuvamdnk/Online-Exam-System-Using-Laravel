var myQuestions = [

@foreach($fetch as $q)
 
  {
    question: "{{$q->question}}",
    answers: {
      a: '{{$q->option_a}}',
      b: '{{$q->option_b}}',
      c: '{{$q->option_c}}',
      d: '{{$q->option_d}}'
    },
    correctAnswer: '{{$q->answer}}'
  }

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
    resultsContainer.innerHTML ="<input id='marks' type='number' value='"+numCorrect+"' readonly/>"  + ' out of ' + questions.length;
  }

  // show questions right away
  showQuestions(questions, quizContainer);
  
  // on submit, show results
  submitButton.onclick = function(){
    showResults(questions, quizContainer, resultsContainer);
  }

}

