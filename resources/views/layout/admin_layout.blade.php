
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- start: Meta -->
	<meta charset="utf-8">

	<title> @yield('title') </title>

	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword"
		content="">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	@include('parsial.stylesheet')
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Inventory</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">

					@include('parsial.header')

				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

	<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu $ side bar -->
			<div id="sidebar-left" class="span2">
				
					@include('parsial.side_bar') 

				</div>
			</div>
			<!-- end: Main Menu -->
			<!-- start: Content -->
			<div id="content" class="span10">
				<ul class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="index.html">Home</a>
						<i class="icon-angle-right"></i>
					</li>
					<li><a href="#">Dashboard</a></li>
				</ul>

				<!-- Main Report -->
				@include('parsial.report')

				<div class="row-fluid">

					@yield('content')
					
					{{-- <h1>Welcome</h1> --}}
				</div>
				<!--/row-->
			</div>
			<!--/.fluid-container-->
		
			<!-- end: Content -->
		</div>
		<!--/#content.span10-->
	</div>
	
	<!--/fluid-row-->

	@include('parsial.footer')

	<!-- start: JavaScript-->

	@include('parsial.script')
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->



	<script>
        $(document).on("click", "#delete", function(e) {
			e.preventDefault();
			var link = $(this).attr("href");
            bootbox.confirm("Are you want to delete..?", function(confirmed) {
                if(confirmed){
					window.location.href = link;
				};
            });
        });
    
	</script>
</html>