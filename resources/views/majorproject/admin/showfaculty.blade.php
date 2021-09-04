@extends('majorproject.admin.header')

@section('content')
<div class="container-fluid">
	
	<p class="badge badge-pill badge-light shadow-sm"><a href="{{route('admin')}}">Dashboard </a> > Details-{{$faculty->faculty_name}}</p>

  <h5 class="text-info"> {{$faculty->faculty_name}}</h5>

	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
			<li class="list-group-item shadow-sm">NAME : {{$faculty->faculty_name}}</li>	
			<li class="list-group-item shadow-sm">USERNAME : {{$faculty->faculty_username}}</li>
           </ul>
		</div>
	</div>
</div>
<style>
	ul .list-group-item{
		color:  #27AE60 ;
		font-weight: bold;
		margin-top: 10px;
		border:none;
		outline: none;
	}
	ul li:hover{
		background-color: #FFF4F4;
	}
	.container-fluid{
      padding:10px;
    }

    .row .col-md-6{
    	margin: 0;
    	padding: 0;
    }

    .row .col-md-12{
    	margin: 0;
    	padding: 0;
    }
</style>
@endsection