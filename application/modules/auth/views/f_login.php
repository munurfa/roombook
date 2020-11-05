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

<?php if ($this->session->flashdata('msg_success')) {
                ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $this->session->flashdata('msg_success'); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
<?php } ?>
<?php echo form_open('auth/authlogin');?>

  <div class="form-group">
    <label class="label">Username</label>
    <div class="input-group">
      <?php 
      $data=array(
        'name'=> 'username',
        'type'=> 'username',
        'class'=>'form-control',
        'placeholder'=> 'enter username kamu disini',
        'required'=> 'required'
      );
      echo form_input($data);?>
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="label">Password</label>
    <div class="input-group">
      <?php 
      $data=array(
        'name'=>'password',
        'type'=>'password',
        'class'=>'form-control',
        'placeholder'=>'pastikan password 6 digit',
        'required'=>'required'
        ); 
      echo form_input($data);?>
      <div class="input-group-append">
        <span class="input-group-text">
          <i class="mdi mdi-check-circle-outline"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <?php 
      $data=array(
        'name'=>'login',
        'type'=>'submit',
        'class'=>'btn btn-primary submit-btn btn-block',
        'content'=>'Login',
        'value'=>'true'
      );
      echo form_button($data);
    ?>
  </div>
<?php form_close();?>

<div class="form-group">
  <a href="<?=site_url('auth/register')?>" class="btn btn-success submit-btn btn-block">Register</a>
</div>

</div>