<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/grocery_crud/themes/bootstrap/css/bootstrap/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/grocery_crud/themes/bootstrap/css/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/grocery_crud/themes/bootstrap/css/common.css">
</head>
<body>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<script>
        function emodal(url, title) {
        eModal.iframe(url, title);
    }
</script>
	<script src="<?php echo base_url() ?>/assets/grocery_crud/themes/bootstrap/js/jquery-plugins/bootstrap-growl.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/grocery_crud/themes/bootstrap/js/bootstrap/dropdown.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/grocery_crud/js/jquery_plugins/eModal.min.js"></script>
	
</body>
</html>
