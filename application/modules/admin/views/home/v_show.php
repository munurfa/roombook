<?php if ($this->session->flashdata('msg')) {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $this->session->flashdata('msg'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card" >
    <div style="text-align: center;width: 100%">
      
        <img src="<?=base_url('assets/admin/images/logo.png');?>">
    </div>
    <!-- <div class="card card-statistics" style="text-align: center;"> -->
      <!-- <div class="card-body" style="text-align: center;"> -->
      <!-- </div> -->
    <!-- </div> -->
  </div>
</div>