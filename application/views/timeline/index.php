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
									<img class="rounded-circle" src="<?php echo $user_data['user_profile_img_url'] ?>"/>
									<center><h1 class="my-4"><?php echo $user_data['name'] ?></h1></center>
								</a>
								<a href="<?php echo base_url(); ?>friends/index" class="list-group-item">Followings </a>
								<a href="#" class="list-group-item">Followers</a>
								<a href="<?php echo base_url(); ?>friends" class="list-group-item">Get More Friends</a>
								<a href="#" class="list-group-item">Manage Account</a>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">

			<div class="row">

				<?php foreach ($posts as $post) : ?>

					<?php
					$img_from_url=false;
					// The Regular Expression filter
					$url_character = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";


					// Check if there is a url in the text
					if(preg_match($url_character, $post->post_description, $url)) {

						// make the urls hyper links
//						for ($x = 0; $x <=count($url); $x++) {
							$new_description= preg_replace($url_character, "<a href='{$url[0]}'>{$url[0]}</a> ", $post->post_description);
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
						$new_description= $post->post_description;

					}
					?>


					<div class="col-lg-6 col-md-6 mb-4">
						<div class="card h-100">

							<?php if($img_from_url) : ?>
							<a href="#"><img class="card-img-top"
											 src="<?php echo $img_path; ?>"
											 alt=""></a>
							<?php endif; ?>
							<div class="card-body">
								<h4 class="card-title">
									<a href="#"><?php echo $post->post_title; ?></a>
								</h4>
								<p class="card-text">
									<small class="card-text">Posted on: <?php echo $post->posted_time; ?></small>
									<br>
									<?php echo  word_limiter($new_description,50); ?></p>

								<br><br>
								<p><a class="btn btn-secondary"
									  href="<?php echo site_url('/timeline/' . $post->slug . '/' . $post->post_id); ?>">Read
										More</a></p>
							</div>
							<div class="card-footer">
								<p>Posted By <a href=""><?php echo $post->name; ?><a></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
			<!-- /.row -->

		</div>
		<!-- /.col-lg-9 -->

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->


<?php //foreach($posts as $post) : ?>
<!--	<div class="card">-->
<!--		<div class="row">-->
<!--			<div class="col-md-3">-->
<!--				<img style="max-height: 200px; max-width: 400px" src="--><?php //echo site_url()?><!--/assets/images/posts/--><?php //echo $post['post_image_path'];?><!--">-->
<!--			</div>-->
<!--			<div class="col-md-9">-->
<!---->
<!--				<h3 class="card-header">--><?php //echo $post['post_title']; ?><!--</h3>-->
<!--				<div class="card-body">-->
<!--					<small class="card-text">Posted on: --><?php //echo $post['posted_time']; ?><!-- in </small><br>-->
<!--					--><?php //echo word_limiter($post['post_description'],50); ?>
<!--					<br><br>-->
<!--					<p><a class="btn btn-secondary" href="--><?php //echo site_url('/timeline/'.$post['slug'].'/'.$post['id']); ?><!--">Read More</a></p>-->
<!---->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<?php //endforeach; ?>




