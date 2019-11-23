<body>
<center><h2><?= $title ?></h2></center>
<div class="py-5">
	<div class="container">

		<div class="row hidden-md-up">

			<?php foreach ($userList as $ul) : ?>
				<div class="col-md-3">
					<div class="card">
						<div class="card-block">
							<?php if ($ul->getProfilePictureUrl()) : ?>
								<img class="rounded-circle" style="height: 150px;width: 150px; -o-object-fit: contain;" src="<?php echo $ul->getProfilePictureUrl(); ?>"/>

							<?php else : ?>
								<img class="rounded-circle" style="height: 150px;width: 150px; -o-object-fit: contain;"
									 src="https://prime.cimbbank.com.my/content/dam/cimb-consumer/primebanking/Prime%20Perspective%20-%20Prime%20Account.png"/>
							<?php endif; ?>
							<h4 class="card-title"><?php echo $ul->getName(); ?></h4>
							<h6 class="card-subtitle text-muted">MUSIC GENRE</h6>


							<div class="btn-group">
								<?php if ($ul->getFollowingId() == null) : ?>
									<?php echo form_open_multipart('friends/follow'); ?>
									<input type="hidden" name="id" value="<?php echo $ul->getUserId(); ?>">
									<button type="submit" class="btn btn-primary">Follow</button>
									</form>
								<?php else : ?>

									<?php echo form_open_multipart('friends/unfollow'); ?>
									<input type="hidden" name="id" value="<?php echo $ul->getUserId(); ?>">
									<button type="submit" class="btn btn-secondary">Unfollow</button>
									</form>
								<?php endif; ?>
							</div>


						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>

	</div>
</div>



<?php if ($userList==null) : ?>
<div class="container">
	<?php if ($this->session->flashdata('no_users')): ?>
		<?php echo '<p class="alert alert-success">' . $this->session->flashdata('no_users') . '</p>'; ?>
	<?php endif; ?>
</div>
<?php else : ?>
	<div class="container">
		<?php if ($this->session->flashdata('have_users')): ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('have_users') . '</p>'; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>


