<div class="auto-form-wrapper">
<?php if ($this->session->flashdata('msg')) {
                ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $this->session->flashdata('msg'); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
<?php } ?>
<?php echo form_open('auth/save_user');?>
  <input type="hidden" name="id" value="-1">
  <input type="hidden" name="level_id" value="3">
  <input type="hidden" name="aktif" value="1">
  <div class="form-group">
    <label class="label">Nama Lengkap</label>
    <div class="input-group">

      <input type="text" name="nama" placeholder="Masukkan Nama lengkap" class="form-control" value="<?=set_value('nama') ?>">
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
    <?php if (form_error('nama')) {?>
        <small class="text-danger">
        <?=form_error('nama')?>
        </small>
    <?php } ?>
  </div>

  <div class="form-group">
    <label class="label">NIP</label>
    <div class="input-group">

    <input type="text" name="no_id" placeholder="Masukkan NIP" class="form-control" value="<?=set_value('no_id'); ?>">
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
    <?php if (form_error('no_id')) {?>
        <small class="text-danger">
        <?=form_error('no_id')?>
        </small>
    <?php } ?>
  </div>

  <div class="form-group">
    <label class="label">Username</label>
    <div class="input-group">

    <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?=set_value('username'); ?>">
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
    <?php if (form_error('username')) {?>
        <small class="text-danger">
        <?=form_error('username')?>
        </small>
    <?php } ?>
  </div>
  
  <div class="form-group">
    <label class="label">Email</label>
    <div class="input-group">

    <input type="email" name="email" placeholder="Masukkan Email" class="form-control" value="<?=set_value('email'); ?>">
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
    <?php if (form_error('email')) {?>
        <small class="text-danger">
        <?=form_error('email')?>
        </small>
    <?php } ?>
  </div>

  <div class="form-group">
    <label class="label">Password</label>
    <div class="input-group">

    <input type="password" name="passwd" placeholder="Masukkan Password" class="form-control" value="<?=set_value('passwd'); ?>">
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
    <?php if (form_error('passwd')) {?>
        <small class="text-danger">
        <?=form_error('passwd')?>
        </small>
    <?php } ?>
  </div>


  <div class="form-group">
    <?php 
      $data=array(
        'name'=>'register',
        'type'=>'submit',
        'class'=>'btn btn-primary submit-btn btn-block',
        'content'=>'Register',
        'value'=>'true'
      );
      echo form_button($data);
    ?>
  </div>
<?php form_close();?>
<div class="form-group">
  <a href="<?=site_url('auth/login')?>" class="btn btn-success submit-btn btn-block">Login</a>
</div>

</div>