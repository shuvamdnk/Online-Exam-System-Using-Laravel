@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">

  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Streams</p>

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
  <h5 class="text-info">ADD STREAM</h5>
  <form action="{{route('stream.create')}}" method="post">    
        @csrf
	<div class="row mb-4 shadow-sm pt-3 pb-3 rounded" style="background-color: #ffff;">
		
			 <div class="col-md-3 py-2">
          <div class="{{ $errors->has('stream_name') ? ' has-error' : ''}}">
			    <input type="text" class="form-control shadow-sm bg-light" id="exampleInputPassword1" placeholder="Enter Stream Name" name="stream_name">
          </div>
            @if ($errors->has('stream_name'))
          <span>
            <strong class="text-danger">{{ $errors->first('stream_name') }}</strong>
          </span>
          @endif
			  </div>
 
         <div class="col-md-3 py-2">
			  <button type="submit" class="btn btn-success shadow-sm rounded btn-block">ADD STREAM</button>
      </div>
        
  </div>
 </form>
</div>

  <div class="mb-2">
  <input class="form-control shadow-sm rounded bg-white col-sm-8 col-md-6 col-lg-4" id="mysearch" type="text" placeholder="Search..">
  
  </div>


  <div class="row my-1">
<div class="col-md-12">
  <div class="scrollmenu">
  <table class="table table-hover shadow-sm bg-white">
  <thead class="shadow bg-info text-light">
    <tr>
   <!--    <th scope="col">Stream ID</th> -->
      <th scope="col">Stream Name</th>
      <!-- <th width="10%">Edit</th> -->
      <th width="10%">DELETE</th>
    </tr> 
  </thead>
  <tbody id="myTable">
    @foreach($stream as $s_stream)
    <tr>
    <!--   <td>{{$s_stream->id}}</td> -->
      <td>{{$s_stream->stream_name}}</td>
      <!-- <th><a  href="" id="editStreambtn" data-toggle="modal" data-target="#editstream" data-id="{{$s_stream->id}}" class="btn btn-outline-warning btn-block shadow-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th> -->

      <!-- <td>
        <button type="button" id="editstreambtn" class="btn btn-warning btn-block shadow-sm text-white" value="{{$s_stream->id}}" data-bs-toggle="modal" data-bs-target="#editstream">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>
      </td> -->

      <th><a href="{{route('stream.delete',['id'=>$s_stream->id])}}" class="btn btn-danger btn-block shadow-sm"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Button trigger modal -->


<div class="modal fade" id="editstream" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="outline: none;border:none;">
        <h5 class="modal-title" id="exampleModalLabel">Edit Stream</h5>
       <!--  <button type="button" class="btn-close btn-outline-danger shadow-sm" data-bs-dismiss="modal" aria-label="Close" style="border-radius: 50%; padding: 2px 3px 2px 3px;">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
        </button> -->
      </div>
  <form action="" method="post" id="streamdata">    
              @csrf
      <div class="modal-body">
      
             <div class="row mb-4">
          
               <div class="col-md-12 py-2">
                <div class="{{ $errors->has('stream_name') ? ' has-error' : ''}}">
                <input type="text" class="form-control shadow-sm bg-light" id="stream_name" placeholder="Enter Stream Name" name="stream_name">
                </div>
                @if ($errors->has('stream_name'))
                <span>
                  <strong class="text-danger">{{ $errors->first('stream_name') }}</strong>
                </span>
                @endif
               </div>
        </div>
      
      </div>
      <div class="modal-footer" style="border:none; outline: none; background-color: #FFF4F2;">
        <button type="button" class="btn btn-outline-secondary shadow-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-success shadow-sm">Update</button>
      </div>
       </form>
    </div>
  </div>
</div>






@endsection