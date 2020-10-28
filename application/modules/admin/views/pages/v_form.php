


<div class="row">

	<div class="col-md-12 d-flex align-items-stretch grid-margin">
		<div class="row flex-grow">
			<div class="col-12">
				<?php if (validation_errors()) {
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo validation_errors(); ?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php } ?>
				<?php echo form_open('admin/pages/save_pages')?>
				<?php $id = (isset($page->id)) ? $page->id : '-1' ; ?>
				<input type="hidden" name="id" value="<?=$id?>">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Form Pages</h4>
							<div class="form-group">
								<?php $title = (isset($page->title)) ? $page->title : set_value('title') ; ?>
								<label><b>Judul</b></label>
								<input type="text" name="title" placeholder="enter judul" class="form-control" value="<?=$title; ?>">
							</div>
							<div class="form-group">
								<?php $konten = (isset($page->konten)) ? $page->konten : set_value('konten') ; ?>
								<label><b>Konten</b></label>
								<textarea class="form-control" placeholder="Enter Konten" name="konten"><?=$konten;?></textarea>
								 <input name="image" type="file" id="upload" style="display: none" onchange="">
							</div>
							<button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
							<?php echo form_close()?>
							<?php if ($id != -1) {?>
								<a href="<?=base_url('admin/pages/destroy_pages/'.$id)?>" class="btn btn-danger mr-2">Delete</a>
							<?php } ?>
							<a href="<?=base_url('admin/pages')?>" class="btn btn-primary mr-2">Back To List</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
