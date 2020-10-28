<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="<?=base_url('assets/print/normalize.min.css');?>">
		<style type="text/css">
			body{
				font-family: Arial, Helvetica, sans-serif;
			}
			#awb{
				font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
				font-size: 18px;
				font-weight: normal;
				height: 30px;
			}
			#terbilang{
				font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
				font-size: 16px;
				font-weight: normal;
			}
			@page {
		     margin: 30px;
		    }
		</style>
	</head>
	<body>
		<div style="float:left ;border: 1px solid black;width: 50%;">
			<div style="float:left;border-right: 1px solid black;text-align: right;width: 65%;padding: 5px;height: 20%">
				<span style="font-size: 10px">Domestic &<br>International Cargo<br>VIA: -Laut -Udara -Darat<br>Jakarta - Indonesia</span>
				<h3 style="margin: 0;padding: 0">PT. Shane Guna Permata</h3>

			</div>
			<div style="float:left;border-right: 1px solid black;text-align: left;width: 10%;padding: 5px;height: 8%">
				<span style="font-size: 10px">Pcs/Koli</span>
				<span style="margin: 0;padding: 0"><?=$ship->pcs?></span>
			</div>
			<div style="float:right;width: 15%;text-align: left;padding: 5px;height: 8%">
				<span style="font-size: 10px">Berat</span>
				<span style="margin: 0;padding: 0"><?=$ship->berat?></span>
			</div>

			<div style="float:left;text-align: left;width: 28%;padding: 5px;height: 8%;border-top: 1px solid black;">
				<span style="font-size: 10px">Dimensi</span>
				<span style="margin: 0;padding: 0"><?=$ship->dimensi?></span>
			</div>
		</div>
		
		<div style="float:left;width: 23%;">
			<div style="padding: 0 5px 0 5px; text-align: center;">
				<h4 style="margin: 0;padding: 0;font-size: 13px">SURAT TANDA TERIMA</h4>
				<h4 style="margin:10px 0 0 0;padding: 4px 0 5px 0" id="awb">AWB:#<?=$ship->no_awb?></h4>
			</div>
			<div style="padding: 5px; text-align: left;border-top:1px solid black;border-bottom: 1px solid black">
				<span style="height: 8%;font-size: 10px">Berat Vol</span>
				<span style="margin: 0;padding: 0"><?=$ship->vol?></span>
			</div>
		</div>
		<div style="height: 8%;float:right;width: 26.7%;">
			<div style="padding: 0 5px 0 5px; text-align: center;border:1px solid black">
				<h4 style="margin: 0;padding: 0">SERVICE</h4>
			</div>
			<div style="padding: 5px; text-align: left;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;font-size: 10px">
				<div style="float: left">
					<?php foreach ($type as $v): ?>
						<?php $typeSelect = ($v->ID==$ship->id_type) ? 'checked="true"' : '' ; ?>
						<input type="checkbox" <?=$typeSelect ?> ><?=$v->nama?><br>
					<?php endforeach ?>
				</div>
			</div>
			<div style="padding: 5px; text-align: justify;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black">
				<span style="font-size: 10px">
					Dengan ini pengirim menytakan telah memberi keterangan sebenarnya dan menyetujui syarat-syarat berupa bukan barang yang terlarang (Narkoba, Melanggar Asusial, Dsb)
				</span>
			</div>
			<div style="padding: 5px; text-align: left;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black">
				<span style="font-weight: bold;font-size: 10px">
					<?php 
					$date=date_create($ship->tgl_pickup);
					$tgl = date_format($date,"d-m-Y H:i:s"); ?>
					Tgl. Pickup: <?=$tgl?>
				</span>
			</div>
			<div style="padding: 5px; text-align: center;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black">
				<div>
					<span style="font-weight: bold;font-size: 10px">Ada Surat Jalan</span><br>
					<input type="checkbox"> <span style="font-weight: bold;font-size: 10px">YA</span>
					<input type="checkbox"> <span style="font-weight: bold;font-size: 10px">TDK</span> <br>
					<span style="font-weight: bold;font-size: 10px">Kurir Pickup:</span><br><br>
					<span style="font-weight: bold;font-size: 10px">TTD.</span>

				</div>
			</div>
			<div style="padding: 5px; text-align: left;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black">
				<div>
					<span style="font-weight: bold;font-size: 12px;">Penerima</span><br>
				</div>
				<div>
					<div style="float: left; width: 50%">
						<span style="font-size: 10px">1.Sendiri</span><br>
						<span style="font-size: 10px">2.Suami/Istrinya</span><br>
						<span style="font-size: 10px">3.Orang Tuanya</span><br>
						<span style="font-size: 10px">4.Pembantu</span><br>
					</div>
					<div style="float: right; width: 50%">
						<span style="font-size: 10px">5.Sekretaris</span><br>
						<span style="font-size: 10px">6.Receptionist</span><br>
						<span style="font-size: 10px">7.Saudara Serumah</span><br>
						<span style="font-size: 10px">8.Satpam/Penjaga</span><br>
					</div>
					
				</div>
			</div>
			<div style="padding: 5px; text-align: left;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;height: 100%">
				<div style="float: left; width: 50%;text-align: center;">
					<span style="font-weight: bold;font-size: 12px">Pengirim:</span>
					<br>
					<br><br>
					<span style="font-weight: bold;font-size: 8px;padding:5px 0 5px 0;border-top: 1px solid black">Tanggal & Nama Jelas</span>
					
				</div>
				<div style="float: right; width: 50%;text-align: center;">
					<span style="font-weight: bold;font-size: 12px">Penerima:</span>
					<br>
					<br><br>
					<span style="font-weight: bold;font-size: 8px;padding:5px 0 5px 0;border-top: 1px solid black">Tanggal & Nama Jelas</span>
					
				</div>
			</div>
		</div>
		<?php 
			 $cash = ($ship->bayar=='cash') ? 'checked="true"' : '' ; 
            $cod = ($ship->bayar=='cod') ? 'checked="true"' : '' ; 
            $kredit = ($ship->bayar=='kredit') ? 'checked="true"' : '' ; 
		 ?>
		<div style="border: 1px solid black;float:left;width: 23.1%">
			<div style="padding: 5px;border-bottom:1px solid black">
				<span style="font-weight: bold;font-size: 12px">Pembayaran</span><br>
				<input type="checkbox" <?=$cash?> > 
				<span style="font-size: 12px">Cash</span>
				<input type="checkbox" <?=$cod?>> 
				<span style="font-size: 12px">COD</span>
				<input type="checkbox" <?=$kredit?>> 
				<span style="font-size: 12px">Kredit</span>
			</div>
			<div style="padding: 5px">
				<span style="font-size: 12px">Nama Kiriman</span><br>

				<?php if (!isset($ship->nama)): ?>
					<br>
				<?php endif ?>
				<h4 style="margin: 13px 0 0 0 ;padding: 0"><?=$ship->nama?></h4>				
			</div>
			<div style="padding: 5px;border-bottom:1px solid black;border-top:1px solid black;text-align: center;">
				<span style="font-weight: bold;font-size: 12px">Isi Kiriman</span><br>
			</div>
			<div style="padding: 5px;border-bottom:1px solid black;border-top:1px solid black;text-align: center;">
				<div style="float: left;width: 50%">
					<input type="checkbox" name=""><br>
					<span style="font-weight: bold;font-size: 11px">Tidak Diperiksa</span><br>

				</div>
				<div style="float: right;width: 50%">
					<input type="checkbox" name=""><br>
					<span style="font-weight: bold;font-size: 11px">Diperiksa</span><br>
				</div>
			</div>
		</div>
		<div style="border: 1px solid black;float:left;width: 23.3%;height: 37%;padding: 5px">
			<span style="font-size: 12px">Pengirim</span><br><br>
			<span >
				<table style="font-size: 11px;font-weight: bold;">
					<tr>
						<td colspan="3"><?=$ship->nama_shipper ?> ( <?=$ship->phone_shipper ?> )</td>
						
					</tr>
					<tr>
						<td>
							<?=$ship->addr_shipper?><br>
							<?=$ship->kel_ship_name ?> - <?=$ship->kec_ship_name ?><br>
							<?=$ship->kab_ship_name ?> - <?=$ship->prov_ship_name ?>
						</td>
					</tr>
				</table>
			</span>

		</div>
		<div style="border: 1px solid black;float:left;width: 23.3%;height: 37%;padding: 5px">
			<span style="font-size: 12px">Penerima</span><br><br>
			<span>
				<table style="font-size: 11px;font-weight: bold;">
					<tr>
						<td colspan="3"><?=$ship->nama_rec ?> ( <?=$ship->phone_rec ?> )</td>
					</tr>
					<tr>
						<td>
							<?=$ship->addr_rec?><br>
							<?=$ship->kel_rec_name ?> - <?=$ship->kec_rec_name ?><br>
							<?=$ship->kab_rec_name ?> - <?=$ship->prov_rec_name ?>
						</td>
					</tr>
				</table>
			</span>
		</div>
		<div style="border: 1px solid black;float:left;width: 47%;height: 100%;padding: 5px">
			<input type="checkbox"> <span style="font-size: 12px">Kiriman diasuransikan dengan pembayaran premi asuransi atas kehilangan atau kerusakan barang sebesar 0.25 % dari barang yang diasuransikan</span><br>
			<input type="checkbox"> <span style="font-size: 12px">Kiriman Tidak diasuransikan (Segala Kerusakan dan kehilangan akan diganti 10x biaya pengiriman dan maksimal Rp 1.000.000,-)
			</span><br><br><br>
			<span style="font-size: 12px;border-top:1px solid black;">Nama Jelas + Stempel</span>
		</div>
		<div style="border: 1px solid black;float:left;width: 23%;height: 100%;padding: 5px">
			<span style="font-size: 12px;font-weight: bold;">Biaya Kiriman:</span><br><br>
			<span style="font-size: 12px">Terbilang:</span><br><br>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
		
			<div id="terbilang">Rp <?=$ship->terbilang?>,00</div>
			
			
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
			<div style="width: 100%;height: 1px;background-color: #C0C0C0;margin: 2px 0;"></div>
		</div>
	</body>
</html>