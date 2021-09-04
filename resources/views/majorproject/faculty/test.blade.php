@extends('majorproject.faculty.header')

@section('content')
<div class="container-fluid">
	
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

  <div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > <a href="{{route('test.view')}}"> Tests</a> > <i>Create Test</i></p>
</div>

<div class="container">
  <h5 class="text-info">CREATE TEST</h5>
  <form action="{{route('test.insert')}}" method="post">
  @csrf
  <div class="row my-1 shadow-sm pt-3 pb-3 rounded bg-white">
    <div class="col-md-3">
      <label>Faculty ID</label>
      <input type="number" name="faculty_id" value="{{Auth::guard('faculty')->user()->id}}" placeholder="Test Name" class="form-control shadow-sm bg-light rounded" readonly>
    </div>

    <div class="col-md-3">
      <label>Test Name</label>
          <input type="text" name="test_name" placeholder="Test Name" class="form-control shadow-sm bg-light rounded">
           <span>
            <strong class="text-danger">{{ $errors->first('test_name') }}</strong>
          </span>
    </div>
 
    <div class="col-md-3">
      <label>Stream</label>
        <select class="form-control shadow-sm bg-light rounded" data-size="5" name="stream_id" id="stream">
           <option selected disabled value="">Select Stream</option>
           @foreach($streams as $key => $stream)
        <option value="{{$key}}">{{$stream}}</option>
        @endforeach
        </select>
          <span>
            <strong class="text-danger">{{ $errors->first('stream_id') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Subject</label>
         <select class="form-control shadow-sm bg-light rounded"  name="subject_id" id="subject">
            <option selected disabled value="">Select Subject</option>
           </select>
          <span>
            <strong class="text-danger">{{ $errors->first('subject_id') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Number Of Question</label>
          <input type="text" name="No_of_q" class="form-control shadow-sm bg-light rounded" id="number_of_questions">
            <span>
            <strong class="text-danger">{{ $errors->first('No_of_q') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Right Answer</label>
          <input type="text" name="right_a" class="form-control shadow-sm bg-light rounded" id="right_answer" onkeyup="Multipling()">
            <span>
            <strong class="text-danger">{{ $errors->first('right_a') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Wrond Answer</label>
          <input type="text" name="wrong_a" class="form-control shadow-sm bg-light rounded" id="wrong_answer">
            <span>
            <strong class="text-danger">{{ $errors->first('wrong_a') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Total Marks</label>
          <input type="number" name="total_marks" class="form-control shadow-sm bg-light rounded"  id="total_marks" readonly>
    </div>

    <div class="col-md-3">
      <label>Test Date</label>
          <input type="text" name="test_date" id="datepicker" class="form-control shadow-sm bg-light rounded" readonly>
            <span>
            <strong class="text-danger">{{ $errors->first('test_date') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Test Time</label>
          <input type="text" name="test_time" id="timepicker" class="form-control shadow-sm bg-light rounded" />
            <span>
            <strong class="text-danger">{{ $errors->first('test_time') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <label>Test Status</label>
         <select class="form-control shadow-sm bg-light rounded" name="test_status">
           <option>enabled</option>
           <option>disabled</option>
          </select>
         <span>
            <strong class="text-danger">{{ $errors->first('test_status') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
       <label>Test Create Date</label>
        <input type="text" name="test_create_date" class="form-control shadow-sm bg-light rounded"  id="today" readonly />
    </div>

    <div class="col-md-3">
      <label>Test Duration</label>
        <input type="number" name="test_duration"  class="form-control shadow-sm bg-light rounded" placeholder="Enter time in second" />
            <span>
            <strong class="text-danger">{{ $errors->first('test_duration') }}</strong>
          </span>
    </div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-success btn-block shadow-5" style="margin-top: 35px;">Create Test</button>
    </div>


  </div>
  </form>
</div>

</div>

<style>
  .col-lg-3{
     margin: 5px;
  }
  #datepicker{
      height: auto;
      color: blue;
     }

  .container .row .col-md-3 label{
    color:#65A9FF;
    font-weight: bold;
  }   
</style>



<!--------- Dynamic Dependency ------->
<link rel="stylesheet" href="http://www.codermen.com/css/bootstrap.min.css">    
<script src="http://www.codermen.com/js/jquery.js"></script>
<script type="text/javascript">
    $('#stream').change(function(){
    var streamID = $(this).val();    
    if(streamID){
        $.ajax({ 
           type:"GET",
           url:"{{route('getsubject.test')}}?stream_id="+streamID,
           success:function(res){               
            if(res){
                $("#subject").empty();
                $("#subject").append('<option selected disabled value="">Select Subject</option>');
                $.each(res,function(key,value){
                    $("#subject").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#subject").empty();
            }
           }
        });
    }else{
        $("#subject").empty();
        $("#chapter").empty();
    }      
   });
</script>
<!--------- End Dynamic Dependency ------->

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