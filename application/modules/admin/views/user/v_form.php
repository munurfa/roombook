<div class="row">

  <div class="col-md-5 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
       
        <?php echo form_open('admin/users/save_user')?>
        <?php $id = (isset($user->ID)) ? $user->ID : '-1' ; ?>
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Users</h4>

              <div class="form-group">
                <?php $nama = (isset($user->nama_user)) ? $user->nama_user : set_value('nama') ; ?>
                <label><b>Nama</b></label>
                <input type="text" name="nama" placeholder="enter name User" class="form-control" value="<?=$nama; ?>">
              </div>
                <?php if (form_error('nama')) {?>
                <small class="text-danger">
                <?=form_error('nama')?>
                </small>
                <?php } ?>

              <div class="form-group">
                <?php $nip = (isset($user->no_id)) ? $user->no_id : set_value('no_id') ; ?>
                <label><b>NIP</b></label>
                <input type="text" name="no_id" placeholder="enter NIP" class="form-control" value="<?=$nip; ?>">
              </div>
                <?php if (form_error('no_id')) {?>
                <small class="text-danger">
                <?=form_error('no_id')?>
                </small>
                <?php } ?>


               <div class="form-group">
              <label><b>Role</b></label>
              <div class="row">
                <div class="col-sm-6">
                  <?php $levelId = (isset($user->level_id)) ? $user->level_id : set_value('level_id') ;
                  ?>
                  <select name="level_id" id="level" class="form-control">
                    <option value="">Pilih Role</option>
                    <?php
                    foreach($level as $data){
                    $levelSelect = ($data->id == $levelId) ? 'selected' : '' ;?>
                    <option value="<?=$data->id?>" <?=$levelSelect?> ><?=$data->nama?></option>
                    <?php } ?>
                  </select>
                </div>
              
              </div>
            </div>
              <?php if (form_error('level')) {?>
              <small class="text-danger">
              <?=form_error('level')?>
              </small>
              <?php } ?>

              <div class="form-group">
                <?php $username = (isset($user->username)) ? $user->username : set_value('username') ; ?>
                <label><b>Username</b></label>
                <input type="text" name="username" placeholder="enter username" class="form-control" value="<?=$username; ?>">
              </div>
                <?php if (form_error('username')) {?>
                <small class="text-danger">
                <?=form_error('username')?>
                </small>
                <?php } ?>


              <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" name="passwd" placeholder="enter password" class="form-control" value="">
              </div>
                <?php if (form_error('passwd')) {?>
                <small class="text-danger">
                <?=form_error('passwd')?>
                </small>
                <?php } ?>


               <div class="form-group">
              <label><b>Aktif</b></label>
              <div class="row">
                <div class="col-sm-6">
                  <?php $aktifId = (isset($user->aktif)) ? $user->aktif : set_value('aktif') ;
                  ?>
                  <select name="aktif" id="aktif" class="form-control">

                    <option value="0" <?=($aktifId==0) ? 'selected' : ''?> >Tidak</option>
                    <option value="1" <?=($aktifId==1) ? 'selected' : ''?>>Ya</option>

                  </select>
                </div>
              
              </div>
            </div>
              <?php if (form_error('aktif')) {?>
              <small class="text-danger">
              <?=form_error('aktif')?>
              </small>
              <?php } ?>

              
              <button type="submit" class="btn btn-success mr-2"><?= ($id != -1) ? 'Edit' : 'Save' ; ?></button>
              <?php echo form_close()?>

              <?php if ($id != -1) {?>
                <a href="<?=base_url('admin/users/destroy/'.$id)?>" class="btn btn-danger mr-2">Delete</a>
              <?php } ?>

              <a href="<?=base_url('admin/users')?>" class="btn btn-primary mr-2">Back To List</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
