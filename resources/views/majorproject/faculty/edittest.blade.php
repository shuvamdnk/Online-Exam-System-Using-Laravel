@extends('majorproject.faculty.header')

@section('content')
<div class="container">
	<h3 align="center">EDIT TEST</h3>
  <div>
  <p><a href="{{route('faculty')}}">Dashboard </a> > <a href="{{route('test.view')}}"> Tests</a> > <i>Edit ({{$test->test_name}})</i></p>
</div>
<link href="{{('/css/mdtimepicker.css')}}" rel="stylesheet" type="text/css">

 <form action="{{route('test.update',['id'=>$test->id])}}" method="post">
  @csrf
     <div class="row">

       <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Test ID</label>
          <input type="test" name="faculty_id" value="{{$test->id}}" placeholder="Test Name" class="form-control shadow-sm" readonly>
      </div>

       <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Faculty ID</label>
          <input type="test" name="faculty_id" value="{{Auth::guard('faculty')->user()->id}}" placeholder="Test Name" class="form-control shadow-sm" readonly>
      </div>

      <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Test Name</label>
          <input type="text" name="test_name" placeholder="Test Name" class="form-control shadow-sm" value="{{$test->test_name}}">
      </div>


     	<div class="col-lg-6 mb-12 offset-lg-3">
        <label>Stream</label>

     	 <input type="text" class="form-control shadow-sm" name="stream_id" value="{{$test->stream_id}}" readonly>
     	</div>


          <div class="col-lg-6 mb-12 offset-lg-3">
               <label>Subject</label>
               <input type="text" class="form-control shadow-sm" name="subject_id" value="{{$test->subject_id}}" readonly>
          </div>

          <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Number Of Question</label>
          <input type="text" name="No_of_q" class="form-control shadow-sm" id="number_of_questions" value="{{$test->No_of_q}}">
          </div>
           
           <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Right Answer</label>
          <input type="text" name="right_a" class="form-control shadow-sm" value="{{$test->right_a}}" id="right_answer" onkeyup="Multipling()">
          </div>

          <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Wrond Answer</label>
          <input type="text" name="wrong_a" class="form-control shadow-sm" value="{{$test->wrong_a}}" id="wrong_answer">
          </div>
  
           

          <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Total Marks</label>
          <input type="number" name="total_marks" class="form-control shadow-sm"  id="total_marks" value="{{$test->total_marks}}" readonly>
          </div>

          <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Test Date</label>
          <input type="text" name="test_date" id="datepicker" value="{{$test->test_date}}" class="form-control shadow-sm" readonly>
          </div>
          

          <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Test Time</label>
          <input type="text" name="test_time" id="timepicker" value="{{$test->test_time}}" class="form-control shadow-sm" />
          </div>

           <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Test Status</label>
             <select class="form-control shadow-sm" name="test_status">
               <option>{{$test->test_status}}</option>
               <option>enabled</option>
               <option>disabled</option>
             </select>
          </div>

          <div class="col-lg-6 mb-12 offset-lg-3">
<!--           <label>Create Date</label> -->
          <input type="hidden" value="{{$test->test_create_date}}" name="test_create_date" class="form-control shadow-sm"  id="today" readonly />
          </div>

          <div class="col-lg-6 mb-12 offset-lg-3">
          <label>Test Duration</label>
          <input type="number" value="{{$test->test_duration}}" name="test_duration"  class="form-control shadow-sm" placeholder="Enter time in second" />
          </div>

          <div class="col-lg-6 mb-12 offset-lg-3" style="margin-top: 20px; margin-bottom: 20px;">
          <button type="submit" class="btn btn-success btn-block">Update Test</button>
          </div>
     </div>
     </form>

</div>

<style type="text/css">
     .col-lg-3{
          margin: 5px;
     }
     #datepicker{
          height: auto;
          color: blue;
     }
</style>

<!-------- Data Validation------>
<script type="text/javascript">
$(function() {
    $( "#datepicker" ).datepicker({ startDate: new Date()});
 });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<!---- End date Validation ----->

<!--------- Time picker JS ------>
<script src="{{('/js/mdtimepicker.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#timepicker').mdtimepicker(); //Initializes the time picker
  });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-------- end time picker JS --------->


<!--------- Multipling Number of question with right answer ----->
<script>
const a1 = document.querySelector('#number_of_questions')
const a2 = document.querySelector('#right_answer')
const fa = document.querySelector('#total_marks')
const answers = []

const _handleFinalAnswer = () => (fa.value = (+answers[0] || 0) * (+answers[1] || 0))

a1.addEventListener('keyup', e => {
  const { value } = e.target
  answers[0] = value
  
  _handleFinalAnswer()
})

a2.addEventListener('keyup', e => {
  const { value } = e.target
  answers[1] = value

  _handleFinalAnswer()
})
 </script> 
<!---------End  Multipling Number of question with right answer ----->

<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;

document.querySelector("#today2").valueAsDate = new Date();
</script>


@endsection	