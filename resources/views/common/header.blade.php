<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-type" content="application/x-www-form-urlencoded; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NAAC | JBIT</title>
    <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ url('assets/css/custom.css') }}" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap.min.css">
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script>
   <script type="text/javascript">tinymce.init({
      selector: '#articles',
      branding: false,
      height: 250,
      theme: 'modern',
      apply_source_formatting : false,
      plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
      toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
      image_advtab: true
      });
   </script> -->
      <style>
      	html,
			body {
				max-width: 100% !important;
				overflow-x: hidden !important;
			}
      	.myborder{
      		border:1px solid #ddd;
      		padding: 5px;
      	}
		i.fa.fa-bars {
    		margin-top: 22px;
    		font-size: xx-large;
			}
		.nav-social {
            font-size: larger;
            margin-top: 12px;
		}	  
      </style>
</head>
<body>
	<header id="header">
		<div id="nav">
			<div id="nav-top">
				<div class="container">
					<!-- <ul class="nav-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul> -->
					<div class="nav-logo">
						<a href="/" class="logo"><img src="{{ url('assets/img/logo.png') }}" alt="" style="padding: 10px;"></a>
					</div>
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
					</div>
				</div>
			</div>
			<div id="nav-bottom">
				<div class="container">
					@if (Auth::guest())
					<!-- <ul class="nav-menu">
						
					</ul> -->
					@else
					<ul class="nav-menu">
						<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li><a href="{{ route('upload-file') }}">Upload Files</a></li>
						<li><a href="{{ route('view-all-folders') }}">View All Folders</a></li>
						<li><a href="{{ route('signout') }}">Sign Out</a></li>
					</ul>
					 @endif
				</div>
			</div>
			<div id="nav-aside">
				@if (Auth::guest())
				<!-- <ul class="nav-aside-menu">
					
				</ul> -->
				@else
				<ul class="nav-aside-menu">
						<li><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li><a href="{{ route('upload-file') }}">Upload Files</a></li>
						<li><a href="{{ route('view-all-folders') }}">View All Folders</a></li>
						<li><a href="{{ route('signout') }}">Sign Out</a></li>
					</ul>
			    @endif
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
		</div>
	</header>