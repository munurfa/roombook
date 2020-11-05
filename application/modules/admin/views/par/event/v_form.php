


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
				<?php if ($this->session->flashdata('msg')) {
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('msg'); ?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php } ?>
				<?php echo form_open('admin/parameter/save_event')?>
				<?php $id = (isset($event->id)) ? $event->id : '-1' ; ?>
				<input type="hidden" name="id" value="<?=$id?>">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><?=$title?></h4>
							<div class="form-group">
								<?php $nama = (isset($event->nama)) ? $event->nama : set_value('nama') ; ?>
								<label><b>Name</b></label>
								<input type="text" name="nama" placeholder="enter name status of shipment" class="form-control" value="<?=$nama; ?>">
							</div>
							<div class="form-group">
								<?php $start = (isset($event->start_time)) ? $event->start_time : set_value('start') ; ?>
								<label><b>Tanggal Mulai</b></label>
								<input type="text" name="start" class="form-control datetimepicker" value="<?=$start; ?>" placeholder="Klik untuk memilih tanggal">
							</div>
							<div class="form-group">
								<?php $end = (isset($event->end_time)) ? $event->end_time : set_value('start') ; ?>
								<label><b>Tanggal Selesai</b></label>
								<input type="text" name="end" class="form-control datetimepicker" value="<?=$end; ?>" placeholder="Klik untuk memilih tanggal">
							</div>
							<div class="form-group">
								<?php $deskripsi = (isset($event->deskripsi)) ? $event->deskripsi : set_value('deskripsi') ; ?>
								<label><b>Description</b></label>
								<textarea style="height: 5rem" class="form-control" placeholder="Enter Description (Optional)" name="deskripsi"><?=$deskripsi;?></textarea>
							</div>
							<button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
							<?php echo form_close()?>
							<?php if ($id != -1) {?>
								<a href="<?=base_url('admin/parameter/destroy_event/'.$id)?>" class="btn btn-danger mr-2">Hapus</a>
							<?php } ?>
							<a href="<?=base_url('admin/parameter/event')?>" class="btn btn-primary mr-2">Kembali ke Daftar</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
