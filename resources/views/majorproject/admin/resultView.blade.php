@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid"> 
  <div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > <a href="{{route('result.view')}}">Results</a> >@foreach($strm as $s) <i>{{$s->stream_name}}</i>@endforeach - {{$semester}} - {{$session}}</p>
</div>

<h5 class="text-info">RESULTS</h5>
   <div class="row">
    <div class="col-md-12">
        <div class="scrollmenu">
  <table class="table table-hover bg-white shadow-sm">
  <thead class="bg-info text-light shadow">
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Test Name</th>
      <th scope="col">Test Stream</th>
      <th scope="col">Test Sem</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Score</th>
      <th scope="col">Total Question</th>
      <th scope="col">Test Date</th>
      <th scope="col">Session</th>

    </tr>
  </thead>
  <tbody>
    @foreach($fetch as $f)
    <tr>
      <th scope="row">{{$f->student_name}}</th>
      <td>{{$f->roll_number}}</td>
      <td>{{$f->test_name}}</td>
      <td>{{$f->stream_name}}</td>
       <td>{{$f->semester}}</td>
      <td>{{$f->subject_name}}</td>
      <td>{{$f->subject_code}}</td>
      <td>{{$f->score}}</td>
      <td>{{$f->total_question}}</td>
      <td>{{$f->test_date}}</td>
      <td>{{$f->session}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
    </div>
  </div>

  <style>
  .container-fluid{
    padding:5px;
  }
</style>
</div>

@endsection