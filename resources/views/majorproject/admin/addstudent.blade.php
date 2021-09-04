@extends('majorproject.admin.header')
 
@section('content')
<div class="container-fluid">
	
<p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Add Student</p>


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
	<h5 class="text-info">ADD NEW STUDENT</h5>
		<form action="{{route('student.create')}}" method="post">
				@csrf
	<div class="row my-1 shadow-sm pt-3 pb-3 rounded" style="background-color: #ffff;">
		<div class="col-md-3 py-1">
			<div class="{{ $errors->has('student_name') ? ' has-error' : ''}}">
                    <input type="text" class="form-control shadow-sm rounded bg-light" id="name" aria-describedby="emailHelp" placeholder="Enter Student Name" name="student_name" onkeyup="myupper()" value="{{old('student_name')}}">
			</div>
			 @if ($errors->has('student_name'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('student_name') }}</strong>
			    </span>
			    @endif
		</div>

		<div class="col-md-3 py-1">
			<div class="{{ $errors->has('roll_number') ? ' has-error' : ''}}">
                  <input type="number" class="form-control shadow-sm rounded bg-light" placeholder="Roll number" name="roll_number" value="{{old('roll_number')}}">
			   
			</div>
			 @if ($errors->has('roll_number'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('roll_number') }}</strong>
			    </span>
			    @endif
		</div>
        
        <div class="col-md-3 py-1">
        	<div class="{{ $errors->has('student_email') ? ' has-error' : ''}}">
        		<input type="email" class="form-control shadow-sm rounded bg-light" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="student_email" value="{{old('student_email')}}">
			   
        	</div>
        	 @if ($errors->has('student_email'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('student_email') }}</strong>
			    </span>
			    @endif
        </div>

         <div class="col-md-3 py-1">
        	<div class="{{ $errors->has('phone_number') ? ' has-error' : ''}}">
        		<input type="number" class="form-control shadow-sm rounded bg-light" id="thresholdconfig" maxlength="10" aria-describedby="emailHelp" placeholder="Enter phone number" name="phone_number" value="{{old('phone_number')}}">
			    
        	</div>
        	@if ($errors->has('phone_number'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('phone_number') }}</strong>
			    </span>
			    @endif
        </div>

        <div class="col-md-3 py-1">
        	<div class="{{ $errors->has('password') ? ' has-error' : ''}}">
        		 <input type="password" onkeypress="return AvoidSpace(event)" class="form-control shadow-sm rounded bg-light" id="password" placeholder="Enter Password" name="password">
			   
        	</div>
        	  @if ($errors->has('password'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('password') }}</strong>
			    </span>
			    @endif
        	 <div class="progress progress-striped active" style="height:5px;">
                <div id="jak_pstrength" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
			    <input type="checkbox" onclick="myFunction()">Show Password
        	
        </div>

         <div class="col-md-3 py-1">
        	<div class="{{ $errors->has('student_stream') ? ' has-error' : ''}}">
        	 <select  class="form-control shadow-sm rounded bg-light"data-live-search="true" class="chosen" name="student_stream" title="Select Stream">
        	 	<option selected disabled value="">Select Stream</option>
			    	@foreach($stream as $s_stream)
			    	<option value="{{$s_stream->id}}">{{$s_stream->stream_name}}</option>
			    	@endforeach
			    </select>
			   
        	</div>
        	 @if ($errors->has('student_stream'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('student_stream') }}</strong>
			    </span>
			    @endif
        </div>

        <div class="col-md-3 py-1">
        	<div class="{{ $errors->has('semester') ? ' has-error' : ''}}">
        	 <select  class="form-control shadow-sm rounded bg-light"data-live-search="true" class="chosen" name="semester" title="Select Semester">
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
        	<div class="{{ $errors->has('session') ? ' has-error' : ''}}">
        	  <input type="text"  class="form-control shadow-sm rounded bg-light"  id="thresholdconfig" aria-describedby="emailHelp" placeholder="Enter Session" name="session" value="">
			   
        	</div>
        	 @if ($errors->has('session'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('session') }}</strong>
			    </span>
			    @endif
        </div>

          <div class="col-md-3 py-1">
        	<div class="{{ $errors->has('section') ? ' has-error' : ''}}">
        	  <select class="form-control shadow-sm rounded bg-light"data-live-search="true" class="chosen" name="section" title="Select Section">
        	  	<option selected disabled value="">Select Section</option>
			    	<option>ALPHA</option>
			    	<option>BETA</option>
			    </select>
			   
        	</div>
        	 @if ($errors->has('section'))
			    <span>
			    	<strong class="text-danger">{{ $errors->first('section') }}</strong>
			    </span>
			    @endif
        </div>

        <div class="col-md-3 py-1">
        	 <button type="submit" class="btn btn-success shadow-sm rounded btn-block">ADD STUDENT</button>
        </div>

  
	</div>
	</form>
</div>

</div>

@endsection