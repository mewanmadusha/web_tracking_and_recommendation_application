

<?php
$img_from_url=false;
// The Regular Expression filter
$url_character = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";


// Check if there is a url in the text
if(preg_match($url_character, $post['post_description'], $url)) {

	// make the urls hyper links
//						for ($x = 0; $x <=count($url); $x++) {
	$new_description= preg_replace($url_character, "<a href='{$url[0]}'>{$url[0]}</a> ", $post['post_description']);
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
	$new_description= $post['post_description'];

}
?>

<!--<div class="card">-->
<!---->
<!--	--><?php //if($img_from_url) : ?>
<!--	<img style="max-height: 200px; max-width: 400px" src="--><?php //echo site_url()?><!--/assets/images/posts/--><?php //echo $post['post_image_path'];?><!--">-->
<!--		<img style="max-height: 200px; max-width: 400px" src="--><?php //echo $img_path;?><!--">-->
<!--	--><?php //endif; ?>
<!---->
<!--	<h3 class="card-header">--><?php //echo $post['post_title']; ?><!--</h3>-->
<!--	<br>-->
<!--	<br>-->
<!--	<div class="card-body">-->
<!--		<small class="card-text">Posted on: --><?php //echo $post['posted_time']; ?><!-- in </small><br>-->
<!--		--><?php //echo $new_description; ?>
<!--	</div>-->
<!---->
<!--	<hr>-->
<!---->
<!---->
<!---->
<!--</div>-->
<!--only matchinguser can update and delete post-->
<?php //if($this->session->userdata('usr_id') == $post['user_id']) :?>
<!--<a class="btn btn-secondary" style="width: 200px" href="--><?php //echo base_url(); ?><!--timeline/update/--><?php //echo $post['post_id']; ?><!--">Update Post</a>-->
<?php //echo form_open('/timeline/'.$post['post_id']); ?>
<!--<input type="submit" value="Delete Post" style="width: 200px " class="btn btn-danger">-->
<?php //endif; ?>
</form>
<div class="card" style="width: 80rem; margin-left: 12%; margin-top: 5%">
	<?php if($img_from_url) : ?>
		<img style="max-height: 200px; max-width: 400px" src="<?php echo $img_path;?>">
	<?php endif; ?>
	<div class="card-body">
		<h3 class="card-header"><?php echo $post['post_title']; ?></h3>
		<div class="card-body">
			<small class="card-text">Posted on: <?php echo $post['posted_time']; ?> in </small><br>
			<?php echo $new_description; ?>
		</div>
		<?php if($this->session->userdata('usr_id') == $post['user_id']) :?>
			<a class="btn btn-secondary" style="width: 200px" href="<?php echo base_url(); ?>index.php/timeline/update/<?php echo $post['post_id']; ?>">Update Post</a>
			<?php echo form_open('/timeline/delete?id='.$post['post_id']); ?>
			<input type="submit" value="Delete Post" style="width: 200px " class="btn btn-danger">
		<?php endif; ?>
	</div>
</div>
