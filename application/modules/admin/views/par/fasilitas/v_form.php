


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
        <?php echo form_open('admin/parameter/save_fasilitas')?>
        <?php $id = (isset($fasilitas->id)) ? $fasilitas->id : '-1' ; ?>
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
              <div class="form-group">
                <?php $nama = (isset($fasilitas->nama)) ? $fasilitas->nama : set_value('nama') ; ?>
                <label><b>Nama</b></label>
                <input type="text" name="nama" placeholder="Nama Fasilitas" class="form-control" value="<?=$nama; ?>">
              </div>

              <div class="form-group">
                <?php $aktif = (isset($fasilitas->is_aktif)) ? $fasilitas->is_aktif : set_value('aktif') ; ?>
                <label><b>Apakah Aktif ?</b></label>
                <select name="aktif" id="aktif"  class="form-control">
                    <option value="0" <?=($aktif==0)?'selected':''?> >Tidak</option>
                    <option value="1" <?=($aktif==1)?'selected':''?> >Aktif</option>
                  </select>
              </div>
             

              <div class="form-group">
                <?php $deskripsi = (isset($fasilitas->deskripsi)) ? $fasilitas->deskripsi : set_value('deskripsi') ; ?>
                <label>Description</label>
                <textarea style="height: 5rem" class="form-control" placeholder="Enter Description (Optional)" name="deskripsi"><?=$deskripsi;?></textarea>
              </div>
              <button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
              <?php echo form_close()?>
              <?php if ($id != -1) {?>
                <a href="<?=base_url('admin/parameter/destroy_fasilitas/'.$id)?>" class="btn btn-danger mr-2">Hapus</a>
              <?php } ?>
              <a href="<?=base_url('admin/parameter/fasilitas')?>" class="btn btn-primary mr-2">Kembali ke Daftar</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
