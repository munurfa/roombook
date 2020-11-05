		
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

	    <!-- page-body-wrapper ends -->
	  </div>
		<script src="<?=base_url('assets/admin/vendors/js/vendor.bundle.base.js');?>"></script>
		<script src="<?=base_url('assets/admin/vendors/js/vendor.bundle.addons.js');?>"></script>
		<!-- endinject -->
		<!-- inject:js -->
		<script src="<?=base_url('assets/admin/js/off-canvas.js');?>"></script>
		<script src="<?=base_url('assets/admin/js/misc.js');?>"></script>
		<script src='<?=base_url('assets/admin/fullcalendar/main.js');?>'></script>
		<script src='<?=base_url('assets/admin/fullcalendar/locales-all.js');?>'></script>
	
    <script>
		<?php if(isset($jadwal)):?>
		 document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				headerToolbar: {
					left: 'prev',
					center: 'title',
					right: 'next'
				},
				contentHeight: 'auto',
				initialView:'listMonth',
				initialDate: '<?=Date('Y-m-d')?>',
				locale: 'id',
				events: <?=$jadwal?>
			});
			calendar.render();


		 });
		 <?php endif?>

    </script>



</body>
</html>

