<body>
<div class="py-5">
	<div class="container">

		<div class="row hidden-md-up">

			<?php foreach ($friends as $friend) : ?>
			<div class="col-md-3">
				<div class="card">
					<div class="card-block">
						<?php if($friend['user_profile_img_url']) : ?>
						<img class="rounded-circle" src="<?php echo $friend['user_profile_img_url'] ?>"/>
						<?php endif; ?>
						<h4 class="card-title"><?php echo $friend['name'] ?></h4>
						<h6 class="card-subtitle text-muted">MUSIC GENRE</h6>

						<?php echo form_open_multipart('friends/follow'); ?>
							<input type="hidden" name="id" value="<?php echo $friend['id'];?>">
							<button type="submit"  class="btn btn-primary">Follow</button>
						</form>
						<button type="submit" class="btn btn-secondary">Unfollow</button>



					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>

	</div>
</div>

<div class="container">
	<?php if ($this->session->flashdata('user_successfully_registered')): ?>
		<?php echo '<p class="alert alert-success">' . $this->session->flashdata('following') . '</p>'; ?>
	<?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>


