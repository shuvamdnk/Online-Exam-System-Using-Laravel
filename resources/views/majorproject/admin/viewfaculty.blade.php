@extends('majorproject.admin.header')

@section('content')

<div class="container-fluid">
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Faculties</p>

  <h5 class="text-info">FACULTIES</h5>

 
  
  <div style="display: flex; justify-content: space-between;">
  <input class="form-control shadow-sm rounded col-sm-8 col-md-6 col-lg-4 bg-white" id="mysearch" type="text" placeholder="Search..">

   <button class="shadow-sm btn btn-success" style="float:left; margin-bottom: 10px;" onclick="location.href='{{route('A_addfaculty')}}'">ADD FACULTY</button>
   </div>
 
  
	<div class="row">
   
	<div class="col-md-12">
   <div class="scrollmenu">
  <table class="table table-hover bg-white shadow-sm">
  <thead class="bg-info shadow text-light">
    <tr>
    <!--   <th scope="col">ID</th> -->
      <th scope="col">Faculty Name</th>
      <th scope="col">Username</th>
       <th width="10%">Profile Picture</th>
      <th scope="col">Status</th>
      <th scope="col" width="5%">EDIT</th>
      <th scope="col" width="5%">DELETE</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($fac as $f_data)
    <tr>
      <!-- <td>{{$f_data->id}}</td> -->
      <td>{{$f_data->faculty_name}}</td>
      <td>{{$f_data->faculty_username}}</td>
      <td>
        <img src="/storage/avatars/{{$f_data->avatar}}" class="rounded-circle shadow-sm" width="50" height="50" style="object-fit:cover; border:2px solid #51D327;  padding:2px;">
      </td>
      @if($f_data-> isOnline())
      <td><p class="badge badge-pill badge-success shadow-sm">Online</p></td>
       @else
       <td><p class="badge badge-pill badge-danger shadow-sm">Offline</p></td>
       @endif

      <td><a href="{{route('edit',['id'=>$f_data->id])}}" class="shadow-sm btn btn-warning btn-block"><i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i>
     </a></td>
      <td><a href="{{route('delete',['id'=>$f_data->id])}}" class="shadow-sm btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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