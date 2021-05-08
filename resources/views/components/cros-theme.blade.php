<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	
	<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/font/Font-Awesome-master/css/solid.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/font/Font-Awesome-master/css/regular.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/font/Font-Awesome-master/css/brands.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/font/Font-Awesome-master/css/fontawesome.css">

	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/css/css.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme_ego') }}/css/css-components.css">
	<style type="text/css">
		header {
			position: fixed;
			left: 0;
			top: 0;
			right: 0;
			transition: all 0.5s;
			z-index: 9999999;
			/* background: #fff; */
		}
	</style>

	<title>Ego Oktafanda</title>
</head>
<body>

	<!-- header -->
	<header>
		<!-- sticky-top -->
		<nav class="navbar  main-nav">

			<div class="md__ row wd-100">
				<div class="col-md-12 p-2">
					<div class="form-inline my-2 my-lg-0 md-mobile float-right">
						<a class="mr-sm-3 item-menu b" href="#dashboard">Home</a>
						<a class="mr-sm-3 item-menu b" href="#Profil">Profile</a>
						<a class="mr-sm-3 item-menu b" href="#About">About</a>
						<a class="mr-sm-3 item-menu b" href="#keahlian">Skill</a>
					</div>
				</div>
			</div>

			<div class="xs__ bg-transparent">
				<div class="mobile_menu">
					<div id="wrapper">

						<aside id="sidebar-wrapper">
							<div class="sidebar-brand">
								<h2>Ego Oktafnda</h2>
							</div>
							<ul class="sidebar-nav">
								<li class="active">
									<a href="#dashboard">Home</a>
								</li>
								<li>
									<a href="#Profil">Profile</a>
								</li>
								<li>
									<a href="#About">About</a>
								</li>
								<li>
									<a href="#keahlian">Skill</a>
								</li>
							</ul>
						</aside>

						<div id="navbar-wrapper">
							<nav class="navbar navbar-inverse">
								<div class="container-fluid">
									<div class="navbar-header">
										<a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<!-- --------- -->

    {{-- -------- --}}

    <!-- --------- -->

	<script type="text/javascript">
		const config = {

			_3dCloud : false,
			particlesJS : false


		};
	</script>

	<!-- script -->
	<script type="text/javascript" src="{{ asset('theme_ego') }}/js/jquery.min.js"></script>
	<script src="{{ asset('theme_ego') }}/js/popper.min.js"></script>
	<script src="{{ asset('theme_ego') }}/js/bootstrap.min.js"></script>

	<!-- <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>  -->


	<!-- <script src="http://threejs.org/examples/js/libs/stats.min.js"></script> -->
	<!-- <script type="text/javascript" src="https://www.jqueryscript.net/demo/3D-Interactive-SVG-Tag-Cloud-Plugin-With-jQuery-SVG-3D-Tag-Cloud/jquery.svg3dtagcloud.min.js"></script> -->

	<!-- ///////////////////////////////MAP////////////////////////////////// -->
		<!-- <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
		<script src="https://cdn.jsdelivr.net/leaflet.esri/1.0.0/esri-leaflet.js"></script>
		<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster-src.js"></script>
		<script type="text/javascript" src="app_js/data_map_kuansing.js"></script>
		<script type="text/javascript" src="app_js/handler_map.js"></script>
	-->
	<!-- ///////////////////////////////////////////////////////////////// -->


	<script type="text/javascript" src="{{ asset('theme_ego') }}/js/script.js"></script>
</body>
</html>