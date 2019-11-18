
<div class="card">
	<img style="max-height: 200px; max-width: 400px" src="<?php echo site_url()?>/assets/images/posts/<?php echo $post['post_image_path'];?>">
	<h3 class="card-header"><?php echo $post['post_title']; ?></h3>
	<br>
	<br>
	<div class="card-body">
		<small class="card-text">Posted on: <?php echo $post['posted_time']; ?> in </small><br>
		<?php echo $post['post_description']; ?>

	</div>

	<hr>



</div>
<a class="btn btn-secondary" style="width: 200px" href="<?php echo base_url(); ?>timeline/update/<?php echo $post['id']; ?>">Update Post</a>
<?php echo form_open('/timeline/'.$post['id']); ?>
<input type="submit" value="Delete Post" style="width: 200px " class="btn btn-danger">
</form>
