<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
    <?php
        if(isset($title_ung_dung))
            echo $title_ung_dung;
        else
            echo 'Công ty chuyên cung cấp gỗ';
    ?>
    </title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url('public/css_js')?>/css/themes/default/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="<?php echo base_url('public/css_js')?>/_assets/css/jqm-demos.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css_js')?>/css/themes/default/listview-grid.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<script src="<?php echo base_url('public/css_js')?>/js/jquery.js"></script>
	<script src="<?php echo base_url('public/css_js')?>/_assets/js/index.js"></script>
	<script src="<?php echo base_url('public/css_js')?>/js/jquery.mobile-1.4.5.min.js"></script>
    
    <script type="text/javascript">
    	$(document).ready(function(){
    		 $("#thep").click(function(){
       	alert('oke');
    });
    	});
    </script>
</head>