<!--<h2>--><?//= $title; ?><!--</h2>-->
<!---->
<?php //echo validation_errors(); ?>
<?php //echo form_open_multipart('timeline/update_submit'); ?>
<!--<input type="hidden" name="id" value="--><?php //echo $post['post_id'];?><!--">-->
<!--<div class="form-group">-->
<!--	<label>Title</label>-->
<!--	<input type="text" class="form-control" name="title" placeholder="Add Title"-->
<!--	value="--><?php //echo $post['post_title']?><!--">-->
<!--</div>-->
<!--<div class="form-group">-->
<!--	<label>Description</label>-->
<!--	<textarea id="editor1" class="form-control" name="description" placeholder="Add Body"-->
<!--			 > --><?php //echo $post['post_description']?><!--</textarea>-->
<!--</div>-->
<!---->
<!--<button type="submit" class="btn btn-secondary">Submit</button>-->
<!--</form>-->

<div class="wrapper3">
	<form class="form-create" role="form" method="post" action="<?php echo base_url('index.php/timeline/update_submit'); ?>">

		<!--validation errors-->
		<?php if (validation_errors()) : ?>
			<div class="alert alert-primary" role="alert"><?php echo validation_errors(); ?></div>
		<?php endif; ?>
		<h2 class="form-signin-heading"><?= $title; ?></h2>
		<input type="hidden" name="id" value="<?php echo $post['post_id'];?>">
		<div class="form-group">
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['post_title']?>">
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea id="editor1" class="form-control" name="description" placeholder="Add Body"><?php echo $post['post_description']?></textarea>
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
	</form>
	<?php echo form_close(); ?>

</div>
