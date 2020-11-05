<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=$title;?></title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/css/vendor.bundle.base.css');?>">
  <?php if($this->uri->segment(2)!='home'):?>
	<link rel="stylesheet" href="<?=base_url('assets/admin/vendors/css/vendor.bundle.addons.css');?>">
  <?php endif?>
  
	<link rel="stylesheet" href="<?=base_url('assets/admin/datatables/datatables.min.css');?>">
	<link rel="stylesheet" href="<?=base_url('assets/admin/datatables/buttons/css/buttons.dataTables.min.css');?>">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/css/style.css');?>">
	<link rel="stylesheet" href="<?=base_url('assets/admin/css/sweetalert2.min.css');?>">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?=base_url('assets/admin/images/logo.png');?>" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <link href='<?=base_url('assets/admin/fullcalendar/main.css');?>' rel='stylesheet' />

	<script src="<?=base_url('assets/admin/js/jquery.min.js');?>"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

	<script>
    var base_url = "<?=base_url()?>";
  </script>
  <script src="<?=base_url('assets/admin/vendors/tinymce/tinymce.min.js');?>"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



	<script>
    

		tinymce.init({ 
			selector:'textareas',
			plugins: 'code',
		});

		function initImageUpload(editor) {
  // create input and insert in the DOM
  var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
  $(editor.getElement()).parent().append(inp);

  // add the image upload button to the editor toolbar
  editor.addButton('imageupload', {
    text: '',
    icon: 'image',
    onclick: function(e) { // when toolbar button is clicked, open file select modal
      inp.trigger('click');
    }
  });

  // when a file is selected, upload it to the server
  inp.on("change", function(e){
    uploadFile($(this), editor);
  });
}

function uploadFile(inp, editor) {
  var input = inp.get(0);
  var data = new FormData();
  data.append('image[file]', input.files[0]);

  $.ajax({
    url: '/admin/images',
    type: 'POST',
    data: data,
    processData: false, // Don't process the files
    contentType: false, // Set content type to false as jQuery will tell the server its a query string request
    success: function(data, textStatus, jqXHR) {
      editor.insertContent('<img class="content-img" src="' + data.url + '"/>');
    },
    error: function(jqXHR, textStatus, errorThrown) {
      if(jqXHR.responseText) {
        errors = JSON.parse(jqXHR.responseText).errors
        alert('Error uploading image: ' + errors.join(", ") + '. Make sure the file is an image and has extension jpg/jpeg/png.');
      }
    }
  });
}
	</script>
</head>
<body>
	<div class="container-scroller">