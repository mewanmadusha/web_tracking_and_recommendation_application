<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous">
	</script>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="assets/js/javascript.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<title>COURCE WORK</title>
	<script>
        $(document).ready(function(){
            $( '.selectpicker' ).multiselect();

            $('.btn-set-val').click(function(){
                var tes = ['tes','ppp'];
                $( '.selectpicker' ).val(tes);
                $( '.selectpicker' ).multiselect( 'refresh' );
            });

            $('.btn-add-opt').click(function(){
                $( '.selectpicker' ).append("<option>new_opt</option>");
                $( '.selectpicker' ).multiselect( 'rebuild' );
            });
        });

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

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>aboutus">About US</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>timeline">Feed</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>timeline/add">Create New Post</a>
					</li>
				</ul>
			<?php endif; ?>

			<ul class="navbar-nav ml-auto">
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<?php if(!$this->session->userdata('login_status')) :?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>authentication/register_user">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>authentication/login_user">Login</a>
						</li>
					<?php endif; ?>
					<?php if($this->session->userdata('login_status')) :?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>authentication/logout">Logout</a>
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

