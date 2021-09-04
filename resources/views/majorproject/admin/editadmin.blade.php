@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
	
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > <a href="{{route('admin.register')}}">Admin</a> > Edit</p>

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
  <h5 class="text-info">{{$admin->username}}</h5>
    <form method="post" action="{{route('admin.update',['id' => $admin->id])}}">
        @csrf 
   <div class="row my-1 shadow-sm pt-3 pb-3 rounded bg-white">
     <div class="col-md-3 py-1">
         <div class="{{ $errors->has('username') ? ' has-error' : ''}}">
          <input type="text" class="form-control shadow-sm bg-light" id="name" onkeypress="return AvoidSpace(event)" aria-describedby="emailHelp" placeholder="Enter Username" value="{{$admin->username}}" name="username" autocomplete="off" >
         </div>
          @if ($errors->has('username'))
          <span>
            <strong class="text-danger">{{ $errors->first('username') }}</strong>
          </span>
          @endif
     </div>

     <div class="col-md-3 py-1">
         <div class="{{ $errors->has('password') ? ' has-error' : ''}}">
          <input type="password" id="password" onkeypress="return AvoidSpace(event)" class="form-control shadow-sm bg-light"  placeholder="Enter Password" name="password" >
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
        <button type="submit" class="btn btn-success btn-block shadow-sm rounded" id="add-btn">UPDATE</button>
     </div>

          
   </div>
 </form>
 </div> 


</div>  
@endsection