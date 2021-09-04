@extends('majorproject.admin.header')

@section('content')
<div class="container">

    @if(\Session::has('success'))
  <div class="alert alert-dismissible alert-success fade show shadow-5 br3 slide-top">
   <p><i class="fa fa-check-circle" aria-hidden="true"></i> {{ \Session::get('success') }}</p>
  </div>
  @endif


<h3 align="center" style="color:#FF1E66;">ADMIN DASHBOARD</h3>


         <div style="color: blue; display: flex;margin: 0; padding: 0; justify-content: center;">
            <p>
              <h6 id="day" style="color: #FF1E66"></h6><i style="color: #ffff;">----</i>
              <h6 id="date" style="color: #FF1E66"></h6><i style="color: #ffff;">----</i>
              <h6 id="clock" style="color: #FF1E66"></h6>
           </p>
         </div> 

  <div class="row">
  	<div class="col-md-6">
  		<form action="#" method="" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" id="searchInput" class="form-control" name="q"
					placeholder="Search..." data-filter="services" autocomplete="off"> <span class="input-group-btn">
					<button type="button" class="btn btn-default">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</span>
			</div>
		</form>
  	</div>
  </div>
<!---- List of Content for search --->
<div class="row">
	<div class="col-md-6">
<nav id="services">
	<div id="playground">
   <ul class="list-group" id="fruits">
    <!----Student list--->
   	@foreach($student as $data)
    <li class="list-group-item"><img src="{{url('/images/student.png')}}" width="25"><a href="{{route('student.show',['id'=>$data->id])}}">{{$data->student_name}}</a>
      <a href="{{route('student.edit',['id'=>$data->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>

    @endforeach

    <!----Faculty list ---->
    @foreach($faculty as $data1)
    <li class="list-group-item"><img src="{{url('/images/faculty.png')}}" width="25"><a href="{{route('faculty.show',['id'=>$data1->id])}}"> {{$data1->faculty_name}}</a> <a href="{{route('edit',['id'=>$data1->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
    @endforeach

    <!---- Stream list ---->
    @foreach($stream as $data2)
    <li class="list-group-item"><img src="{{url('/images/wbut.png')}}" width="25"> {{$data2->stream_name}}</li>
    @endforeach

    <!---- Subject list --->
    @foreach($subject as $data3)
    <li class="list-group-item"><img src="{{url('/images/subject.png')}}" width="25"> {{$data3->subject_name}}</li>
    @endforeach
   </ul>
</div>
 </nav>
	</div>
</div>
<!----End List of Content for search --->


</div>

<!-- list search -->
<script>
(function(){
	var inputFilter = document.querySelector("[data-filter]");
  inputFilter.addEventListener("keyup", function(){
  	var inputValue = this.value, i;
    var filterList = document.getElementById(this.dataset.filter);
    var filterItem = filterList.querySelectorAll("li");
    for (i = 0; i < filterItem.length; i++) {
    		var _this = filterItem[i];
        var phrase = _this.innerHTML; 
    	if (phrase.search(new RegExp(inputValue, "i")) < 0) {
      	_this.style.display = "none";
      } else {
      	_this.style.display = "block";
      }
    }
  });
})();
</script>

<script>
	$("#searchInput").on('keyup', function() {
  var searchValue = $(this).val();
  searchAndFilter(searchValue)
});

function searchAndFilter(searchTerm) {
  if (searchTerm == '') {
    $("#fruits li").hide()
  } else {
    $("#fruits li").each(function() {
      var currentText = $(this).text();
      currentText = currentText.toUpperCase();
      searchTerm = searchTerm.toUpperCase();
      if (currentText.indexOf(searchTerm) >= 0) {
        $(this).show();
      }
    });
  }
}

$(document).ready(function() {
  $("#fruits li").hide();
});
</script>

<!-- <script src="https://www.the-art-of-web.com/hilitor.js"></script> -->
<script src="{{url('/js/searchtexthighlighter.js')}}"></script>
<script>

  window.addEventListener("DOMContentLoaded", function(e) {
    var myHilitor2 = new Hilitor("playground");
    myHilitor2.setMatchType("left");
    document.getElementById("searchInput").addEventListener("keyup", function(e) {
      myHilitor2.apply(this.value);
    }, false);
  }, false);

</script>
<!---- End list Seacrch--->

<style>
	.row .col-md-6 input{
		border:1px solid #FF1E66
		outline: none;
		box-shadow: none;
		background-color: #E5E8E8 ;
		font-weight: bold;
		color:  #27AE60 ;
    margin-top: 20px;
	}
	.row .col-md-6 button{
		border:none;
		outline: none;
		box-shadow: none;
		background-color: #FF1E66;
		color: #ffff;
		font-size: 17.5px;
    margin-top: 20px;
	}
	.row{
		justify-content: center;
	}
	.row .col-md-7{
		margin:20px; 
	}
	.row .col-md-6 ul{
		list-style: none;
	}
	.row .col-md-6 ul li{
		color:  #27AE60 ;
		font-weight: bold;
	}
  ul li i{
    float: right;
  }
  .container .row .col-md-6 #services #playground ul{
    overflow:hidden; 
    overflow-y:scroll;
    height:400px;
  }

  ::-webkit-scrollbar {
   width: 0px;
  }
</style>
@endsection