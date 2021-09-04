@extends('majorproject.faculty.header')

@section('content')


<p class="badge badge-pill badge-light shadow-sm"><a href="{{route('faculty')}}">Dashboard </a> > Profile</p>
	

 
	<div class="container">
     <h5 class="text-info">PROFILE</h5>
        <div class="row justify-content-center bg-white shadow-sm mb-5 rounded p-2">
            <div class="col-md-4" style="text-align: center;">
                   @if (count($errors) > 0)
                <div class="alert alert-danger shadow-sm">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
 
      <form action="/profile/faculty" id="profile-img-form" method="post" enctype="multipart/form-data">
          @csrf
         <div>
           <label for="upload" id="img-label"><i class="fa fa-camera" aria-hidden="true"></i></label> 

            @if(Auth::guard('faculty')->user()->avatar)
              <img id="img" class="rounded-circle shadow" src="/storage/avatars/{{ Auth::guard('faculty')->user()->avatar }}" width="150" height="150"/>
              @endif
            @if(Auth::guard('faculty')->user()->avatar == null)
               <img id="img" src="https://joeschmoe.io/api/v1/
           {{Auth::guard('faculty')->user()->faculty_name}}" class="rounded-circle shadow" width="150" height="150" />
            @endif

           <input type="file" name="avatar" accept="image/*" id="upload" hidden onchange="preview_image(event)"/>

          <!--  <button type="submit" class="btn btn-outline-success shadow-sm btn-block">UPLOAD</button> -->
          </div>          
            </form>
            <p id="upload-msg"></p>
          </div>

          <div class="col-md-4">
            <label style="margin-top: 30px; font-weight: bold; color: skyblue;">Change Username</label>
            <form class="" style="display: flex;">
            <input type="text" name="username" value="{{Auth::guard('faculty')->user()->faculty_username}}" class="form-control shadow-sm bg-light">
            <button type="submit" class="btn btn-success shadow-sm">UPDATE</button>
          </form>
          </div>

          <div class="col-md-4">
            <label style="margin-top: 30px; font-weight: bold; color: skyblue;">Change Name</label>
            <form class="" style="display: flex;">
            <input type="text" name="faculty_name"  class="form-control shadow-sm bg-light" value="{{Auth::guard('faculty')->user()->faculty_name}}">
            <button type="submit" class="btn btn-success shadow-sm">UPDATE</button>
          </form>
          </div>

          <div class="col-md-4">
            <label style="margin-top: 30px; font-weight: bold; color: skyblue;">Change Password</label>
            <form class="" style="display: flex;">
            <input type="password" name="password"  class="form-control shadow-sm bg-light" placeholder="********">
            <button type="submit" class="btn btn-success shadow-sm">UPDATE</button>
          </form>
          </div>
        </div>
</div>

<style>
  .container-fluid{
    padding: 5px;
  }
  #img-label{
  background-color: #FF8084;
  color: #ffff;
  padding: 5px 8px 5px 8px;
  border-radius: 50%;
  cursor: pointer;
  margin-top: 6.5rem;
  margin-left: 6.5rem;
  position: absolute;
}
 #img{
  border-radius: 50%; 
  margin-bottom: 20px; 
  padding: 5px; 
  border:2px solid #7DCEA0;
  object-fit: cover;
 }
 .container .row .col-md-4 form .form-control{
  border: none;
  outline: none;
 }
 .container .row .col-md-4 form .form-control:focus{
  font-weight: bold;
  border:2px solid #80B2FF;
 }
 #upload-msg{
  color: blue;
  font-weight: bold;
 }
</style>

<script>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('img');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
 document.getElementById('profile-img-form').submit(); 
 document.getElementById('upload-msg').innerHTML ='Uploading Profile Picture..';
}
</script> 
</div>
@endsection