@extends('majorproject.student.header')

@section('content')

      <div class="container mt-4 bg-white shadow-sm mb-5 rounded p-2">
        <div style="display: flex;">
          <div style="width: 50%; background-color: #FFDAE0;">
           <label for="upload" id="img-label"><i class="fa fa-camera" aria-hidden="true"></i></label> 

            <img id="img" src="https://joeschmoe.io/api/v1/
           {{Auth::guard('student')->user()->student_name}}" height="150" width="150" class="bg-light shadow-5 m-2">

           <input type="file" id="upload" hidden onchange="preview_image(event)"/>
          </div>

          <div style="width: 50%;background-color: #D6E8FF;">
            
          </div>
        </div>

        <form>
        <div class="row p-2">
          
          <div class="col-md-4 mt-2">
            <label class="text-primary">Name</label>
            <input type="text" class="form-control rounded bg-light shadow-sm" name="student_name" value="{{Auth::guard('student')->user()->student_name}}">
          </div>
          <div class="col-md-4 mt-2">
            <label class="text-primary">Roll Number</label>
            <input type="number" class="form-control rounded bg-light shadow-sm" name="roll_number" value="{{Auth::guard('student')->user()->roll_number}}">
          </div>
          <div class="col-md-4 mt-2">
            <label class="text-primary">Email</label>
            <input type="email" class="form-control rounded bg-light shadow-sm" name="student_email" value="{{Auth::guard('student')->user()->student_email}}">
          </div>
          <div class="col-md-4 mt-2">
            <label class="text-primary">Phone Number</label>
            <input type="number" class="form-control rounded bg-light shadow-sm" name="phone_number" value="{{Auth::guard('student')->user()->phone_number}}">
          </div>
           <div class="col-md-4 mt-2">
            <label class="text-primary">Stream</label>
            @foreach($stream as $st)
            <input type="text" class="form-control rounded bg-light shadow-sm" name="stream_name" value="{{$st->stream_name}}" readonly>
            @endforeach
          </div>
          <div class="col-md-4 mt-2">
            <label class="text-primary">Semester</label>
            <input type="text" class="form-control rounded bg-light shadow-sm" name="semester" value="{{Auth::guard('student')->user()->semester}}">
          </div> 
          <div class="col-md-4 mt-2">
            <label class="text-primary">Session</label>
            <input type="text" class="form-control rounded bg-light shadow-sm" name="session" value="{{Auth::guard('student')->user()->session}}" readonly>
          </div>
           <div class="col-md-4 mt-2">
            <label class="text-primary">Section</label>
            <input type="text" class="form-control rounded bg-light shadow-sm" name="section" value="{{Auth::guard('student')->user()->section}}" readonly>
          </div>

          <div class="col-md-4" style="margin-top:42px;">
            <button type="button" id="ghdiv1" class="btn btn-danger shadow-5"  data-toggle="modal" data-target="#exampleModal">Update Profile</button>
           <button type="submit" id="ghdiv" class="btn btn-success shadow-5">Update Profile</button>
          </div>
         
        </div>
        </form>

         
  </div>



<style>
  #ghdiv{
    display: none;
    border: none;
    outline: none;
  }
  #ghdiv1{
    border: none;
    outline: none;
  }
  #exampleModal .modal-footer{
    background-color: #FFF2EB;
    border:none;
    outline: none;
    border-radius: 0px 0px 10px 10px;
  }
  #exampleModal{
    border-radius: 10px;
  }
  #exampleModal .modal-header{
    border: none;
    outline: none;
  }
  #exampleModal .modal-title{
    color: #FA555A;
  }
  #exampleModal .modal-footer button{
    border: none;
    outline: none;
  }
  #img-label{
  background-color: #FF8084;
  color: #ffff;
  padding: 5px 8px 5px 8px;
  border-radius: 50%;
  cursor: pointer;
  margin-top: 7.5rem;
  margin-left: 6.5rem;
  position: absolute;
}
 #img{
  border-radius: 50%; 
  margin-bottom: 20px; 
  padding: 5px; 
  border:2px solid #7DCEA0;
  object-fit: cover;
 }
 .row .col-md-4 label{
  font-weight: bold;
 }
 .row .col-md-4 input:focus {
  border:2px solid #64A1FF;
 }
</style>
 


<script>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('img');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script> 

<!----- hide button for specific time ----->
<!-- <script>
    setTimeout(function(){
        $('#ghdiv').fadeIn('fast');
    },3000);
</script> -->
<!------ end --->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Access Denied</h5>
      </div>
      <div class="modal-body">
        <h5>You Can Edit Your Profile After : <i id="demo"></i></h5>
      </div>
      <div class="modal-footer">
      <button class="btn btn-danger shadow-5 rounded" type="button" data-dismiss="modal">
        Close
      </button>
      </div>
    </div>
  </div>
</div>
<!------ End modal------>




<!------ real time timer ----->
<script>
// Set the date we're counting down to
var countDownDate = new Date("Dec 15,2022 11:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
   clearInterval(x);
   document.getElementById("demo").innerHTML = "Complete";
   document.getElementById("ghdiv").style.display = "block";
   document.getElementById("ghdiv1").style.display = "none";
  }
}, 1000);
</script>
<!----- End real time timer ---->



@endsection  