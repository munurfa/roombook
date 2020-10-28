<div class="row">

  <div class="col-md-5 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
       
        <?php echo form_open('admin/users/ubah_pass_aksi')?>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Ubah Password</h4>


              <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" name="passwd" placeholder="enter password" class="form-control">
              </div>
                <?php if (form_error('passwd')) {?>
                <small class="text-danger">
                <?=form_error('passwd')?>
                </small>
                <?php } ?>

              <div class="form-group">
                <label><b>Ulangi Password</b></label>
                <input type="password" name="passconf" placeholder="enter again password" class="form-control" >
              </div>
                <?php if (form_error('passconf')) {?>
                <small class="text-danger">
                <?=form_error('passconf')?>
                </small>
                <?php } ?>


              

              
              <button type="submit" class="btn btn-success mr-2">Ubah Password</button>
              <?php echo form_close()?>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
