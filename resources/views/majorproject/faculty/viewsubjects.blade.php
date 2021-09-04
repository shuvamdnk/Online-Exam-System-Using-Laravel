@extends('majorproject.faculty.header')

@section('content') 

<div class="container-fluid">

  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > Subjects</p>

<h5 class="text-info">SUBJECTS</h5>
<input class="form-control shadow-sm rounded col-sm-8 col-md-6 col-lg-4 bg-white my-2" id="mysearch" type="text" placeholder="Search..">


	<div class="row">
<div class="col-md-12">
  <div class="scrollmenu">
  <table class="table table-hover shadow-sm bg-white">
 <thead class="bg-info shadow text-light">
    <tr>
      <th scope="col">Subject ID</th>
      <th scope="col">Stream Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Subject Code</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($subject as $sub_data)
     <tr>
       <td>{{$sub_data->id}}</td>
       <td>{{$sub_data->stream_name}}</td>
       <td>{{$sub_data->semester}}</td>
       <td>{{$sub_data->subject_name}}</td>
       <td>{{$sub_data->subject_code}}</td>
     </tr>
     @endforeach
  </tbody>
</table>
</div>
</div>
</div>

</div>

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

<!-- <script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->
<!-------  Table search script ----->



<script>
$(document).ready(function(){
  $("#mysearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!---- End table search script ---->
@endsection