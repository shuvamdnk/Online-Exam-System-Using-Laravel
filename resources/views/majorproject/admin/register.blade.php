@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Admin</p>

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

 

  

  <!---- insert form  -->

 <div class="container">
  <h5 class="text-info">ADD NEW ADMIN</h5>
    <form method="post" action="{{route('admin.create')}}" id="demo-form">
        @csrf 
   <div class="row my-1 shadow-sm pt-3 pb-3 rounded" style="background-color: #ffff;">
     <div class="col-md-3 py-1">
         <div class="{{ $errors->has('username') ? ' has-error' : ''}}">
          <input type="text" class="form-control shadow-sm bg-light" id="name" onkeypress="return AvoidSpace(event)" aria-describedby="emailHelp" placeholder="Enter Username" name="username" autocomplete="off" >
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
        <button type="submit" class="btn btn-success btn-block shadow-sm rounded" id="add-btn">ADD ADMIN</button>
     </div>

          
   </div>
 </form>
 </div> 


<!------- view details table---->
  
  <div class="row my-2">
    <div class="col-md-12 mt-3">
      <div class="scrollmenu">
       <table class="table table-hover shadow-sm" style="background-color: #ffff;">
  <thead class="shadow bg-info text-light">
    <tr>
   <!--    <th scope="col">ID</th> -->
      <th scope="col">Username</th>
      <th scope="col">Status</th>
      <th width="10%">EDIT</th>
      <th width="10%">DELETE</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($admin as $data)
    <tr>
    <!--   <td>{{$data->id}}</td> -->
      <td>{{$data->username}}</td>
       
      @if(Cache::has('user-' . $data->id))
        <td><p class="badge badge-pill badge-success shadow-sm">Online</p></td>
      @else
          <td><p class="badge badge-pill badge-danger shadow-sm">Offline</p></td>
      @endif

      <td><a href="{{route('admin.edit',['id'=>$data->id])}}" class="btn btn-warning btn-block text-white shadow-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
     </a></td>
      <td><a href="{{route('admin.delete',['id'=>$data->id])}}" class="btn btn-danger shadow-sm btn-block" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
     @endforeach
  </tbody>
</table>
    </div>
  </div>
</div>
</div>
@endsection