<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('timeline/update_submit'); ?>
<input type="hidden" name="id" value="<?php echo $post['id'];?>">
<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title"
	value="<?php echo $post['post_title']?>">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea id="editor1" class="form-control" name="description" placeholder="Add Body"
			 > <?php echo $post['post_description']?></textarea>
</div>

<button type="submit" class="btn btn-secondary">Submit</button>
</form>
