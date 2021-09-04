@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
	
  <div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Results</p>
</div>



<div class="container">
<h5 class="text-info">FIND TESTS AND RESULTS</h5>

<div class="row p-1 mb-3 shadow-sm pt-3 pb-3 rounded bg-white">
  @foreach($stream as $s_stream)
  <div class="col-md-3">
    <p hidden>{{$s_stream->id}}</p>
    <a href="{{route('view.test',['id'=>$s_stream->id])}}" class="btn btn-primary btn-block shadow-sm my-1">{{$s_stream->stream_name}}</a>
  </div>
  @endforeach
</div>




  <div class="row">

<p class="p-3 text-justify">Here in this search you can find all the results of a perticuler stream , semester and session(yesr) .Here <i class="text-danger font-weight-bold">stream</i> and <i class="text-danger font-weight-bold">semester</i> fetch the data from tests table , where tests table is connected with results table , and <i class="text-danger font-weight-bold">session</i> fetch the data from students table. If all the selected data are true you will get some result for that.If a student attend 2 exam for a perticuler semester you will get 2 result of that student.For example I am a student of BCA 2020 batch, if I attand 2 exam in my 6th semester you found my 2 result for 2 tests. If BCA 2020 batch has 120 students you will get total 240 results (each student has 2 result).</p>

    <div class="col-md-12">
      
    <form action="{{route('result.data')}}" method="post">
      @csrf
      <div class="row">
     <div class="col-md-2">
      <select  class="form-control shadow-sm my-3"data-live-search="true"  name="stream" title="Select Stream" required>
         <option selected disabled value="">Select Stream</option>
            @foreach($stream as $s_stream)
            <option value="{{$s_stream->id}}">{{$s_stream->stream_name}}</option>
            @endforeach
          </select>
     </div>

     <div class="col-md-2">
      <select  class="form-control shadow-sm my-3"data-live-search="true" name="semester" title="Select Semester" required>
            <option selected disabled value="">Select Semester</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
          </select>
     </div>

     <div class="col-md-2">
      <select  class="form-control shadow-sm my-3"data-live-search="true" name="session" title="Select Session" required>
            <option selected disabled value="">Select session</option>
            @foreach($session as $year)
            <option>{{$year->session}}</option>
            @endforeach
            
          </select>
     </div>

     <div class="col-md-2">
      <button class="btn btn-success btn-block shadow-sm my-3 rounded">Search</button>
     </div>

   </div>
   </form>
 </div>
 </div>

</div>
 <style>
   .container-fluid .row .col-md-12 form .row .col-md-2 .form-control{
    border:none;
    box-shadow: none;
    outline: none;
   }
   .container-fluid{
    padding:7px;
  }
 </style>
</div>


@endsection