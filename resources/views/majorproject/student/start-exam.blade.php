@extends('majorproject.student.header')

@section('content')


<div class="container">
<!----- Exam instructions --->
<h2>Instructions</h2>
<p class="text-justify p-2"><b>
    Techno College Hooghly
</b></p>

  <h4 class="text-info">Tests:</h4>
  <div class="row p-2">
      @foreach($tests as $test)
        <div class="col-md-10 my-2 p-2 shadow-5 rounded offset-md-1" style="display:{{$test->visibility}}; background-color: #ffff;">
        <div class="card-header border border-primary bg-light shadow-sm text-primary rounded mb-1">
          <h5>{{$test->stream_name}}/ {{$test->semester}} sem/ {{$test->subject_name}} / {{$test->subject_code}}</h5>
          </div>

    <p  hidden>ID : {{$test->id}}</p>

    <i><b>{{$test->test_name}}</b></i> <i class="text-danger"><b>/</b></i>
    <i><b>Date : {{$test->test_date}}</b></i> <i class="text-danger"><b>/</b></i>
    <i><b>Time : {{$test->test_time}}</b></i>
     <button  onClick="location.href='{{route('fetch.question',['id'=>$test->id])}}'" style="float: right;"  class="btn btn-success shadow-sm rounded mt-2"  {{$test->test_status}}>Start Exam</button>

    </div>
      @endforeach
      
  </div>
  <div class="row">
    <div class="col-md-10 my-2 p-2 offset-md-1">
      {{ $tests->links() }}
    </div>
  </div>


<style>
.pagination > li > a,
.pagination > li > span{
  border:none;
  outline: none;
  font-weight: bold;
}
.pagination > li{
  box-shadow: 1px 2px 2px 0px rgba(0,0,0,0.59);
-webkit-box-shadow: 1px 2px 2px 0px rgba(0,0,0,0.59);
-moz-box-shadow: 1px 2px 2px 0px rgba(0,0,0,0.59);
  border:none;
  outline: none;
}
</style>
</div>

<!-- <script type="text/javascript">
        $(function () {
            var thisDay = new Date();
            var date = '0'+(thisDay.getMonth()+1)+'/'+(thisDay.getDate())+'/'+thisDay.getFullYear();
            alert(date)
            if (date > {{$test->test_date}} && date < {{$test->test_date}}) {
                $("#add").attr("disabled", true);
                printAlert();
            } else if (date == {{$test->test_date}}){
                $("#add").attr("disabled", false);
            }
        });
    </script> -->

@endsection  