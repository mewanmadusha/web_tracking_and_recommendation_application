<h2><?= $title; ?></h2>

<?php if ($this->session->flashdata('user_successfully_registered')): ?>
	<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_successfully_registered') . '</p>'; ?>
<?php endif; ?>

<?php echo validation_errors(); ?>

<?php echo form_open('authentication/login_user'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Insert Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Insert Password">
		</div>

		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>

<div class="container">
	<?php if($this->session->flashdata('user_login_fail')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_login_fail').'</p>'; ?>
<?php endif; ?>

	<?php if($this->session->flashdata('user_logout')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logout').'</p>'; ?>
	<?php endif; ?>
</div>
