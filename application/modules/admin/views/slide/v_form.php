

<div class="row">

	<div class="col-md-5 d-flex align-items-stretch grid-margin">
		<div class="row flex-grow">
			<div class="col-12">
				<?php if ($this->session->flashdata('error')) {
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('error'); ?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php } ?>

				<?php if (validation_errors()) {
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo validation_errors(); ?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php } ?>


				<?php echo form_open_multipart('admin/slide/save_slide');?>
				<?php $id = (isset($slide->id)) ? $slide->id : '-1' ; ?>
				<input type="hidden" name="id" value="<?=$id?>">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Form Slide</h4>
							<div class="form-group">
								<?php $title = (isset($slide->title)) ? $slide->title : set_value('title') ; ?>
								<label><b>Title</b></label>
								<input type="text" name="title" placeholder="enter title slide" class="form-control" value="<?=$title; ?>">
							</div>
							<div class="form-group">
								<?php $subtitle = (isset($slide->subtitle)) ? $slide->subtitle : set_value('sub_title') ; ?>
								<label><b>Sub Title</b></label>
								<input type="text" name="sub_title" placeholder="enter sub title slide" class="form-control" value="<?=$subtitle; ?>">
							</div>
							<div class="form-group">
								<?php $image = (isset($slide->file_name)) ? $slide->file_name : '' ; ?>
								<label><b>Upload </b>( ukuran yang direkomendasikan <b><i>1680 x 700</i></b> )</label>
								<input type="file" name="file_name" value="<?=$image?>" /><br><br>
								<?php if ($image!=''): ?>
									
									<img src="<?=base_url('slide/').$image?>" width="100%">
									<input type="hidden" value="<?php echo $image ?>" name="image">
								<?php endif ?>
							</div>
							
							<button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
							<?php echo form_close()?>
							<?php if ($id != -1) {?>
								<a href="<?=base_url('admin/slide/destroy_slide/'.$id)?>" class="btn btn-danger mr-2">Delete</a>
							<?php } ?>
							<a href="<?=base_url('admin/slide')?>" class="btn btn-primary mr-2">Back To List</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
