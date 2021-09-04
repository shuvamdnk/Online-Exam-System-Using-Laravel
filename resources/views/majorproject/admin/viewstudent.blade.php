@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
  
  <div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Students</p>
</div>


<h5 class="text-info">STUDENT DETAILS</h5>

  <div style="display: flex; justify-content: space-between;">
  <input class="form-control shadow-sm rounded col-sm-8 col-md-6 col-lg-4 bg-white" id="mysearch" type="text" placeholder="Search..">

   <button class="shadow-sm btn btn-success" style="float:left; margin-bottom: 10px;" onclick="location.href='{{route('student.insert')}}'">ADD STUDENT</button>
   </div>

 


   
	<div class="row">
		<div class="col-md-12">
      <div class="scrollmenu">
  <table class="table shadow-sm bg-white">
  <thead class="bg-info text-light shadow">
    <tr>
     <!--  <th scope="col">ID</th> -->
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    <!--   <th scope="col">Password</th> -->
      <th scope="col">Stream</th>
      <th scope="col">Semester</th>
      <th scope="col">Session</th>
      <th scope="col">Section</th>
      <th scope="col">Status</th>
      <th scope="col" width="5%">EDIT</th>
      <th scope="col" width="5%">DELETE</th>
    </tr>
  </thead>
  <tbody id="myTable">
  	@foreach($student as $s_data)
    <tr>
    <!--   <td>{{$s_data->id}}</td> -->
      <td>{{$s_data->student_name}}</td>
      <td>{{$s_data->roll_number}}</td>
      <td>{{$s_data->student_email}}</td>
      <td>{{$s_data->phone_number}}</td>
     <!--  <td>{{$s_data->password}}</td> -->
      <td>{{$s_data->stream_name}}</td>
      <td>{{$s_data->semester}}</td>
      <td>{{$s_data->session}}</td>
      <td>{{$s_data->section}}</td>
        
      @if(Cache::has('user-online-' . $s_data->id))
          <td><p class="badge badge-pill badge-success shadow-sm">Online</p></td>
      @else
            <td><p class="badge badge-pill badge-danger shadow-sm">Offline</p></td>
      @endif

      <td><a href="{{route('student.edit',['id'=>$s_data->id])}}" class="shadow-sm btn btn-warning text-white btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td><a href="{{route('student.delete',['id'=>$s_data->id])}}" class="shadow-sm btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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