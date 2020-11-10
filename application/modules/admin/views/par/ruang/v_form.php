


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
        <?php echo form_open('admin/parameter/save_ruang')?>
        <?php $id = (isset($ruang->id)) ? $ruang->id : '-1' ; ?>
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
              <div class="form-group">
                <?php $nama = (isset($ruang->nama)) ? $ruang->nama : set_value('nama') ; ?>
                <label><b>Nama</b></label>
                <input type="text" name="nama" placeholder="Nama Ruangan" class="form-control" value="<?=$nama; ?>">
              </div>

              <div class="form-group">
                <?php $kategori = (isset($ruang->kategori)) ? $ruang->kategori : set_value('kategori') ; ?>
                <label><b>Kategori</b></label>
                <select name="kategori" id="kategori"  class="form-control">
                    <option value="">Pilih Kategori</option>
                  
                    <option value="0" <?=($kategori==0)?'selected':''?> >Biasa</option>
                    <option value="1" <?=($kategori==1)?'selected':''?> >Khusus</option>
                 
                  </select>
              </div>
              <?php if (count($special)==0 || in_array($id, $special)):?>
              
              
              <div class="form-group">
                <?php $special = (isset($ruang->is_special)) ? $ruang->is_special : set_value('special') ; ?>
              
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="special" <?=($special==1)?'checked':''?>> Apakah Spesial ?&nbsp;(Ruang yang dipakai untuk event khusus) <i class="input-helper"></i>
                  </label>
                </div>
              </div>

              <?php endif ?>

              <div class="form-group">
                <label for=""><b>Fasilitas</b></label>
            
              <?php 
              $fasili = (is_array(set_value('fasilitas[]')))?set_value('fasilitas[]'): [];?>
               <?php foreach($fasilitas as $fas):?>
                <div class="form-check">
                  <label class="form-check-label">
                 

                   

                    <?php 
                    if ($id=='-1') {
                      $fasil = (in_array($fas->id, $fasili)) ? 'checked' : '';
                    }else{
                      $fasil = (in_array($fas->id, $fasilitasRuang)) ? 'checked' : '' ; 

                    }
                    ?>
                    <input type="checkbox" class="form-check-input" name="fasilitas[]" <?=$fasil?> value="<?=$fas->id?>"> <?=$fas->nama?> <i class="input-helper" ></i>
                  
                  </label>
                </div>
                <?php endforeach?>
              </div>

              <div class="form-group">
                <?php $deskripsi = (isset($ruang->deskripsi)) ? $ruang->deskripsi : set_value('deskripsi') ; ?>
                <label>Description</label>
                <textarea style="height: 5rem" class="form-control" placeholder="Enter Description (Optional)" name="deskripsi"><?=$deskripsi;?></textarea>
              </div>
              <button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
              <?php echo form_close()?>
              <?php if ($id != -1) {?>
                <a href="<?=base_url('admin/parameter/destroy_ruang/'.$id)?>" class="btn btn-danger mr-2">Hapus</a>
              <?php } ?>
              <a href="<?=base_url('admin/parameter/ruang')?>" class="btn btn-primary mr-2">Kembali ke Daftar</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
