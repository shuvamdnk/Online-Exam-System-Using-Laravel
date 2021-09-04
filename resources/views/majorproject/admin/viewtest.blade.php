@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
	
<div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > View Tests > @foreach($stream as $s){{$s->stream_name}}@endforeach</p>
</div> 

<h5 class="text-info">View Tests @foreach($stream as $s){{$s->stream_name}}@endforeach</h5>

	<div class="row">
 <div class="col-md-12">
  <div class="scrollmenu">
    <table class="table table-hover bg-white shadow-sm">
  <thead class="bg-info text-light shadow">
    <tr>
     <!--  <th scope="col">#</th> -->
      <th scope="col">Test Name</th>
      <th scope="col">Faculty Name</th>
      <th scope="col">Test Create Date</th>
       <th scope="col">Test Date</th>
      <th scope="col">Visibility Status</th>
      <th scope="col">EDIT</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($find as $f)
     <tr>
     <!--   <td>{{$f->id}}</td> -->
       <td>{{$f->test_name}}</td>
       <td>{{$f->faculty_name}}</td>
       <td>{{$f->test_create_date}}</td>
       <td>{{$f->test_date}}</td>

              @if($f->visibility == "block")
                 <td><span class="badge badge-success">Show</span></td>
              @else  
                  <td><span class="badge badge-danger">Hide</span></td>
              @endif 

       <td><a href="{{route('edit.test',['id'=>$f->id])}}" class="shadow-sm btn btn-primary btn-block">Edit</a></td>
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