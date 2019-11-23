<!--<h2>--><?//= $title; ?><!--</h2>-->
<?php //echo validation_errors(); ?>

<div class="wrapper2">
	<form class="form-reg" role="form" method="post" action="<?php echo base_url('index.php/authentication/register_user'); ?>">

		<!--validation errors-->
		<?php if (validation_errors()) : ?>
			<div class="alert alert-primary" role="alert"><?php echo validation_errors(); ?></div>
		<?php endif; ?>
		<h2 class="form-signin-heading">Please Register</h2>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="conpassword" placeholder="Confirm Password">
		</div>
		<div class="form-group">
			<label>Select Music Genres </label>
		<select required id="genre_id" name="genre[]" multiple class="form-control dropdown-toggle dropdowncss" >
			<?php foreach ($genreList as $gl) : ?>

				<option value="<?php echo $gl->getGenreId();?>">  <?php echo $gl->getGenreName();?>  </option>

			<?php endforeach; ?>

		</select>
		</div>
		<div class="form-group">
			<label>Link to profile picture</label>
		<input type="text" class="form-control" name="profileimglink" placeholder="Insert Profile picture Link (url)">
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
	</form>
	<?php echo form_close(); ?>

</div>
