

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- <meta name="apple-mobile-web-app-title" content="CodePen"> -->
<title>404 error</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Arvo'>
<style>
/*======================
    404 page
=======================*/


.page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
			 font-size:80px;
			 }
			 
			 .link_404{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
	.contant_box_404{ margin-top:-50px;}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<section class="page_404">
<div class="container">
<div class="row">
<div class="col-sm-12 ">
<div class="col-sm-10 col-sm-offset-1  text-center">
<div class="four_zero_four_bg">
<h1 class="text-center ">404</h1>
</div>
<div class="contant_box_404">
<h3 class="h2">
Look like you're lost
</h3>
<p>the page you are looking for not avaible!</p>
<a href="{{route('login.all')}}" class="link_404">Go Back</a>
</div>
</div>
</div>
</div>
</div>
</section>
<script src="https://static.codepen.io/assets/editor/iframe/iframeRefreshCSS-e03f509ba0a671350b4b363ff105b2eb009850f34a2b4deaadaa63ed5d970b37.js"></script>
</body>
</html>
