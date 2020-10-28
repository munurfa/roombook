<style type="text/css">
			<?php foreach ($slide as $s): ?>
				
			
			.carousel .item.item<?=$s->id ?> {
			background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?=base_url('slide/').$s->file_name?>) no-repeat;
			background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?=base_url('slide/').$s->file_name?>) no-repeat;
			background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?=base_url('slide/').$s->file_name?>) no-repeat;
			background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?=base_url('slide/').$s->file_name?>) no-repeat;
			background-size: cover;
			}
			
			<?php endforeach ?>
			</style>

<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php foreach ($slide as $s): ?>
			<li data-target="#myCarousel" data-slide-to="<?=$s->id ?>"></li>
			<?php endforeach ?>
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php foreach ($slide as $s): ?>
			<div class="item item<?=$s->id ?>">
				<div class="container">
					<div class="carousel-caption">
						<h3><?=$s->title ?></h3>
						<p><?=$s->subtitle ?></p>
					</div>
				</div>
			</div>
			<?php endforeach ?>

		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
<!--//banner -->
<!--/search_form -->
<div id="search_form" class="search_top">
	<h2>Lihat Tracking</h2>
	<?= form_open('home', ['method'=>'GET']); ?>
	<?php $oldValue = (isset($oldValue)) ? $oldValue : '' ; ?>
	<input type="text" name="no_awb" placeholder="Masukkan No AWB (Pisahkan dengan Koma)" value="<?= $oldValue?>">
	<input type="submit" value="Cari">
	
	<div class="clearfix"></div>
</form><br>
<?php if (form_error('no_awb')) {?>
<b class="text-danger">
<?= form_error('no_awb') ?>
</b>
<?php }?>
</div>
<!--//search_form -->
<?php if (isset($tracking)): ?>
<div class="mid_services">
<div class="col-md-8 col-md-offset-2 according_inner_grids">
	<h3 class="agile_heading two">Hasil Tracking</h3>
	<div class="according_info">
		<?php if ($tracking==false): ?>
		<p>Tidak Ada Hasil</p>
		
		<?php else: ?>
		<div class="panel-group about_panel" id="accordion" role="tablist" aria-multiselectable="true">
			<?php $this->load->model('M_home', 'home'); ?>

			<?php foreach ($tracking as $v): ?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="head<?=$v->no_awb?>">
					<h4 class="panel-title asd">
					<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?=$v->no_awb?>" aria-expanded="true"
						aria-controls="collapseOne">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus"></i>#<?=$v->no_awb?> Shipper: "<?=$v->nama_shipper?>" | Receiver: "<?=$v->nama_rec?>" | Type: "<?=$v->type?>"
					</a>
					</h4>
				</div>
				<div id="<?=$v->no_awb?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<?php $detail = $this->home->detailTrack($v->no_awb); ?>
					<div class="panel-body panel_text">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Status</th>
									<th>Transit</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($detail as $d): ?>
								<tr>
									<td><?=$d->status?></td>
									<td><?=$d->kab_shipment_name.", ".$d->prov_shipment_name?></td>
									<td><?=$d->tgl_pickup?></td>
								</tr>
								<?php endforeach ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php endforeach ?>
			
		</div>
		<?php endif ?>
	</div>
</div>
<!-- <div class="col-md-6 mid_services_img">
</div> -->
<div class="clearfix"> </div>
</div>
<?php endif ?>


<script type="text/javascript">
	
	$(document).ready(function() {
		$('.carousel-inner div:first').addClass('active');
	});
</script>