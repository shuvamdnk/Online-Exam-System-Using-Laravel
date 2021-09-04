@extends('majorproject.admin.header')
 
@section('content')
<div class="container-fluid">

<p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Details-{{$student->student_name}}</p>
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
<h5 class="text-info">{{$student->student_name}}</h5>
	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
			<li class="list-group-item shadow-sm">NAME : {{$student->student_name}}</li>	
			<li class="list-group-item shadow-sm">ROLL NUMBER :  {{$student->roll_number}}</li>
			<li class="list-group-item shadow-sm">EMAIL : {{$student->student_email}}</li>
			<li class="list-group-item shadow-sm">PHONE NUMBEER : {{$student->phone_number}}</li>
           </ul>
		</div>
		<div class="col-md-6">
			<ul class="list-group">
				@foreach($find as $f)
				<li class="list-group-item shadow-sm">STREAM : {{$f->stream_name}}</li>
                 @endforeach
			<li class="list-group-item shadow-sm">CURRENT SEMESTER : {{$student->semester}}</li>
			<li class="list-group-item shadow-sm">SESSION : {{$student->session}}</li>
			<li class="list-group-item shadow-sm">SECTION : {{$student->section}}</li>

		
		   </ul>
		</div>




<div class="col-md-12">
	<h5 style="margin: 8px; color: skyblue; font-weight: bold;">Test Details</h5>
	<div class="scrollmenu">
	<table class="table table-hover shadow-sm bg-white">
  <thead class="bg-info text-light shadow">
    <tr>
      <th scope="col">Test Name</th>
      <th scope="col">Stream</th>
      <th scope="col">Semester</th>
      <th scope="col">Subject</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Score</th>
      <th scope="col">Total Question</th>
      <th scope="col">Test Date</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($result as $rslt)
    <tr>
      <th scope="row">{{$rslt->test_name}}</th>
      <td>{{$rslt->stream_name}}</td>
       <td>{{$rslt->semester}}</td>
      <td>{{$rslt->subject_name}}</td>
      <td>{{$rslt->subject_code}}</td>
      <td>{{$rslt->score}}</td>
      <td>{{$rslt->total_question}}</td>
      <td>{{$rslt->test_date}}</td>
    </tr>
    @endforeach
  </tbody>
</table> 
</div>
		</div>
	</div>

</div>
<style>
	ul .list-group-item{
		color:  #27AE60 ;
		font-weight: bold;
		margin-top: 10px;
		border:none;
		outline: none;
	}
	ul li:hover{
		background-color: #FFF4F4;
	}
	.container-fluid{
      padding:10px;
    }

    .row .col-md-6{
    	margin: 0;
    	padding: 0;
    }

    .row .col-md-12{
    	margin: 0;
    	padding: 0;
    }
</style>
@endsection