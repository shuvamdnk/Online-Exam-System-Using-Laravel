@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">

  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Subjects</p>

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


<div class="container">
  <h5 class="text-info">SUBJECTS</h5>
   <form action="{{route('subject.create')}}" method="post">
      @csrf
  <div class="row mb-4 shadow-sm pt-3 pb-3 rounded" style="background-color: #ffff;">


    <div class="col-md-3 py-1">
       <div class="{{ $errors->has('stream_id') ? ' has-error' : ''}}">
       <select  class="form-control shadow-sm rounded bg-light"data-live-search="true"  class="chosen" name="stream_id" title="Select Stream">
          <option selected disabled value="">Select Stream</option>
            @foreach($stream as $s_stream)
            <option value="{{$s_stream->id}}">{{$s_stream->stream_name}}</option>
            @endforeach
          </select>
        </div>
         @if ($errors->has('stream_id'))
          <span>
            <strong class="text-danger">{{ $errors->first('stream_id') }}</strong>
          </span>
          @endif
    </div>

     <div class="col-md-3 py-1">
       <div class="{{ $errors->has('semester') ? ' has-error' : ''}}">
     <select class="form-control shadow-sm rounded bg-light"data-live-search="true" class="chosen"  name="semester" title="Select Semester">
        <option selected disabled value="">Select Semester</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
          </select>
        </div>
      @if ($errors->has('semester'))
          <span>
            <strong class="text-danger">{{ $errors->first('semester') }}</strong>
          </span>
          @endif
    </div>

      <div class="col-md-3 py-1">
       <div class="{{ $errors->has('subject_name') ? ' has-error' : ''}}">
    <input type="text" class="form-control shadow-sm rounded bg-light form-control shadow-sm rounded bg-light-sm" id="colFormLabelSm" placeholder="Enter subject name" name="subject_name">
        </div>
      @if ($errors->has('subject_name'))
          <span>
            <strong class="text-danger">{{ $errors->first('subject_name') }}</strong>
          </span>
          @endif
    </div>

     <div class="col-md-3 py-1">
       <div class="{{ $errors->has('subject_code') ? ' has-error' : ''}}">
  <input type="text" class="form-control shadow-sm rounded bg-light form-control" id="colFormLabelSm" placeholder="Enter subject code" name="subject_code">
        </div>
        @if ($errors->has('subject_code'))
          <span>
            <strong class="text-danger">{{ $errors->first('subject_code') }}</strong>
          </span>
          @endif
    </div>

    <div class="col-md-3 py-1">
       <button type="submit" class="btn btn-success btn-block shadow-sm rounded">ADD</button> 
    </div>


  </div>
</form>
</div>


<input class="form-control bg-white my-2 shadow-sm rounded col-sm-8 col-md-6 col-lg-4" id="mysearch" type="text" placeholder="Search..">


    
<div class="row my-1">
<div class="col-md-12">
  <div class="scrollmenu">
  <table class="table table-hover shadow-sm bg-white">
  <thead class="bg-info shadow text-light">
    <tr>
    <!--   <th scope="col">Subject ID</th> -->
      <th scope="col">Stream Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Subject Code</th>
      <th width="10%">DELETE</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($subject as $sub_data)
     <tr>
    <!--    <td>{{$sub_data->id}}</td> -->
       <td>{{$sub_data->stream_name}}</td>
       <td>{{$sub_data->semester}}</td>
       <td>{{$sub_data->subject_name}}</td>
       <td>{{$sub_data->subject_code}}</td>
       <td><a href="{{route('subject.delete',['id'=>$sub_data->id])}}" class="btn btn-danger btn-block shadow-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     </tr>
     @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection