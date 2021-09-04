@extends('majorproject.faculty.header')

@section('content')
<div class="container-fluid">
	
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > Chapters</p>

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
    <h5 class="text-info">CHAPTER</h5>

      <form method="post" action="{{route('chapter.create')}}">
        @csrf
    <div class="row p-3 shadow-sm bg-white">
      <div class="col-md-3 py-2">
         <div class="{{ $errors->has('subject_id') ? ' has-error' : ''}}">
        <select class="form-control shadow-sm bg-light " data-live-search="true" data-size="5" name="subject_id" title="Select Subject">
             <option selected disabled value="">Select Subject</option>
            @foreach($subject as $sub)
            <option value="{{$sub->id}}">{{$sub->subject_name}} ({{$sub->subject_code}}) /{{$sub->semester}}</option>
            @endforeach
          </select>
        </div>
            <span>
            <strong class="text-danger">{{ $errors->first('subject_id') }}</strong>
          </span>
      </div>

      <div class="col-md-3 py-2">
        <div class="{{ $errors->has('chapter_name') ? ' has-error' : ''}}">
         <input type="text" class="form-control shadow-sm bg-light" placeholder="Enter Chapter Name" name="chapter_name">
       </div>
            <span>
            <strong class="text-danger">{{ $errors->first('chapter_name') }}</strong>
          </span>
      </div>

      <div class="col-md-3 py-2">
          <button type="submit" class="btn btn-success btn-block shadow-sm">ADD CHAPTER</button>
      </div>

    </div>
  </form>
  </div>



<div class="row my-2">
  <div class="col-md-12">
    <div class="scrollmenu">
  <table class="table table-hover shadow-sm" id="example" style="background-color: #ffff;">
  <thead class="shadow bg-info text-light">
    <tr>
<!--       <th scope="col">Chapter ID</th> -->
      <th scope="col">Subject Name</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Chapter Name</th>
       <th width="10%">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($chapter as $data)
    <tr>
<!--       <td>{{$data->id}}</td> -->
      <td>{{$data->subject_name}}</td>
      <td>{{$data->subject_code}}</td>
      <td>{{$data->chapter_name}}</td>
       <td><a href="{{route('chapter.delete',['id'=>$data->id])}}" class="btn btn-danger btn-block shadow-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
<!--- Data table script -->
<!-- <script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
 --><!---End Data table script -->
<!--- list search script --->
<!-- <script type="text/javascript">
      $(".chosen").chosen();
</script> -->
<!---End list search script --->
@endsection