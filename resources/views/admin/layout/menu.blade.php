<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<title>Manager</title>
</head>
<style type="text/css">
	.navbar.bg-light{
		background-color: #000 !important;
		transition: ease 0.5s;
	}
	.user-profile{
		width: 50px;
		height: 50px;
		background-color: #f1f1f1;
	}
	.navbar .menu-bar{
		display: inline-block;
		width: 50px;
		height: 50px;
		margin-right: 10px;
		position: relative;
		cursor: pointer;
	}
	.navbar .menu-bar .bars{
		position: relative;
		top:50%;
		width:30px;
		height: 2px;
		background-color: #fff;
	}
	.navbar .menu-bar .bars::after{
		content: "";
		position: absolute;
		bottom: -8px;
		width: 100%;
		height: 2px;
		background-color: #fff;
	}
	.navbar .menu-bar .bars::before{
		content: "";
		position: absolute;
		top:-8px;
		width: 100%;
		height: 2px;
		background-color: #fff;
	}
	.navbar ul.navbar-nav li.nav-item.ets-right-0 .dropdown-menu{
		left: auto;
		right: 0;
		position: absolute;
	} 
	.side-bar{
		position: fixed;
		top:81px;
		left:0;
		padding: 15px;
		display: inline-block;
		width: 100px;
		background-color: #fff;
		box-shadow: 0px 0px 8px #ccc;
		height: 100vh;
		transition: ease 0.5s; 
		overflow-y: auto;
	}
	.main-body-content{
		display: inline-block;
		padding: 15px;
		background-color:#eef4fb;
		height: 100vh;
		padding-left: 100px;
		transition: ease 0.5s; 
	}
	.ets-pt{
		padding-top: 100px;
	}
	.main-admin.show-menu .side-bar{
		width: 250px;
	}

	.main-admin.show-menu .main-body-content{
		padding-left: 265px;
	}
	.main-admin.show-menu .navbar .menu-bar .bars{
		width: 15px;
	}
	.main-admin.show-menu .navbar .menu-bar .bars::after{
		width: 10px;
	}
	.main-admin.show-menu .navbar .menu-bar .bars::before{
		width: 25px;
	}
	.main-admin.show-menu .side-bar-links{
		opacity: 1;
	}
	.main-admin.show-menu .side-bar .side-bar-icons{
		opacity: 0;
	}
	/**** end effacts ****/
	.side-bar .side-bar-links{
		opacity: 0;
		transition:  ease 0.5s;
	}
	.side-bar .side-bar-links ul.navbar-nav li a{
		font-size: 14px;
		color: #000;
		font-weight: 500;
		padding: 10px;
	}
	.side-bar .side-bar-links ul.navbar-nav li a i{
		font-size:20px;
		color: #8ac1f6;
	}
	.side-bar .side-bar-links ul.navbar-nav li a:hover, .side-bar-links ul.navbar-nav li a:focus{
		text-decoration: none;
		background-color: #8ac1f6;
		color:#fff;
	}
	.side-bar .side-bar-links ul.navbar-nav li a:hover i{
		color:#fff;
	}
	.side-bar .side-bar-logo img{
		width: 100px;
		height: 100px;
	}
	.side-bar .side-bar-icons{
		position: absolute;
		top:20px;
		right:0;
		width: 100px;
		opacity: 1;
		transition: ease 0.5s;
	}
	.side-bar .side-bar-icons .side-bar-logo img{
		width: 50px;
		height: 50px;
		object-fit: cover;
	}
	.side-bar .side-bar-icons .side-bar-logo h5{
		font-size: 14px;
	}
	.side-bar .side-bar-icons .set-width{
		color: #000;
		font-size: 32px;
	}
	.side-bar .side-bar-icons .set-width:hover,.side-bar .side-bar-icons .set-width:focus{
		color: #8ac1f6;
		text-decoration: none;
	}
	.counter {
		background-color:#f5f5f5;
		padding: 20px 0;
		border-radius: 5px;
	}

	.count-title {
		font-size: 40px;
		font-weight: normal;
		margin-top: 10px;
		margin-bottom: 0;
		text-align: center;
	}

	.count-text {
		font-size: 13px;
		font-weight: normal;
		margin-top: 10px;
		margin-bottom: 0;
		text-align: center;
	}

	.fa-2x {
		margin: 0 auto;
		float: none;
		display: table;
		color: #4ad1e5;
	}
</style>
<body>

	<div id="page-container" class="main-admin">
		<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
			<a class="navbar-brand" href="#"></a>
			<div id="open-menu" class="menu-bar">
				<div class="bars"></div>
			</div>
			<ul class="navbar-nav ml-auto">
				
				<a href="/" id="navbarDropdown" role="button"  style="color: white;">
					{{ __('menu.myblog') }}
				</a>
				<a href="{!! route('user.change-language', ['en']) !!}">ENG</a>
				<a href="{!! route('user.change-language', ['vi']) !!}">VN</a>

			</ul>
		</nav>
		<div class="side-bar">
			<div class="side-bar-links">
				<div class="side-bar-logo text-center py-3">
					{{-- <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3"> --}}
					<h5>{{ __('menu.myblog') }}</h5>
				</div>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="/admin" class="nav-links d-block"><i class="fa fa-home pr-2"></i> {{ __('menu.dashboard') }}</a>
					</li>
					<li class="nav-item">
						<a href="/admin/user" class="nav-links d-block"><i class="fa fa-home pr-2"></i> {{ __('menu.user') }}</a>
					</li>
					<li class="nav-item">
						<a href="/admin/article" class="nav-links d-block"><i class="fa fa-home pr-2"></i> {{ __('menu.article') }}</a>
					</li>
					<li class="nav-item">
						<a href="/admin/category" class="nav-links d-block"><i class="fa fa-home pr-2"></i> {{ __('menu.category') }}</a>
					</li>
					<li class="nav-item">
						<a href="/admin/role" class="nav-links d-block"><i class="fa fa-home pr-2"></i> {{ __('menu.role') }}</a>
					</li>
					<li class="nav-item">
						<a href="/test/me" class="nav-links d-block"><i class="fa fa-home pr-2"></i> I Will reset this lastly</a>
					</li>
				</ul>
			</div>
			<div class="side-bar-icons">
				<div class="side-bar-logo text-center py-3">
					{{-- <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3"> --}}
					<h5>{{ __('menu.myblog') }}</h5>
				</div>
				<div class="icons d-flex flex-column align-items-center">
					<a href="/admin" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
					<a href="/admin/user" class="set-width text-center display-inline-block my-1"><i class="fa fa-users"></i></a>
					<a href="/admin/article" class="set-width text-center display-inline-block my-1"><i class="fa fa-list"></i></a>
					<a href="/admin/category" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
					<a href="/admin/role" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
					
				</div>
			</div>
		</div>
		<div class="main-body-content w-100 ets-pt">
			<div class="table-responsive bg-light">
				
				<main class="py-4">
					@yield('contenter')
				</main>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#open-menu").click(function(){
				if(jQuery('#page-container').hasClass('show-menu')){
					jQuery("#page-container").removeClass('show-menu');
				}

				else{
					jQuery("#page-container").addClass('show-menu');
				}
			});
		});
	</script>
</body>
</html>