		</div>
		<footer class="footer">
			<div class="container-fluid clearfix">
			<span class="text-danger d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
			  . All rights reserved.</span>
			<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
			  <i class="mdi mdi-heart text-danger"></i>
			</span>
			</div>
		</footer>
	   <!-- partial -->
	      </div>
	      <!-- main-panel ends -->
	    </div>
	    <!-- page-body-wrapper ends -->
	  </div>
	<!-- plugins:js -->
	<script src="<?=base_url('assets/admin/vendors/js/vendor.bundle.base.js');?>"></script>
	<script src="<?=base_url('assets/admin/vendors/js/vendor.bundle.addons.js');?>"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="<?=base_url('assets/admin/js/off-canvas.js');?>"></script>
	<script src="<?=base_url('assets/admin/js/misc.js');?>"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="<?=base_url('assets/admin/js/dashboard.js');?>"></script>
	<script src="<?=base_url('assets/admin/js/datatable.min.js');?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src='<?=base_url('assets/admin/fullcalendar/main.js');?>'></script>
	<script src='<?=base_url('assets/admin/fullcalendar/locales-all.js');?>'></script>
	<!-- End custom js for this page-->
	<script>
		$(".datepicker").flatpickr({
			altInput: true,
			altFormat: "j F Y",
			dateFormat: "Y-m-d",
		});
		$(".timepicker").flatpickr({
			enableTime: true,
			noCalendar: true,
			dateFormat: "H:i",
			minTime: "07:00",
			maxTime: "19:00",
			time_24hr: true
		});
		$(".datetimepicker").flatpickr({
			enableTime: true,
			altInput: true,
			altFormat: "j F Y H:i",
			dateFormat: "Y-m-d H:i",
			time_24hr: true
		});

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