<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $meta_title; ?></title>

    <!-- Bootstrap -->
	    <!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Bootstrap theme -->
	<link href="<?php echo base_url('asset/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('asset/css/custom-admin.css');?>" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
  
  <script src="<?php echo base_url('asset/js/moment.js');?>"></script>
  <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('asset/js/bootstrap-datetimepicker.js');?>"></script>
  <link href="<?php echo base_url('asset/css/bootstrap-datetimepicker.css'); ?>" rel="stylesheet">

  <?php if (isset($sortable) && $sortable === TRUE): ?>
    <!-- Include all compiled plugins (below), or include individual files as needed for nestedSortable plugin -->
    <script src="<?php echo site_url('asset/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo site_url('asset/js/jquery.ui.touch-punch.js'); ?>"></script>
    <script src="<?php echo site_url('asset/js/jquery.mjs.nestedSortable.js'); ?>"></script>
  <?php endif; ?>

  <!-- TinyMCE -->
  <script src="<?php echo base_url('asset/js/tinymce/tinymce.min.js');?>"></script>
  <script type="text/javascript">
    tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code"
});

  </script>
  <!-- /TinyMCE --> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>