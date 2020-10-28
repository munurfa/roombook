


<div class="row">

  <div class="col-md-5 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        
        <?php echo form_open('admin/report/cetak',['method'=>'GET'])?>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><b>Form Report</b></h4>
              <div class="form-group">
                <label><b>No AWB</b></label>
                <input type="text" name="no_awb" placeholder="Pisahkan dengan koma jika lebih dari satu" class="form-control" value="<?=set_value('no_awb') ?>">
              </div>
               <div class="form-group">
              <label><b>Type of Shipment</b></label>
             
          
              <select name="type_id" class="form-control form-control-lg">
                <option value="">--Choose Type</option>
                <?php foreach ($type as $v) {?>
                <?php $typeSelect = ($v->ID==set_value('type_id')) ? 'selected' : '' ; ?>
                <option value="<?=$v->ID?>" <?=$typeSelect?> ><?=$v->nama?></option>
                <?php } ?>
              </select>
            
            </div>
            <div class="form-group">
              <label><b>Status of Shipment</b></label>
             
              <select name="status_id" class="form-control form-control-lg">
                <option value="">--Choose Status</option>
                <?php foreach ($status as $v) {?>
                <?php $statusSelect = ($v->ID==set_value('status_id')) ? 'selected' : '' ; ?>
                <option value="<?=$v->ID?>" <?=$statusSelect?> ><?=$v->nama?></option>
                <?php } ?>
              </select>
          
           
            </div>
            <div class="form-group">
              <label><b>Tanggal</b></label>
              <div class="form-inline">
                <input type="date"  name="awal" class="form-control">&nbsp &nbsp
                <input type="date"  name="akhir" class="form-control">
              </div>
            
          </div>



              <button type="submit" class="btn btn-success mr-2">Filter & Cetak</button>
              <?php echo form_close()?>
            

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
