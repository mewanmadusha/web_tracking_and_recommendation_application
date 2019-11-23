<center><h2><?= $title ?></h2></center>
<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="container">
					<div class="row">
						<div class="profile-header-container">
							<div class="profile-header-img">
								<div class="list-group">
									<a class="list-group-item">
										<img class="rounded-circle" src="<?php echo $profileData['user_profile_img_url'] ?>"/>
										<center><h1 class="my-4"><?php echo $profileData['name'] ?></h1></center>
									</a>
									<a href="<?php echo base_url(); ?>index.php/timeline" class="list-group-item">Public Timeline</a>
									<a href="<?php echo site_url('/timeline/view_profile/'. $this->session->userdata('usr_id')); ?>" class="list-group-item">Your Timeline</a>
									<a href="<?php echo base_url(); ?>index.php/friends/followings" class="list-group-item">Followings </a>
									<a href="<?php echo base_url(); ?>index.php/friends/followers" class="list-group-item">Followers</a>
									<a href="<?php echo base_url(); ?>index.php/friends" class="list-group-item">Get More Friends</a>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-9">

				<div class="row">

					<?php foreach ($followerList as $ul) : ?>
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




									</div>
								</div>
							</div>

					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</div>
