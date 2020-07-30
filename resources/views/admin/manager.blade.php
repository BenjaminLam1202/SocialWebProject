
@extends('layouts.app')
@section('content')
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
</style>
<body>

	<div id="page-container" class="main-admin">
		<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
			<a class="navbar-brand" href="#"></a>
			<div id="open-menu" class="menu-bar">
				<div class="bars"></div>
			</div>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown ets-right-0">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
						MyBlog
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="side-bar">
			<div class="side-bar-links">
				<div class="side-bar-logo text-center py-3">
					{{-- <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3"> --}}
					<h5>MyBlog</h5>
				</div>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
					</li>
					<li class="nav-item">
						<a href="/admin" class="nav-links d-block"><i class="fa fa-home pr-2"></i> Users</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
					</li>
				</ul>
			</div>
			<div class="side-bar-icons">
				<div class="side-bar-logo text-center py-3">
					{{-- <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3"> --}}
					<h5>MyBlog</h5>
				</div>
				<div class="icons d-flex flex-column align-items-center">
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-users"></i></a>
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-list"></i></a>
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-file-text"></i></a>
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
					<a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-database"></i></a>
				</div>
			</div>
		</div>
		<div class="main-body-content w-100 ets-pt">
			<div class="table-responsive bg-light">
				<table class="table table-striped">

					<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Created_at</th>
							<th scope="col">Email</th>
							<th scope="col">#</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->created_at}}</td>
							<td>{{$user->email}}</td>
							<td><button type="button" data-toggle="modal" data-target="#myModaluser{{$user->id}}">edit</button>/<button class="delete_here{{$user->id}}" id="delete_here{{$user->id}}" type="button" data-mid="{{$user->id}}">Delete</button></td>
							<div>

								<div id="myModaluser{{$user->id}}" class="modal fade" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Edit user's profile</h4>
											</div>
											<div class="modal-body">
												<div>



													<form action="/api/admin/user/{{$user->id}}/update" method="patch" class="my_topic_change_form{{$user->id}}" id="my_topic_change_form{{$user->id}}">
														<div class="form-group">
															<label for="exampleInputEmail1">Remane your name</label>
															<input type="text" class="form-control" name="name" aria-describedby="noticeHelp" value="{{$user->name}}" placeholder="{{$user->name}}"> 
															<label for="exampleInputEmail1">Remane email name</label>
															<input type="email" class="form-control" name="email" aria-describedby="noticeHelp" value="{{ $user->email}}" placeholder="{{$user->email}}" readonly>
															<label for="exampleInputEmail1">Remane title name</label>
															<input type="text" class="form-control" name="title" aria-describedby="noticeHelp" value="{{$user->title}}" placeholder="{{$user->title}}">
															<label for="exampleInputEmail1">Remane des name</label>
															<input type="text" class="form-control" name="des" aria-describedby="noticeHelp" value="{{$user->des}}" placeholder="{{$user->des}}">
															<label for="exampleInputEmail1">Remane url name</label>
															<input type="text" class="form-control" name="url" aria-describedby="noticeHelp" value="{{$user->url}}" placeholder="{{$user->url}}">
														</div>
														<button type="submit" class="btn btn-primary">Change</button> 
													</form>
												</div>
												<script type="text/javascript">
													$("#my_topic_change_form{{$user->id}}").submit(function(event){
														$.ajaxSetup({

															headers: {

																'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

															}

														});
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    
    $.ajax({
    	url : post_url,
    	type: request_method,
    	data : form_data, 
    	success:function(data){

    		alert("success!! reload page to update");

    	}
    }).done(function(response){ //
    	$("#server-results").html(response);
    });
});
</script>



<script type="text/javascript">
	$(document).ready(function() {
		$.ajaxSetup({

			headers: {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			}

		});
		$('#delete_here{{$user->id}}').on('click', function (e) {
        // e.preventDefault();
        var id = $(this).data('mid');
        console.log(id);
        var post_url ='/api/admin/user/'+id+'/delete';
        console.log(post_url);
        // var id = $(this).attr('data-id');
        
        $.ajax({
        	type: "delete",
        	url: post_url,
        	data: {id: id},
        	success:function(data){

        		alert("success!! reload page to see the delete");

        	}
        });
    });
	});

</script>


</div>
</tr>
@endforeach
</tbody>
</table>
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

@endsection