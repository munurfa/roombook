<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="<?=base_url('assets/print/normalize.min.css');?>">
		<style type="text/css">
			.bldetail{
				font-weight: bold;
			}
			#detail td{
				border: 1px solid black; 
				padding: 5px;

			}
			#detail th{
				border: 1px solid black; 
				font-weight: bold;
				padding: 5px;
			}
			#nm td{
				 vertical-align: top;
				  text-align: left;
			}
		</style>
	</head>
	<body>
		<?php $this->load->model('home/M_home', 'home'); ?>
		
			<h1>Data All Shipments</h1>
		
		<hr>
		<?php if ($shipment->num_rows() > 0): ?>
				
				<?php foreach ($shipment->result() as $v): ?>
		<table width="100%" id="nm">
			<tr>
				<td class="bldetail">No AWB</td>
				<td> : </td>
				<td>#<?php echo $v->no_awb ?></td>
				<td class="bldetail">Type</td>
				<td> : </td>
				<td><?php echo $v->type ?></td>
			</tr>
			<tr>
				<td class="bldetail">Shipper</td>
				<td> : </td>

				<td>
					Nama	: <?php echo $v->nama_shipper ?><br>
					Phone	: <?php echo $v->phone_shipper ?><br>
					Alamat  : <?php echo $v->addr_shipper ?><br><?php echo $v->kel_ship_name ?> - <?php echo $v->kec_ship_name ?><br>
						<?php echo $v->kab_ship_name ?> - <?php echo $v->prov_ship_name ?>
				</td>
				<td class="bldetail">Receiver</td>
				<td> : </td>
				
				<td>
					Nama	: <?php echo $v->nama_rec ?><br>
					Phone	: <?php echo $v->phone_rec ?><br>
					Alamat  : <?php echo $v->addr_rec ?><br><?php echo $v->kel_rec_name ?> - <?php echo $v->kec_rec_name ?><br>
						<?php echo $v->kab_rec_name ?> - <?php echo $v->prov_rec_name ?>
				</td>
			</tr>
		</table><br>
		<?php $detail = $this->home->detailTrack($v->no_awb); ?>

		<table width="100%" id="detail">
			<thead>
				<tr>
					<th>Status</th>
					<th>Transit</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detail as $d): ?>
				<tr>
				
					<td><?=$d->status?></td>
					<td><?=$d->kab_shipment_name."<br>".$d->prov_shipment_name?></td>
					<td><?=$d->tgl_pickup?></td>
			
								
				</tr>	
				<?php endforeach ?>
				
			</tbody>
		</table><hr>
		<?php endforeach ?>
		<?php else: ?>
			<table>
				
					<tr>
						<td colspan="6">No Data</td>
					</tr>
			</table>
		<?php endif ?>
	</body>
</html>