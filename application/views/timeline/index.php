</div>
<div class="container">
	<div class="page-header">
		<center><h2><?= $title ?></h2></center>
	</div>
</div>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-lg-3">
			<div class="container">
				<div class="row">
					<div class="profile-header-container">
						<div class="profile-header-img">
							<div class="list-group">
								<a class="list-group-item">
									<?php if ($profileData['user_profile_img_url']) : ?>
									<img class="rounded-circle" src="<?php echo $profileData['user_profile_img_url'] ?>"/>
									<?php else : ?>
									<img class="rounded-circle"
										 src="https://prime.cimbbank.com.my/content/dam/cimb-consumer/primebanking/Prime%20Perspective%20-%20Prime%20Account.png"/>
									<?php endif; ?>
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
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">

			<div class="row">
				<?php if($postList==null) : ?>
					<div class="alert alert-primary" role="alert">There is no posts to show to view posts add more friends and Create Posts</div>
				<?php else : ?>
				<?php foreach ($postList as $post) : ?>

					<?php
					$img_from_url=false;
					// The Regular Expression filter
					$url_character = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";


					// Check if there is a url in the text
					if(preg_match($url_character, $post->getPostDescription(), $url)) {

						// make the urls hyper links
//						for ($x = 0; $x <=count($url); $x++) {
							$new_description= preg_replace($url_character, "<a href='{$url[0]}'>{$url[0]}</a> ", $post->getPostDescription());
//						}



//							detect current url is an image or not
							$imgTypesArr = array("gif", "jpg", "jpeg", "png", "tiff", "tif");
							$urlExt = pathinfo($url[0], PATHINFO_EXTENSION);
							if (in_array($urlExt, $imgTypesArr)) {
								$img_path=$url[0];
								$img_from_url=true;
							}
							else{
								$img_from_url=false;
							}


					} else {

						// if no urls in the text just return the text
						$new_description= $post->getPostDescription();

					}
					?>


					<div class="col-lg-6 col-md-6 mb-3">
						<div class="card h-100">

							<?php if($img_from_url) : ?>
							<a href="#"><img class="card-img-top" style="height: 150px;width: 330px; -o-object-fit: contain;"
											 src="<?php echo $img_path; ?>"
											 alt=""></a>
							<?php endif; ?>
							<div class="card-body">
								<h4 class="card-title">
									<a href="#"><?php echo $post->getPostTitle(); ?></a>
								</h4>
								<p class="card-text">
									<small class="card-text">Posted on: <?php echo $post->getPostedTime(); ?></small>
									<br>
									<?php echo  word_limiter($new_description,80); ?></p>

								<br><br>
								<p><a class="btn btn-secondary"
									  href="<?php echo site_url('/timeline/view?slug=' . $post->getSlug() . '&id=' . $post->getPostId()); ?>">Read
										More</a></p>
							</div>
							<div class="card-footer">
								<p>Posted By <a href="<?php echo site_url('/timeline/view_profile/'. $post->getUserId()); ?>"><?php echo $post->getUserName(); ?><a></p>
							</div>
						</div>
					</div>

				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<!-- /.row -->

		</div>
		<!-- /.col-lg-9 -->

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->







