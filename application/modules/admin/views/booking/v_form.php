    
<?php echo form_open('admin/booking/save_booking')?>
    
<div class="row">
  <div class="col-md-5 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">

      <div class="col-12 grid-margin">
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
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
           
              
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Ruang</label>
              <div class="col-sm-8">
              <?php $ruangId = (isset($book->id_ruang)) ? $book->id_ruang : set_value('id_ruang') ; ?>
             
              <select name="id_ruang" class="form-control">
                <option value="">-- Pilih Ruang --</option>
                <?php if ($ruang != null) {?>
                  <?php foreach ($ruang as $v) {?>
                  <?php $ruangSelect = ($v->id==$ruangId) ? 'selected' : '' ; ?>
                  <option value="<?=$v->id?>" <?=$ruangSelect?> ><?=$v->nama?></option>
                  <?php } ?>
                <?php } ?>
              </select>

              </div>
              <?php if (form_error('ruang_id')) {?>
              <small class="text-danger">
              <?=form_error('ruang_id')?>
              </small>
              <?php } ?>
            </div>

        <div class="form-group row">
            
            <label class="col-sm-4 col-form-label">Agenda</label>
            <?php $nama = (isset($book->nama)) ? $book->nama : set_value('agenda') ; ?>
            <div class="col-sm-8">
             
              <input type="text" class="form-control"" placeholder="Nama Agenda" name="agenda" value="<?=$nama?>">
             
              
              <?php if (form_error('agenda')) {?>
              <small class="text-danger">
              <?=form_error('agenda')?>
              </small>
              <?php } ?>
            </div>
       </div>

       <div class="form-group row">
            
            <label class="col-sm-4 col-form-label">Tanggal</label>
            <?php $tanggal = (isset($book->tanggal)) ? $book->tanggal : set_value('tanggal') ; ?>
            <div class="col-sm-8">
              <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal" name="tanggal" value="<?=$tanggal?>">
             
              
              <?php if (form_error('tanggal')) {?>
              <small class="text-danger">
              <?=form_error('tanggal')?>
              </small>
              <?php } ?>
            </div>
       </div>

       <div class="form-group row">
            <label class="col-sm-4 col-form-label">Waktu</label>
            <?php $awal = (isset($book->awal)) ? $book->awal : set_value('awal') ; ?>
            <?php $akhir = (isset($book->akhir)) ? $book->akhir : set_value('akhir') ; ?>
            <div class="col-sm-3">
              
              <input type="text" class="form-control timepicker" placeholder="Mulai" name="awal" value="<?=$awal?>">
            
              
              <?php if (form_error('awal')) {?>
              <small class="text-danger">
              <?=form_error('awal')?>
              </small>
              <?php } ?>
            </div>
            <label class="col-sm-2 col-form-label text-center">s/d</label>
            <div class="col-sm-3">
              
              <input type="text" class="form-control timepicker" placeholder="Selesai" name="akhir" value="<?=$akhir?>">
            
              
              <?php if (form_error('akhir')) {?>
              <small class="text-danger">
              <?=form_error('akhir')?>
              </small>
              <?php } ?>
            </div>
       </div>
            
            
        <div class="form-group">
          <label>Keterangan</label>
          <?php $keterangan = (isset($book->deskripsi)) ? $book->deskripsi : set_value('deskripsi') ; ?>
          <textarea style="height: 5rem" class="form-control" placeholder="Keterangan Tambahan (Optional)" name="deskripsi"><?=$keterangan?></textarea>
        </div>
        
            <div class="form-group">
              <button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
             
              <?php if ($id != -1) {?>
								<a href="<?=base_url('admin/booking/destroy/'.$id)?>" class="btn btn-danger mr-2">Hapus</a>
							<?php } ?>
              
              <a href="<?=base_url('admin/booking')?>" class="btn btn-primary mr-2">Kembali ke Daftar</a>
            </div>
          
          
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<?php echo form_close()?>

