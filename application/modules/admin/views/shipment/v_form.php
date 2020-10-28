<script src="<?=base_url('assets/admin/js/ajax_daerah.js');?>"></script>
      <?php
        

                $date;
                if (isset($ship->tgl_pickup)) {
                  if ( (substr($id, 0, 1) == "t") && (is_numeric(substr($id, 1)) )) {
                    $date='Auto Generate';

                    $btn = '#';
                  }else{
                    $date = $ship->tgl_pickup;
                    $btn = $id;
                  }
                } else {
                  $date = 'Auto Generate';
                  $btn = '+';
                }
                
                ?>
<?php echo form_open('admin/shipment/save_shipment')?>
    
<div class="row">
  <div class="col-md-5 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">

      <?php if ($btn=='#'): ?>

      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Tracking</h4>
    
            <div class="form-group">
              <label>Kota Transit</label>
              <div class="row">
                <div class="col-sm-6">
                  <?php $provShipId = (isset($ship->prov_ship)) ? $ship->prov_ship : set_value('prov_ship') ;
                  ?>
                  <select name="prov_ship" id="propShip" onchange="ajaxkotaship(this.value)" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    <?php
                    foreach($provinsi as $data){
                    $provShipSelect = ($data->id_prov==$provShipId) ? 'selected' : '' ;?>
                    <option value="<?=$data->id_prov?>" <?=$provShipSelect?> ><?=$data->nama?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-sm-6">
                  <select name="kab_ship" id="kotaShip" onchange="ajaxkecship(this.value)" class="form-control" >
                  
                    <?php if ($btn=='#') { ?>
                      <option value="<?=$ship->kab_ship?>"selected><?=$ship->kab_shipment_name?></option>
                      <?php }elseif ($btn == $id) { ?>
                      <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                      <option value="<?=$ship->kab_ship?>" selected><?=$ship->kab_shipment_name?></option>
                      
                      <?php }elseif ($btn == '+') { ?>
                      <option value="">Pilih Kabupaten/Kota</option>
                      <?php }?>
                  
                  </select>
                </div>
                
              </div>
              <?php if (form_error('prov_ship')) :?>
              <small class="text-danger">
              <?=form_error('prov_ship')?>
              </small>
              <?php endif ?>

            </div>


            <div class="form-group">
              <label>Status of Shipment</label>
              <?php $statusId = (isset($ship->id_status)) ? $ship->id_status : set_value('status_id') ; ?>
              <select name="status_id" class="form-control form-control-lg">
                <option value="">--Choose Status</option>
                <?php foreach ($status as $v) {?>
                <?php $statusSelect = ($v->ID==$statusId) ? 'selected' : '' ; ?>
                <option value="<?=$v->ID?>" <?=$statusSelect?> ><?=$v->nama?></option>
                <?php } ?>
              </select>
              <?php if (form_error('status_id')) {?>
              <small class="text-danger">
              <?=form_error('status_id')?>
              </small>
              <?php } ?>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success mr-2">
              <?= 'Update Tracking' ?>
              </button>
              <a href="<?=base_url('admin/shipment')?>" class="btn btn-primary mr-2">Back To List</a>
            </div>
  
          </div>
        </div>
      </div>
       <?php endif ?>


      <div class="col-12 grid-margin">

        <input type="hidden" name="id" value="<?=$id?>">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Detail Shipments</h4>
            <div class="row">
              <div class="form-group col-6">
                <label><b>Date PickUp</b></label>
                
                <p class="form-control-static"><?=$date?></p>
              </div>
              <div class="form-group col-6">
                <?php $no_awb = (isset($ship->no_awb)) ? $ship->no_awb : 'Auto Generate' ; ?>
                <label><b>No. AWB</b></label>
                <input type="hidden" name="no_awb" value="<?=$no_awb?>">
                <p class="form-control-static">#<?=$no_awb?></p>
              </div>
            </div>
              
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Service of Shipment</label>
              <div class="col-sm-9">
              <?php $typeId = (isset($ship->id_type)) ? $ship->id_type : set_value('type_id') ; ?>
              <?php if ($btn=='#') { ?>
                <input type="hidden" name="type_id" value="<?=$ship->id_type?>">
                <select name="type_id" class="form-control form-control-lg" disabled>
                  <option value="">--Choose Type</option>
                  <?php foreach ($type as $v) {?>
                  <?php $typeSelect = ($v->ID==$typeId) ? 'selected' : '' ; ?>
                  <option value="<?=$v->ID?>" <?=$typeSelect?> ><?=$v->nama?></option>
                  <?php } ?>
                </select>
              <?php }else { ?>
              <select name="type_id" class="form-control form-control-lg">
                <option value="">--Choose Type</option>
                <?php foreach ($type as $v) {?>
                <?php $typeSelect = ($v->ID==$typeId) ? 'selected' : '' ; ?>
                <option value="<?=$v->ID?>" <?=$typeSelect?> ><?=$v->nama?></option>
                <?php } ?>
              </select>
              <?php } ?>
              </div>
              <?php if (form_error('type_id')) {?>
              <small class="text-danger">
              <?=form_error('type_id')?>
              </small>
              <?php } ?>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Status of Shipment</label>
              <div class="col-sm-9">
                
              
              <?php $statusId = (isset($ship->id_status)) ? $ship->id_status : set_value('status_id') ; ?>
              <?php if ($btn=='#'): ?>
                <select name="status_id" class="form-control form-control-lg" disabled="true">
                <option value="">--Choose Status</option>
                <?php foreach ($status as $v) {?>
                <?php $statusSelect = ($v->ID==$statusId) ? 'selected' : '' ; ?>
                <option value="<?=$v->ID?>" <?=$statusSelect?> ><?=$v->nama?></option>
                <?php } ?>
                </select>
              <?php else: ?>
                <select name="status_id" class="form-control form-control-lg">
                <option value="">--Choose Status</option>
                <?php foreach ($status as $v) {?>
                <?php $statusSelect = ($v->ID==$statusId) ? 'selected' : '' ; ?>
                <option value="<?=$v->ID?>" <?=$statusSelect?> ><?=$v->nama?></option>
                <?php } ?>
                </select>
              <?php endif ?>
                </div>
            
              
              <?php if (form_error('status_id')) {?>
              <small class="text-danger">
              <?=form_error('status_id')?>
              </small>
              <?php } ?>
            </div>
       
      <div class="form-group row">
            <?php if (isset($ship->nama)) { ?>
            <input type="hidden" name="nama" value="<?=$ship->nama?>">
            <?php } ?>
            <label class="col-sm-4 col-form-label">Nama Kiriman</label>
            <?php $nama = (isset($ship->nama)) ? "$ship->nama" : set_value('nama') ; ?>
            <div class="col-sm-8">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control"" placeholder="Enter Nama Kiriman" name="nama" value="<?=$nama?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control"" placeholder="Enter Nama Kiriman" name="nama" value="<?=$nama?>">
              <?php } ?>
              
              <?php if (form_error('nama')) {?>
              <small class="text-danger">
              <?=form_error('nama')?>
              </small>
              <?php } ?>
            </div>
       </div>

       <div class="form-group row">
            <?php if (isset($ship->pcs)) { ?>
            <input type="hidden" name="pcs" value="<?=$ship->pcs?>">
            <?php } ?>
            <label class="col-sm-4 col-form-label">PCS/Koli</label>
            <?php $pcs = (isset($ship->pcs)) ? "$ship->pcs" : set_value('pcs') ; ?>
            <div class="col-sm-8">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control"" placeholder="Enter Jumlah (Pcs/Koli)" name="pcs" value="<?=$pcs?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control"" placeholder="Enter Jumlah (Pcs/Koli)" name="pcs" value="<?=$pcs?>">
              <?php } ?>
              
              <?php if (form_error('pcs')) {?>
              <small class="text-danger">
              <?=form_error('pcs')?>
              </small>
              <?php } ?>
            </div>
       </div>

       <div class="form-group row">
            <?php if (isset($ship->berat)) { ?>
            <input type="hidden" name="berat" value="<?=$ship->berat?>">
            <?php } ?>
            <label class="col-sm-4 col-form-label">Berat</label>
            <?php $berat = (isset($ship->berat)) ? "$ship->berat" : set_value('pcs') ; ?>
            <div class="col-sm-8">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control"" placeholder="Enter Berat (Kg)" name="berat" value="<?=$berat?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control"" placeholder="Enter Berat (Kg)" name="berat" value="<?=$berat?>">
              <?php } ?>
              
              <?php if (form_error('berat')) {?>
              <small class="text-danger">
              <?=form_error('berat')?>
              </small>
              <?php } ?>
            </div>
       </div>
                    
       <div class="form-group row">
            <?php if (isset($ship->dimensi)) { ?>
            <input type="hidden" name="dimensi" value="<?=$ship->dimensi?>">
            <?php } ?>
            <label class="col-sm-4 col-form-label">Dimensi<br>(p x l x t)</label>
            <?php $dimensi = (isset($ship->dimensi)) ? "$ship->dimensi" : set_value('dimensi') ; ?>
            <div class="col-sm-8">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control" placeholder="Enter Dimensi" name="dimensi" value="<?=$dimensi?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control" placeholder="Enter Dimensi" name="dimensi" value="<?=$dimensi?>">
              <?php } ?>
              
              <?php if (form_error('dimensi')) {?>
              <small class="text-danger">
              <?=form_error('dimensi')?>
              </small>
              <?php } ?>
            </div>
       </div>

       <div class="form-group row">
            <?php if (isset($ship->vol)) { ?>
            <input type="hidden" name="vol" value="<?=$ship->vol?>">
            <?php } ?>
            <label class="col-sm-4 col-form-label">Volume</label>
            <?php $vol = (isset($ship->vol)) ? "$ship->vol" : set_value('vol') ; ?>
            <div class="col-sm-8">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control" placeholder="Enter Volume" name="vol" value="<?=$vol?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control" placeholder="Enter Volume" name="vol" value="<?=$vol?>">
              <?php } ?>
              
              <?php if (form_error('vol')) {?>
              <small class="text-danger">
              <?=form_error('vol')?>
              </small>
              <?php } ?>
            </div>
       </div>
       
        <div class="form-group row">
            <?php if (isset($ship->terbilang)) { ?>
            <input type="hidden" name="terbilang" value="<?=$ship->terbilang?>">
            <?php } ?>
            <label class="col-sm-4 col-form-label">Terbilang</label>
            <?php $terbilang = (isset($ship->terbilang)) ? "$ship->terbilang" : set_value('terbilang') ; ?>
            <div class="col-sm-8">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control" placeholder="Enter Terbilang" name="terbilang" value="<?=$terbilang?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control" placeholder="Enter Terbilang" name="terbilang" value="<?=$terbilang?>">
              <?php } ?>
              
              <?php if (form_error('vol')) {?>
              <small class="text-danger">
              <?=form_error('terbilang')?>
              </small>
              <?php } ?>
            </div>
       </div>

       <div class="form-group row">
           
            <label class="col-sm-4 col-form-label">Pembayaran</label>
            <div class="col-sm-8">
            <?php $bayar = (isset($ship->bayar)) ? $ship->bayar : set_value('bayar') ; ?>
              <?php if ($btn=='#'): ?>
                 <input type="hidden" name="bayar" value="<?=$ship->bayar?>">
                 <select name="bayar" class="form-control form-control-lg" disabled="">
                <?php 
                $cash = ($bayar=='cash') ? 'selected' : '' ; 
                $cod = ($bayar=='cod') ? 'selected' : '' ; 
                $kredit = ($bayar=='kredit') ? 'selected' : '' ; 
                ?>
                
                  <option value="cash" <?=$cash?> >CASH</option>
                  <option value="cod" <?=$cod?> >COD</option>
                  <option value="kredit" <?=$kredit?> >Kredit</option>
                  
                </select>
              <?php else: ?>
                
                <select name="bayar" class="form-control form-control-lg">
                  <?php 
                  $cash = ($bayar=='cash') ? 'selected' : '' ; 
                  $cod = ($bayar=='cod') ? 'selected' : '' ; 
                  $kredit = ($bayar=='kredit') ? 'selected' : '' ; 
                  ?>
                
                  <option value="cash" <?=$cash?> >CASH</option>
                  <option value="cod" <?=$cod?> >COD</option>
                  <option value="kredit" <?=$kredit?> >Kredit</option>

                </select>
            
              <?php endif ?>

         
              
              <?php if (form_error('bayar')) {?>
              <small class="text-danger">
              <?=form_error('bayar')?>
              </small>
              <?php } ?>
            </div>
       </div>       
            
            <div class="form-group">
              <label>Keterangan</label>
              <?php $keterangan = (isset($ship->ket)) ? "$ship->ket" : set_value('keterangan') ; ?>
              <textarea style="height: 5rem" class="form-control" placeholder="Enter Comments (Optional)" name="keterangan"><?=$keterangan?></textarea>
            </div>
            <?php if ($btn!='#') { ?>
            <div class="form-group">
              
              
              <?php if ($btn == $id) { ?>
              <button type="submit" class="btn btn-success mr-2">
              <?= 'Edit' ?>
              </button>
              <a href="<?=base_url('admin/shipment/destroy/'.$id.'/'.$ship->no_awb.'/'.$ship->id_shipper.'/'.$ship->id_receiver)?>" class="btn btn-danger mr-2">Delete</a>
              <?php }elseif ($btn == '+') { ?>
              <button type="submit" class="btn btn-success mr-2">
              <?= 'Save' ?>
              </button>
              <?php } ?>
              <a href="<?=base_url('admin/shipment')?>" class="btn btn-primary mr-2">Back To List</a>
            </div>
              <?php } ?>
          
          
          </div>
        </div>
      </div>
    </div>
  </div>




<div class="col-md-7 d-flex align-items-stretch grid-margin">
  <div class="row flex-grow">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Shipper/Pengirim</h4>
          <div class="form-group row">
            <?php if (isset($ship->id_shipper)) { ?>
            <input type="hidden" name="id_shipper" value="<?=$ship->id_shipper?>">
            <?php } ?>
            <label class="col-sm-3 col-form-label">Name</label>
            <?php $shipper_name = (isset($ship->nama_shipper)) ? "$ship->nama_shipper" : set_value('shipper_name') ; ?>
            <div class="col-sm-9">
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control"" placeholder="Enter Shipper Name" name="shipper_name" value="<?=$shipper_name?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control"" placeholder="Enter Shipper Name" name="shipper_name" value="<?=$shipper_name?>">
              <?php } ?>
              
              <?php if (form_error('shipper_name')) {?>
              <small class="text-danger">
              <?=form_error('shipper_name')?>
              </small>
              <?php } ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Phone</label>
            <?php $phone_shipper = (isset($ship->phone_shipper)) ? "$ship->phone_shipper" : set_value('phone_shipper') ; ?>
            <div class="col-sm-9">
              
              <?php if ($btn=='#') { ?>
              <input type="text" class="form-control"placeholder="Enter Shipper Phone" name="phone_shipper" value="<?=$phone_shipper?>" disabled>
              <?php }else { ?>
              <input type="text" class="form-control"placeholder="Enter Shipper Phone" name="phone_shipper" value="<?=$phone_shipper?>">
              <?php } ?>
              <?php if (form_error('phone_shipper')) {?>
              <small class="text-danger">
              <?=form_error('phone_shipper')?>
              </small>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3">
                <?php $provId = (isset($ship->prov_shipper)) ? $ship->prov_shipper : set_value('prov_shipper') ;
                ?>
                <select name="prov_shipper" id="prop" onchange="ajaxkota(this.value)" class="form-control">
                  <?php if ($btn=='#') { ?>
                  <option value="<?=$ship->prov_shipper?>" disabled selected><?=$ship->prov_ship_name?></option>
                  <?php }elseif ($btn == $id) { ?>
                  <option value="">Pilih Provinsi</option>
                  <?php
                  foreach($provinsi as $data){
                  $provSelect = ($data->id_prov==$provId) ? 'selected' : '' ;?>
                  <option value="<?=$data->id_prov?>" <?=$provSelect?> ><?=$data->nama?></option>
                  <?php } ?>
                  <?php }elseif ($btn == '+') { ?>
                  <option value="">Pilih Provinsi</option>
                  <?php
                  foreach($provinsi as $data){
                  $provSelect = ($data->id_prov==$provId) ? 'selected' : '' ;?>
                  <option value="<?=$data->id_prov?>" <?=$provSelect?> ><?=$data->nama?></option>
                  <?php }?>
                  <?php } ?>
                  <select>
                  </div>
                  <div class="col-sm-3">
                    <select name="kab_shipper" id="kota" onchange="ajaxkec(this.value)" class="form-control" >
                      <?php if ($btn=='#') { ?>
                      <option value="<?=$ship->kab_shipper?>" disabled selected><?=$ship->kab_ship_name?></option>
                      <?php }elseif ($btn == $id) { ?>
                      <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                      <option value="<?=$ship->kab_shipper?>" selected><?=$ship->kab_ship_name?></option>
                      
                      <?php }elseif ($btn == '+') { ?>
                      <option value="">Pilih Kabupaten/Kota</option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <select name="kec_shipper" id="kec" onchange="ajaxkel(this.value)" class="form-control" >
                      <?php if ($btn=='#') { ?>
                      <option value="<?=$ship->kec_shipper?>" disabled selected><?=$ship->kec_ship_name?></option>
                      <?php }elseif ($btn == $id) { ?>
                      <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                      <option value="<?=$ship->kec_shipper?>" selected><?=$ship->kec_ship_name?></option>
                      
                      <?php }elseif ($btn == '+') { ?>
                      <option value="">Pilih Kecamatan</option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <select name="kel_shipper" id="kel" class="form-control" >
                      
                      <?php if ($btn=='#') { ?>
                      <option value="<?=$ship->kel_shipper?>" disabled selected><?=$ship->kel_ship_name?></option>
                      <?php }elseif ($btn == $id) { ?>
                      <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                      <option value="<?=$ship->kel_shipper?>" selected><?=$ship->kel_ship_name?></option>
                      
                      <?php }elseif ($btn == '+') { ?>
                      <option value="">Pilih Desa/Kelurahan</option>
                      <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              <?php if (form_error('prov_shipper')) {?>
              <small class="text-danger">
              <?=form_error('prov_shipper')?>
              </small>
              <?php } ?>
              <div class="form-group">
                <label>Address</label>
                <?php $addr_ship = (isset($ship->addr_shipper)) ? "$ship->addr_shipper" : set_value('addr_ship') ; ?>
                <?php if ($btn=='#') { ?>
                <textarea style="height: 5rem" class="form-control" placeholder="Enter Address" name="addr_ship" disabled><?=$addr_ship ?></textarea>
                <?php }else { ?>
                <textarea style="height: 5rem" class="form-control" placeholder="Enter Address" name="addr_ship"><?=$addr_ship?></textarea>
                <?php } ?>
                
              </div>
            </div>
          </div>

        </div>
      
    <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Receiver/Penerima</h4>
              
              <div class="form-group row">
                <?php if (isset($ship->id_receiver)) { ?>
                <input type="hidden" name="id_receiver" value="<?=$ship->id_receiver?>">
                <?php } ?>
                <label class="col-sm-3 col-form-label">Name</label>
                <?php $rec_name = (isset($ship->nama_rec)) ? "$ship->nama_rec" : set_value('rec_name') ; ?>
                <div class="col-sm-9">
                  
                  <?php if ($btn=='#') { ?>
                  <input type="text" class="form-control"placeholder="Enter Receiver Name" name="rec_name" value="<?=$rec_name?>" disabled>
                  <?php }else { ?>
                  <input type="text" class="form-control"placeholder="Enter Receiver Name" name="rec_name" value="<?=$rec_name?>">
                  <?php } ?>
                  <?php if (form_error('rec_name')) {?>
                  <small class="text-danger">
                  <?=form_error('rec_name')?>
                  </small>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Phone</label>
                <?php $phone_rec = (isset($ship->phone_rec)) ? "$ship->phone_rec" : set_value('phone_rec') ; ?>
                <div class="col-sm-9">
                  <?php if ($btn=='#') { ?>
                  <input type="text" class="form-control" placeholder="Enter Receiver Phone" name="phone_rec" value="<?=$phone_rec?>" disabled>
                  <?php }else { ?>
                  <input type="text" class="form-control" placeholder="Enter Receiver Phone" name="phone_rec" value="<?=$phone_rec?>">
                  <?php } ?>
                  
                  <?php if (form_error('phone_rec')) {?>
                  <small class="text-danger">
                  <?=form_error('phone_rec')?>
                  </small>
                  <?php } ?>
                </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <?php $provRecId = (isset($ship->prov_rec)) ? $ship->prov_rec : set_value('prov_rec') ;
                    ?>
                    <select name="prov_rec" id="rec_prop" onchange="ajaxkotarec(this.value)" class="form-control">
                      <?php if ($btn=='#') { ?>
                      <option value="<?=$ship->prov_rec?>" disabled selected><?=$ship->prov_rec_name?></option>
                      <?php }elseif ($btn == $id) { ?>
                      <option value="">Pilih Provinsi</option>
                      <?php
                      foreach($provinsi as $data){
                      $provRecSelect = ($data->id_prov==$provRecId) ? 'selected' : '' ;?>
                      <option value="<?=$data->id_prov?>" <?=$provRecSelect?> ><?=$data->nama?></option>
                      <?php } ?>
                      <?php }elseif ($btn == '+') { ?>
                      <option value="">Pilih Provinsi</option>
                      <?php
                      foreach($provinsi as $data){
                      $provRecSelect = ($data->id_prov==$provRecId) ? 'selected' : '' ;?>
                      <option value="<?=$data->id_prov?>" <?=$provRecSelect?> ><?=$data->nama?></option>
                      <?php } ?>
                      <?php } ?>
                      
                      <select>
                      </div>
                      <div class="col-sm-3">
                        <select name="kab_rec" id="rec_kota" onchange="ajaxkecrec(this.value)" class="form-control" >
                          <?php if ($btn=='#') { ?>
                          <option value="<?=$ship->kab_rec?>" disabled selected><?=$ship->kab_rec_name?></option>
                          <?php }elseif ($btn == $id) { ?>
                          <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                          <option value="<?=$ship->kab_rec?>" selected><?=$ship->kab_rec_name?></option>
                          
                          <?php }elseif ($btn == '+') { ?>
                          <option value="">Pilih Kabupaten/Kota</option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select name="kec_rec" id="rec_kec" onchange="ajaxkelrec(this.value)" class="form-control" >
                          <?php if ($btn=='#') { ?>
                          <option value="<?=$ship->kec_rec?>" disabled selected><?=$ship->kec_rec_name?></option>
                          <?php }elseif ($btn == $id) { ?>
                          <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                          <option value="<?=$ship->kec_rec?>" selected><?=$ship->kec_rec_name?></option>
                          
                          <?php }elseif ($btn == '+') { ?>
                          <option value="">Pilih Kecamatan</option>
                          <?php }?>
                          
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select name="kel_rec" id="rec_kel" class="form-control" >
                          
                          <?php if ($btn=='#') { ?>
                          <option value="<?=$ship->kel_rec?>" disabled selected><?=$ship->kel_rec_name?></option>
                          <?php }elseif ($btn == $id) { ?>
                          <option value="">Pilih Ulang Dari Provinsi Bila Ingin Merubah</option>
                          <option value="<?=$ship->kel_rec?>" selected><?=$ship->kel_rec_name?></option>
                          
                          <?php }elseif ($btn == '+') { ?>
                          <option value="">Pilih Desa/Kelurahan</option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <?php if (form_error('prov_rec')) {?>
                    <small class="text-danger">
                    <?=form_error('prov_rec')?>
                    </small>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <?php $addr_rec = (isset($ship->addr_rec)) ? "$ship->addr_rec" : set_value('addr_rec') ; ?>
                    <?php if ($btn=='#') { ?>
                    <textarea style="height: 5rem" class="form-control" placeholder="Enter Address" name="addr_rec" disabled><?=$addr_rec?></textarea>
                    <?php }else { ?>
                    <textarea style="height: 5rem" class="form-control" placeholder="Enter Address" name="addr_rec"><?=$addr_rec?></textarea>
                    <?php } ?>
                    
                    
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
</form>
<?php if ($this->session->flashdata('msg')) {
?>
<script type="text/javascript">
$(document).ready(function() {
  window.open(base_url+'admin/shipment/detail_cetak/'+'<?=$this->session->flashdata('msg')?>','_blank');
})
</script>
<?php } ?>