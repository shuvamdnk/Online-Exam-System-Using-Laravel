@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  
<div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Add Notice</p>
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

<div class="container">
  <h5 class="text-info">ADD NOTICE</h5>
<div  class="row shadow-sm pt-3 pb-3 rounded bg-white p-2">
 <form action="{{route('notice.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
<div class="col-md-6">
            <div class="form-group">
            <input type="text" name="title" value="" class="form-control shadow-sm bg-light" placeholder="Title">
            </div>
</div>
 <div class="col-md-6">
    <div class="container">
    <div class="input-group">
      <div class="custom-file">
        <input type="file" name="file[]" class="custom-file-input" id="inputGroupFile01" multiple required>
        <label style="color:#2698BA; font-weight: bold; background-color: #FFF2F2; outline: none; border:none;" class="custom-file-label shadow-sm" for="inputGroupFile01">Choose file</label>
      </div>
      <div class="input-group-prepend">
         <button type="submit" onclick="update()" class="btn btn-success btn-block shadow-sm">Upload</button>
      </div>
    </div>

   <!--  <span>
      <i class="text-primary font-weight-bold">FILE SIZE MUST BE UNDER 2MB</i>
    </span> -->
</div>
</div>
</div>
   </form>
</div>
   <!-- <div id="Progress_Status"> 
  <div id="myprogressBar"></div> 
</div>  -->
</div>




<!--  <input class="col-4 shadow-sm mb-2 rounded bg-light form-control" id="mysearch" type="text"  placeholder="Search..">   -->
<div class="mb-2 mt-3">
  <input class="form-control shadow-sm rounded bg-white col-sm-8 col-md-6 col-lg-4" id="mysearch" type="text" placeholder="Search..">
</div>


<div class="row text-center my-4" id="note">

<div class="col-md-12">
  <div class="scrollmenu">
  <table class="table table-hover shadow-sm bg-white">
  <thead class="shadow bg-info text-light">
    <tr>
      <th width="20%">Title</th>
      <th width="30%">Preview</th>
   <!--    <th width="10%">Date</th> -->
      <th width="10%">Time</th>
      <th width="10%">Download</th>
      <th width="10%">Delete</th>
    </tr> 
  </thead>
  <tbody id="myTable">
    @foreach($notice as $n)
    <tr>
      <td>{{$n->title}}</td>

      @if (pathinfo($n->file, PATHINFO_EXTENSION) == 'jpg' || pathinfo($n->file, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($n->file, PATHINFO_EXTENSION) == 'png')
      <td>
        <img src="{{ URL::to('/storage/public') }}/uploads/{{$n->file}}" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: contain;">

      </td>
      @endif

      @if (pathinfo($n->file, PATHINFO_EXTENSION) == 'doc' || pathinfo($n->file, PATHINFO_EXTENSION) == 'docx')
      <td>
       <img src="https://edtech4beginnerscom.files.wordpress.com/2016/03/logo_lockup_docs_icon_vertical_ela.png?crop">
     </td>
      @endif

       @if (pathinfo($n->file, PATHINFO_EXTENSION) == 'pdf')
        <td>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAgNEns2cLswbw1K2Ho5WovTshIkvQ0gbnuQ&usqp=CAU">
        </td>
        @endif

        @if (pathinfo($n->file, PATHINFO_EXTENSION) == 'mp4')
        <td>
         <video
          id="my-video"
          class="video-js"
          controls
          preload="auto"
          height="400"
          data-setup="{}"
          style="width: 100%; height: 200px;">
          <source src="{{ URL::to('/storage/public') }}/uploads/{{$n->file}}" type="video/mp4" />
        </video>
      </td>
        @endif

      <!-- <td><p class="badge badge-pill badge-secondary shadow-sm">{{$n->created_at}}</p></td> -->
      <td>
        <p class="badge badge-pill badge-success shadow-sm">
        {{ Carbon\Carbon::parse($n->created_at)->diffForHumans()}}
      </p>
      </td>
      <td>
        <a href="{{ URL::to('/storage/public') }}/uploads/{{$n->file}}"  class="btn btn-primary shadow-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
      </td>
      <td>
        <a href="{{route('notice.delete',['id'=>$n->id])}}"  class="btn btn-danger shadow-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
<style> 
  
#Progress_Status { 
  margin-top:5px;
  width: 100%; 
  background-color:#ffff; 
  border-radius: 5px;
} 
  
#myprogressBar { 
  width: 0%; 
  height: 25px; 
  background-color: #76C74E; 
  text-align: center; 
  line-height: 24px; 
  color: black; 
} 

 video{
      width: 100%;
      border: none;
      outline: none;
  }
        video, #start, #stop, #pause, #plus, #minus, #mute { /* background color */ background-color: #ffcccc; /* background gradient */ background-image: linear-gradient(top, #fff, #fcc); background-image: -moz-linear-gradient(top, #fff, #fcc); background-image: -webkit-linear-gradient(top, #fff, #fcc); background-image: -o-linear-gradient(top, #fff, #fcc); background-image: -ms-linear-gradient(top, #fff, #fcc); 
        }

   #note .card-header{
    padding: 0;
    font-weight: bold;
    font-size: 18px;
   }     
   #note .card-body{
    padding: 0;
    font-weight: bold;
    font-size: 18px;
   }

   #note .card-body img{
   height: 200px;
   }
</style> 


<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

  <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>

<script> 
  
function update() { 
  var element = document.getElementById("myprogressBar");    
  var width = 1; 
  var identity = setInterval(scene, 10); 
  function scene() { 
    if (width >= 100) { 
      clearInterval(identity); 
    } else { 
      width++;  
      element.style.width = width + '%';  
      element.innerHTML = width * 1  + '%'; 
    } 
  } 
} 
  
</script> 



 <script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
</div>
@endsection