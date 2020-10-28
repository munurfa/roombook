


<div class="row">

	<div class="col-md-5 d-flex align-items-stretch grid-margin">
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
				<?php echo form_open('admin/parameter/save_status')?>
				<?php $id = (isset($status->id)) ? $status->id : '-1' ; ?>
				<input type="hidden" name="id" value="<?=$id?>">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Form Status of Shipment</h4>
							<div class="form-group">
								<?php $nama = (isset($status->nama)) ? $status->nama : set_value('nama') ; ?>
								<label><b>Name</b></label>
								<input type="text" name="nama" placeholder="enter name status of shipment" class="form-control" value="<?=$nama; ?>">
							</div>
							<div class="form-group">
								<?php $deskripsi = (isset($status->deskripsi)) ? $status->deskripsi : set_value('deskripsi') ; ?>
								<label>Description</label>
								<textarea style="height: 5rem" class="form-control" placeholder="Enter Description (Optional)" name="deskripsi"><?=$deskripsi;?></textarea>
							</div>
							<button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
							<?php echo form_close()?>
							<?php if ($id != -1) {?>
								<a href="<?=base_url('admin/parameter/destroy_status/'.$id)?>" class="btn btn-danger mr-2">Delete</a>
							<?php } ?>
							<a href="<?=base_url('admin/parameter/status')?>" class="btn btn-primary mr-2">Back To List</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
