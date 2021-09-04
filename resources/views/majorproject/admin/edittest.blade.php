@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">

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
  <div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > <a href="{{route('result.view')}}">Result</a> >Text > Edit</p>
  </div>



  
  <div class="container">
  <h5 class="text-info">EDIT TEST</h5>
	<form method="post" action="{{route('update.test',['id'=>$test->id])}}" class="shadow-sm rounded bg-white p-3">
				@csrf 
        <label class="text-primary badge badge-pill badge-light shadow-sm">Test Visibility</label>
		<div class="row my-3 pb-3 rounded" >
       <div class="col-md-2">
			  <div class="form-group">
			     <div class="{{ $errors->has('visibility') ? ' has-error' : ''}}">
			    <select class="form-control shadow-sm rounded bg-light" name="visibility">
			    	<option selected disabled value="">Select Option</option>
			    	<!-- <option>{{$test->visibility}}</option> -->
			        <option class="text-success" value="block">Show</option>
			    	<option class="text-danger" value="none">Hide</option>
			    
			    </select>
			</div>
			     @if ($errors->has('visibility'))
		          <span style="margin:0;">
		            <strong class="text-danger">{{ $errors->first('visibility') }}</strong>
		          </span>
		          @endif
			  </div>
        </div>
        <div class="col-md-2">
			  <button type="submit" class="btn btn-success shadow-sm rounded btn-block">Update</button>
			</div>
			  </div>
         </form>
	
</div>

	
</div>
@endsection