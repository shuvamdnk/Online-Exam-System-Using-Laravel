@extends('majorproject.admin.header')
 
@section('content')

<div class="container">

  <!--  @if(\Session::has('notfound'))
   <p><i class="fa fa-check-circle" aria-hidden="true"></i> {{ \Session::get('notfound') }}</p>
  @endif -->


  



	<center><input type="text" id="searchInput" class="form-control shadow-sm col-md-4" placeholder="find keyword"></center>

<div id="playground">
	<div class="row">

  <div class="col-md-8 offset-md-2 shadow-sm rounded bg-white">
    @forelse ($found as $f)
    <h4>Search Result For<i style="color: #F87C7C;">"{{$search}}"</i></h4>
    @empty
    <h4>No result found.</h4>
    @endforelse
  </div>

  @foreach($found as $f)
		<div class="col-md-8 offset-md-2 shadow-sm rounded bg-white">
      <a href="{{route('student.edit',['id'=>$f->id])}}" style="float: right; font-weight: bolder; font-size: 20px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			<p><span class="badge badge-success">STUDENT</span></p>
              <p>Name:     <a href="{{route('student.show',['id'=>$f->id])}}">{{$f->student_name}}</a></p>
              <p>Roll:     {{$f->roll_number}}</p>
              <p>Stream:     {{$f->stream_name}}</p>
              <p>Semester:     {{$f->semester}}</p>
              <p>Gmail:     {{$f->student_email}}</p>
              <p>Phone Number:     {{$f->phone_number}}</p>
		</div>
		@endforeach


		@foreach($found1 as $f1)
		<div class="col-md-8 offset-md-2 shadow-sm rounded bg-white">
			<p><span class="badge badge-primary">FACULTY</span></p>
              <p>Name:     <a href="{{route('faculty.show',['id'=>$f1->id])}}">{{$f1->faculty_name}}</a></p>
              <p>Username:     {{$f1->faculty_username}}</p>
		</div>
		@endforeach



    @foreach($found2 as $f2)
    <div class="col-md-8 offset-md-2 shadow-sm rounded bg-white">
      <p><span class="badge badge-info">STREAM</span></p>
              <p>{{$f2->stream_name}}</p>
    </div>
    @endforeach



    @foreach($found3 as $f3)
    <div class="col-md-8 offset-md-2 shadow-sm rounded bg-white">
      <p><span class="badge badge-warning">SUBJECT</span></p>
              <p>Subject Name:     {{$f3->subject_name}}</p>
              <p>Code:     {{$f3->subject_code}}</p>
              <p>Stream:     {{$f3->stream_name}}</p>
              <p>Semester:     {{$f3->semester}}</p>
    </div>
    @endforeach




     @foreach($found4 as $f4)
    <div class="col-md-8 offset-md-2 shadow-sm rounded bg-white">
      <p><span class="badge badge-danger">CHAPTER</span></p>
              <p>Chapter Name:     {{$f4->chapter_name}}</p>
              <p>Subject Name:     {{$f4->subject_name}}</p>
              <p>Code:     {{$f4->subject_code}}</p>
              <p>Stream:     {{$f4->stream_name}}</p>
              <p>Semester:     {{$f4->semester}}</p>
              
    </div>
    @endforeach


	</div>
</div>
	<style>
		h4{
			margin-top: 10px;
		}
    .container-fluid{
      padding:10px;
    }
		.col-md-8{
			/*background-color: #FFF1F1;*/
			color:#72A3FF;
			font-weight: bold;
			margin-top:8px;
			border-radius: 10px;
      padding:5px;
		}
       .col-md-8 p{
       	margin: 0;
       }
       #searchInput{
       	border:none;
       	outline: none;
       	box-shadow: none;
       	border-radius:5px;
       	background-color: #DAE7FF;
       	color: #4B7CD6;
       	padding-left: 15px;
       	font-weight: bold;
       }

	</style>

	<!----- Search result highlighter --->
<script src="{{url('/js/searchtexthighlighter.js')}}"></script>
<script>

  window.addEventListener("DOMContentLoaded", function(e) {
    var myHilitor2 = new Hilitor("playground");
    myHilitor2.setMatchType("left");
    document.getElementById("searchInput").addEventListener("keyup", function(e) {
      myHilitor2.apply(this.value);
    }, false);
  }, false);

</script>
</div>

@endsection