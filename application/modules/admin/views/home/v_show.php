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

  

  <?php if (($this->session->userdata('ses_role')=="superuserdo") || ($this->session->userdata('ses_role')=="admin")): ?>

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card" >
    <div class="card card-statistics" style="text-align: center;">
      <div class="card-body" style="text-align: center;">
      <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
      <div class="chart-container" style="position: relative; height:70vh; width:75vw">
          <canvas id="myChart"></canvas>
      </div> 
      </div>
    </div>
  </div>

  <?php endif?>


  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card" >
    <div class="card" style="text-align: center;width: 100%">
      <div class="card-header">Jadwal Ruangan</div>
      <div class="card-body">
        <b>CATATAN: &nbsp</b><br>
        <div class="fc" style="display:inline-block">
          <span class="fc-list-event-dot" style="border-color: red;"></span> Ruang khusus
          &nbsp;<span class="fc-list-event-dot" style="border-color: blue;"></span> Ruang Biasa
        </div><br>
        <p>Ruang Khusus bisa jadi dipakai pada hari selain yang ada di jadwal</p>
     
        <div id='calendar' style="max-height: 500px;overflow: scroll;"></div>
      </div>
    </div>
    
  </div>

</div>