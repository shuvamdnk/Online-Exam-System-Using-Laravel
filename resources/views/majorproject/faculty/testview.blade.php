@extends('majorproject.faculty.header')

@section('content')
<!-------- Data Table links------------>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.1/css/keyTable.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.1/css/rowGroup.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.bootstrap4.min.css">
<!----------- End Data Table Links--------->
<div class="container-fluid">
	 
<div>
  <p class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > Tests</p>
</div>

<h5 class="text-info">TESTS</h5>
	<div class="row">
		<div class="col-md-12">
      <a href="{{route('test.index')}}" style="margin-bottom: 15px; color: #ffff;" class="btn btn-primary shadow-sm">CREATE TEST</a>
      <div class="scrollmenu">
<table id="example" class="table table-hover bg-white">
  <thead class="shadow bg-info text-light">
    <tr>
      <th scope="col">Test Name</th>
      <th scope="col">Faculty name</th>
      <th scope="col">Stream Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Number Of Questions</th>
      <th scope="col">Right Answer Marks</th>
      <th scope="col">Wrong Answer Marks</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Test Date</th>
      <th scope="col">Test Time</th>
      <th scope="col">Test Status</th>
      <th scope="col">Test Duration</th>
      <th scope="col">Edit</th>
      <th scope="col">Result</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
 @foreach($tests as $test)
             <tr>
              <td>{{$test->test_name}}</td>
              <td>{{$test->faculty_name}}</td> 
              <td>{{$test->stream_name}}</td>
              <td>{{$test->semester}}</td>
              <td>{{$test->subject_name}}</td>      
              <td>{{$test->subject_code}}</td>      
              <td>{{$test->No_of_q}}</td>
              <td>{{$test->right_a}}</td>
              <td>{{$test->wrong_a}}</td>
              <td>{{$test->total_marks}}</td>
              <td>{{$test->test_date}}</td>
              <td>{{$test->test_time}}</td>
              
              @if($test->test_status == "enabled")
                 <td><span class="badge badge-success">{{$test->test_status}}</span></td>
              @else  
                  <td><span class="badge badge-danger">{{$test->test_status}}</span></td>
              @endif   


              <td>{{$test->test_duration}} sec</td>
              <td><a href="{{route('test.edit',['id'=>$test->id])}}" class="btn btn-primary btn-block">EDIT</a></td>
               <td><a href="{{route('test.results',['id'=>$test->id])}}" class="btn btn-info btn-block">RESULT</a></td>
                <td><a href="{{route('test.delete',['id'=>$test->id])}}" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
@endforeach
  </tbody>
</table>
</div>
		</div>
	</div>
</div>

<!-- <script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->

<!----------- Data Table Script-------->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/keytable/2.5.1/js/dataTables.keyTable.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.1/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/searchPanes.bootstrap4.min.js"></script>


   <script>
  $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 
                    {
                        extend: 'copy',
                        text: '<h4 style="font-size: 13px; color:#ffff; margin-top:5px;"><i class="fa fa-files-o" aria-hidden="true"></i></i> COPY</h4>',
                        titleAttr: 'COPY'
                    },  
                    {
                        extend: 'excel',
                        text: '<h4 style="font-size: 13px;color:#ffff;margin-top:5px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXCEL</h4>',
                        titleAttr: 'EXCEL'
                    },
                    {
                        extend: 'csv',
                        text: '<h4 style="font-size: 13px;color:#ffff;margin-top:5px;"><i class="fa fa-table" aria-hidden="true"></i> CSV</h4>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdf',
                        text: '<h4 style="font-size: 13px;color:#ffff;margin-top:5px;"><i class="fa fa-file" aria-hidden="true"></i> PDF</h4>',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<h4 style="font-size: 13px;color:#ffff;margin-top:5px;"><i class="fa fa-print" aria-hidden="true"></i> PRINT</h4>',
                        titleAttr: 'PRINT'
                    },
     
         ]
    } );
    
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
   </script>


  <style>
    #example_filter input {
    outline: none;
    box-shadow: none;
    border:1px solid blue;
    margin-top: 10px;
   }

    #example_filter label{
      color:blue;
      font-weight: bold;
    }
    .container-fluid{
      padding: 5px;
    }
   </style>
<!------------End Data table  Script----> 


@endsection