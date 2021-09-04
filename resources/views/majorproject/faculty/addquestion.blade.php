@extends('majorproject.faculty.header')

@section('content')
<div class="container-fluid">
  <style>
   .col-md-4 .form-control{
      outline: none;
      border:1px solid lightblue;
      box-shadow: none;
     }
     .col-md-12 .form-control{
      box-shadow: none;
      outline: none;
      border:1px solid lightblue;
     }
     .col-md-6 .form-control{
      box-shadow: none;
      outline: none;
      border:1px solid lightblue;
     }

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
  .row .form-control:focus{
    border:2px solid skyblue;  }
</style>


  <div> 
  <p  class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > <a href="{{route('question.view')}}"> Questions</a> > <i>Add Question</i></p>
  </div>


  

  <div class="container">
    <h5 class="text-info">ADD QUESTION</h5>

    <form method="post" action="{{route('question.insert')}}">
   @csrf
   <div class="row my-1 shadow-sm pt-3 pb-3 rounded bg-white" id="text-q"  style="margin-bottom:20px;">
    <div class="col-md-4">
      <label>Stream</label>
      <select class="form-control shadow-sm rounded bg-light"  id="stream" name="stream_id" data-live-search="true" style="box-shadow: none;">
        <option selected disabled value="">Select Stream</option>
        @foreach($streams as $key => $stream)
        <option value="{{$key}}">{{$stream}}</option>
        @endforeach
      </select>
        <span>
            <strong class="text-danger">{{ $errors->first('stream_id') }}</strong>
          </span>
    </div>

    <div class="col-md-4">
      <label>Subject Code</label>
      <select class="form-control shadow-sm rounded bg-light" id="subject" name="subject_id" style="box-shadow: none;">
         <option selected disabled value="">Select Subject</option>
      </select>
        <span>
            <strong class="text-danger">{{ $errors->first('subject_id') }}</strong>
          </span>
    </div>
    
    <div class="col-md-4">
      <label>Chapter</label>
      <select class="form-control shadow-sm rounded bg-light"  id="chapter" name="chapter_id" style="box-shadow: none;">
         <option selected disabled value="">Select Chapter</option>
      </select>
        <span>
            <strong class="text-danger">{{ $errors->first('chapter_id') }}</strong>
          </span>
    </div>


    <div class="col-md-12">
      <label>Question</label>
     <textarea id="context-menu" class="form-control shadow-sm rounded bg-light" name="question" style="box-shadow: none; height: 400px;"></textarea>
  <span>
            <strong class="text-danger">{{ $errors->first('question') }}</strong>
          </span>
    </div>

    <div class="col-md-6">
      <label>Option A</label>
       <textarea id="context-menu1" class="form-control shadow-sm rounded bg-light" name="option_a" style="box-shadow: none; height: 400px;"></textarea>
         <span>
            <strong class="text-danger">{{ $errors->first('option_a') }}</strong>
          </span>
    <label>Option B</label>
      <textarea id="context-menu2" class="form-control shadow-sm rounded bg-light" name="option_b" style="box-shadow: none;height: 400px;"></textarea>
        <span>
            <strong class="text-danger">{{ $errors->first('option_b') }}</strong>
          </span>
    </div>

    <div class="col-md-6">
      <label>Option C</label>
      <textarea id="context-menu3" class="form-control shadow-sm rounded bg-light" name="option_c" style="box-shadow: none;height: 400px;"></textarea>
       <span>
            <strong class="text-danger">{{ $errors->first('option_c') }}</strong>
          </span>
      <label>Option D</label>
      <textarea id="context-menu4" class="form-control shadow-sm rounded bg-light" name="option_d" style="box-shadow: none;height: 400px;"></textarea>
       <span>
            <strong class="text-danger">{{ $errors->first('option_d') }}</strong>
          </span>
   </div>
    <div class="col-md-6">
      <label>Answer</label>
      <select class="form-control shadow-sm rounded bg-light"  name="answer">
        <option selected disabled value="">Select Answer</option>
        <option>a</option>
        <option>b</option>
        <option>c</option>
        <option>d</option>
      </select>
     <!--  <input type="tect" name="answer" class=" form-control" placeholder="write the currect answer"> -->
      <!--  <textarea id="context-menu" class="form-control shadow-sm rounded bg-light" name="answer" placeholder="write the currect answer" style="box-shadow: none;"></textarea> -->
        <span>
            <strong class="text-danger">{{ $errors->first('answer') }}</strong>
          </span>
    </div>
    <div class="col-md-6">
     <label><strong class="text-info">Fill all the field to sumit form</strong></label>
     <input type="submit" name="" class="form-control btn btn-success" value="ADD QUESTION" style="box-shadow: none;">
    </div>
  </div>
</form>
    
  </div>

<!--- Text Question --->
</div>

<!--------- Dynamic Dependency ------->
<link rel="stylesheet" href="http://www.codermen.com/css/bootstrap.min.css">    
<script src="http://www.codermen.com/js/jquery.js"></script>
<script type="text/javascript">
    $('#stream').change(function(){
    var streamID = $(this).val();    
    if(streamID){
        $.ajax({
           type:"GET",
           url:"{{route('getsubject')}}?stream_id="+streamID,
           success:function(res){               
            if(res){
                $("#subject").empty();
                $("#subject").append('<option selected disabled value="">Select Subject</option>');
                $.each(res,function(key,value){
                    $("#subject").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#subject").empty();
            }
           }
        });
    }else{
        $("#subject").empty();
        $("#chapter").empty();
    }      
   });

    $('#subject').on('change',function(){
    var subjectID = $(this).val();    
    if(subjectID){
        $.ajax({
           type:"GET",
           url:"{{url('get-chapter-list')}}?subject_id="+subjectID,
           success:function(res){               
            if(res){
                $("#chapter").empty();
                $("#chapter").append('<option selected disabled value="">Select Chapter</option>');
                $.each(res,function(key,value){
                    $("#chapter").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#chapter").empty();
            }
           }
        });
    }else{
        $("#chapter").empty();
    }
        
   });
</script>
<!--------- End Dynamic Dependency ------->

 

<!-- texrarea plugin -->
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<!-- <script src="https://cdn.tiny.cloud/1/s1w032qrszggxfw9lfhf2r10wsc71u9zqp7pay2pb0u40u5b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
  selector: 'textarea#context-menu',
  plugins: [
    'link image imagetools table spellchecker lists'
  ],
  contextmenu: 'link image imagetools table spellchecker lists',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<script>
  tinymce.init({
  selector: 'textarea#context-menu1',
  plugins: [
    'link image imagetools table spellchecker lists'
  ],
  contextmenu: 'link image imagetools table spellchecker lists',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<script>
  tinymce.init({
  selector: 'textarea#context-menu2',
  plugins: [
    'link image imagetools table spellchecker lists'
  ],
  contextmenu: 'link image imagetools table spellchecker lists',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<script>
  tinymce.init({
  selector: 'textarea#context-menu3',
  plugins: [
    'link image imagetools table spellchecker lists'
  ],
  contextmenu: 'link image imagetools table spellchecker lists',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<script>
  tinymce.init({
  selector: 'textarea#context-menu4',
  plugins: [
    'link image imagetools table spellchecker lists'
  ],
  contextmenu: 'link image imagetools table spellchecker lists',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script> -->

@endsection