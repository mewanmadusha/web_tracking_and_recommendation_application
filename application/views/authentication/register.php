<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('authentication/register_user'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
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

<!--		<label>Select your music genre</label>-->
<!--		<select name="genre_id" class="form-controller">-->
<!--			--><?php //foreach ($genres as $genre):?>
<!--			<option value="--><?php //echo $genre['id']?><!--">--><?php //echo $genre['genre_name']?><!--</option>-->
<!--			--><?php // endforeach;?>
<!--		</select>-->

		<select required id="genre_id" name="genre_id[]" multiple class="form-control dropdown-toggle dropdowncss" >
			<?php
			if (!is_null($genres)) {
				if (count($genres) > 0) {
//                                                echo "<option value=''>--------------Select your Music Genere--------------</option>";
					foreach ($genres as $m) {
						echo "<option value='" . $m['genre_name'] . "'>" . $m['genre_name'] . "</option>";
					}
				}
			} ?>

		<div class="form-group">
			<label>Uplode Profile image</label>
			<input type="file" name="profileimg" size="20">
		</div>
		<div class="form-group">
			<label>Link to profile picture</label>
			<input type="password" class="form-control" name="profileimglink" placeholder="Insert Profile picture Link (url)">
		</div>

		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>
