@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Add Faculty</p>

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
</div>

<div class="container">
  <h5 class="text-info">ADD NEW FACULTY</h5>
  <form method="post" action="{{route('create')}}" name="MCQuestion" id="MCQuestion">
      @csrf
  <div class="row my-1 shadow-sm pt-3 pb-3 rounded bg-white">
    <div class="col-md-3 py-1">
      <div class="{{ $errors->has('faculty_name') ? ' has-error' : ''}}">
      <input type="text" class="shadow-sm rounded bg-light form-control" id="name" onkeyup="myupper()" aria-describedby="emailHelp" placeholder="Enter Faculty Name" name="faculty_name" autocomplete="off" value="{{old('faculty_name')}}">
      </div>
       @if ($errors->has('faculty_name'))
          <span style="margin:0;">
            <strong class="text-light badge badge-danger">{{ $errors->first('faculty_name') }}</strong>
          </span>
          @endif
    </div>
    <div class="col-md-3 py-1">
      <div class="{{ $errors->has('faculty_username') ? ' has-error' : ''}}">
     <input type="teat" class="shadow-sm rounded bg-light form-control" placeholder="Enter Username" name="faculty_username" autocomplete="off" value="{{old('faculty_username')}}">
   </div>
           @if ($errors->has('faculty_username'))
          <span style="margin:0;">
            <strong class="text-light badge badge-danger">{{ $errors->first('faculty_username') }}</strong>
          </span>
          @endif
    </div>
    <div class="col-md-3 py-1">
      <div class="{{ $errors->has('password') ? ' has-error' : ''}}">
     <input type="password" id="password" onkeypress="return AvoidSpace(event)" class="shadow-sm rounded bg-light form-control"  placeholder="Enter Password" name="password" >
   </div>
           @if ($errors->has('password'))
          <span style="margin:0;">
            <strong class="text-light badge badge-danger">{{ $errors->first('password') }}</strong>
          </span>
          @endif


          <div class="progress progress-striped active" style="height:5px;">
          <div id="jak_pstrength" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
          </div>
          <input type="checkbox" onclick="myFunction()">Show Password
    </div>
    <div class="col-md-3 py-1">
      <button class="btn btn-success shadow-sm rounded btn-block">ADD</button>
    </div>
  </div>
</form>
</div>  
@endsection