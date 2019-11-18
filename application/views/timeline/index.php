<h2><?= $title ?></h2>

<?php foreach($posts as $post) : ?>
	<div class="card">
<div class="row">
<div class="col-md-3">
	<img style="max-height: 200px; max-width: 400px" src="<?php echo site_url()?>/assets/images/posts/<?php echo $post['post_image_path'];?>">
</div>
<div class="col-md-9">

	<h3 class="card-header"><?php echo $post['post_title']; ?></h3>
	<div class="card-body">
			<small class="card-text">Posted on: <?php echo $post['posted_time']; ?> in </small><br>
			<?php echo word_limiter($post['post_description'],50); ?>
			<br><br>
			<p><a class="btn btn-secondary" href="<?php echo site_url('/timeline/'.$post['slug'].'/'.$post['id']); ?>">Read More</a></p>

	</div>
</div>
</div>
</div>
<?php endforeach; ?>



