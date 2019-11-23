<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous">
	</script>


<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>-->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />-->
<!--	-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<!-- jQuery library -->

	<script src="<?php echo base_url(); ?>assets/js/jquery.multiselect.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.multiselect.css">


	<script src="<?php echo base_url(); ?>assets/js/javascript.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<title>COURCE WORK</title>
	<script>

	</script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">MusicTribute</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<!--session login detail match-->
			<?php if($this->session->userdata('login_status')) :?>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">

<!--					<li class="nav-item">-->
<!--						<a class="nav-link" href="--><?php //echo base_url(); ?><!--">Home</a>-->
<!--					</li>-->
<!--					<li class="nav-item">-->
<!--						<a class="nav-link" href="--><?php //echo base_url(); ?><!--aboutus">About US</a>-->
<!--					</li>-->
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>index.php/timeline">Feed</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>index.php/timeline/add">Create New Post</a>
					</li>
				</ul>
			<?php endif; ?>

			<ul class="navbar-nav ml-auto">
				<?php if($this->session->userdata('login_status')) :?>
				<form class="form-inline my-2 my-lg-0" method="post" action="<?php echo base_url('index.php/friends/search'); ?>">
					<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search By Genre" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
				<?php endif; ?>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<?php if(!$this->session->userdata('login_status')) :?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>index.php/authentication/register_user">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>index.php/authentication/login_user">Login</a>
						</li>
					<?php endif; ?>
					<?php if($this->session->userdata('login_status')) :?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>index.php/authentication/logout">Logout</a>
						</li>
					<?php endif; ?>
				</ul>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<?php if ($this->session->flashdata('user_successfully_registered')): ?>
		<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_successfully_registered') . '</p>'; ?>
	<?php endif; ?>
	<?php if ($this->session->flashdata('user_successfully_loggedin')): ?>
		<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_successfully_loggedin') . '</p>'; ?>
	<?php endif; ?>

</div>

