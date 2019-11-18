<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('timeline/add'); ?>
<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea id="editor1" class="form-control" name="description" placeholder="Add Body"></textarea>
</div>

<div class="form-group">
	<label>Uplode Image</label>
	<input type="file" name="userfile" size="20">
</div>

<button type="submit" class="btn btn-secondary">Submit</button>
</form>
