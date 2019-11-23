<!--<h2>--><? //= $title; ?><!--</h2>-->

<!--alerts-->
<?php //if ($this->session->flashdata('user_successfully_registered')): ?>
<!--	--><?php //echo '<p class="alert alert-success">' . $this->session->flashdata('user_successfully_registered') . '</p>'; ?>
<?php //endif; ?>



<?php //echo form_open('authentication/login_user'); ?>
<!--<div class="row">-->
<!--	<div class="col-md-4 col-md-offset-4">-->
<!--		<h1 class="text-center">--><? //= $title; ?><!--</h1>-->
<!--		<div class="form-group">-->
<!--			<label>Username</label>-->
<!--			<input type="text" class="form-control" name="username" placeholder="Insert Username">-->
<!--		</div>-->
<!--		<div class="form-group">-->
<!--			<label>Password</label>-->
<!--			<input type="password" class="form-control" name="password" placeholder="Insert Password">-->
<!--		</div>-->
<!---->
<!--		<button type="submit" class="btn btn-primary btn-block">Submit</button>-->
<!--	</div>-->
<!--</div>-->
<?php //echo form_close(); ?>

<!--login form-->
<div class="wrapper">
	<form class="form-signin" role="form" method="post" action="<?php echo base_url('index.php/authentication/login_user'); ?>">

		<!--validation errors-->
		<?php if (validation_errors()) : ?>
		<div class="alert alert-primary" role="alert"><?php echo validation_errors(); ?></div>
		<?php endif; ?>
		<h2 class="form-signin-heading">Please login</h2>
		<input type="text" class="form-control" name="username" placeholder="Insert Username">
		<input type="password" class="form-control" name="password" placeholder="Insert Password">

		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	</form>
	<?php echo form_close(); ?>

</div>

<!--alerts-->
<div class="container">
	<?php if ($this->session->flashdata('user_login_fail')): ?>
		<?php echo '<p class="alert alert-danger">' . $this->session->flashdata('user_login_fail') . '</p>'; ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('user_logout')): ?>
		<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_logout') . '</p>'; ?>
	<?php endif; ?>
</div>
