@extends('majorproject.faculty.header')

@section('content')
<div class="container-fluid">
	
  <div>
  <p  class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > <a href="{{route('test.view')}}"> Tests</a> > <i>Result - @foreach($test_name as $tname) {{$tname->test_name}} @endforeach</i></p>
</div>
<h5 class="text-info">RESULTS</h5>
	<div class="row">
      <div class="col-md-12">
        <div class="scrollmenu">
  <table class="table table-hover shadow-sm bg-white">
  <thead class="bg-info shadow text-light">
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Score</th>
      <th scope="col">Total Questions</th>
      <th scope="col">Test Date</th>
    </tr>
  </thead>
  <tbody>
 @foreach($results as $resl)
             <tr>
              <td>{{$resl->student_name}}</td>
              <td>{{$resl->roll_number}}</td>
              <td>{{$resl->score}}</td>
              <td>{{$resl->total_question}}</td>
              <td>{{$resl->test_date}}</td>
            </tr>
@endforeach
  </tbody>
</table>
</div>
      </div>
	</div>	
<style>
  .container-fluid{
    padding: 5px;
  }
</style>

</div>
@endsection