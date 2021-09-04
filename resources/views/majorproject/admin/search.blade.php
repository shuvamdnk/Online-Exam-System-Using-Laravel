@extends('majorproject.admin.header')
 
@section('content')

<div class="container">
	<div class="row" style="justify-content: center;">
  	<div class="col-md-6">
  		<form action="{{route('admin.search.data')}}" method="get" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text"  class="form-control" name="search"
					placeholder="Search..." autocomplete="off"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</span>
			</div>
		</form>
  	</div>
  </div>


  <style>
  		.row .col-md-6 input{
		border:1px solid #FF1E66;
		outline: none;
		box-shadow: none;
		background-color: #E5E8E8 ;
		font-weight: bold;
		color: red;
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
  </style>
</div>
@endsection