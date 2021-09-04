@extends('majorproject.student.header')

@section('content')



<div class="container-fluid">
  <h5 class="text-info">Results</h5>
  <div class="row">
    <div class="col-md-12">
      <div class="scrollmenu">
        <table class="table table-hover shadow-sm" style="background-color: #ffff;">
  <thead class="shadow bg-info text-light">
    <tr>
      <th scope="col">Test Name</th>
      <th scope="col">Stream</th>
      <th scope="col">Semester</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Your Score</th>
      <th scope="col">Total Qustions</th>
      <th scope="col">Test Date</th>
    </tr>
  </thead>
  <tbody>
   @foreach($result as $rsl)
    <tr>
      <td>{{$rsl->test_name}}</td>
      <td>{{$rsl->stream_name}}</td>
      <td>{{$rsl->semester}}</td>
      <td>{{$rsl->subject_name}}</td>
      <td>{{$rsl->subject_code}}</td>
      <td>{{$rsl->score}}</td>
      <td>{{$rsl->total_question}}</td>
      <td>{{$rsl->test_date}}</td>
    </tr>
   @endforeach

  </tbody>
</table>
{{ $result->links() }}
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