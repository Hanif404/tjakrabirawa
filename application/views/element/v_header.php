<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0030)http://setjen.pertanian.go.id/ -->
<html lang="en" style="height: 100%;">
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($meta_description != NULL && $meta_content != NULL):?>
        <meta name="description" content="<?php echo $meta_description;?>">
        <meta name="author" content="<?php echo $meta_content;?>">
    <?php endif;?>
    <?php
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    ?>
    <meta name="description" content="Perekonomian Sukabumi">
    <meta name="author" content="sukabumi">
    <meta http-equiv="content-language" content="id, en">
    <meta name="robots" content="all" />
    <meta name="spiders" content="all" />
    
    <title>Perekonomian - Sukabumi</title>
    <link rel="shortcut icon" href="<?php echo base_url('asset/img/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('asset/img/favicon.ico'); ?>" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
	<link href="<?php echo base_url('asset/css/magnific-popup.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/site.css'); ?>" rel="stylesheet">
	<script src="<?php echo base_url('asset/js/jquery/jquery.js');?>"></script>
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/creative.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/map.min.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/magnific-popup/jquery.magnific-popup.js'); ?>"></script>
	<script src="<?php echo base_url('asset/js/scrollreveal/scrollreveal.js');?>"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script>
		      function initialize() {
		        var mapCanvas = document.getElementById('map');
		        var mapOptions = {
		          center: new google.maps.LatLng(-6.273294, 106.816177),
		          zoom: 13,
		          mapTypeId: google.maps.MapTypeId.ROADMAP,
		          scrollwheel: false,

		        }
		        var map = new google.maps.Map(mapCanvas, mapOptions)
		        var marker = new google.maps.Marker({
		            position: new google.maps.LatLng(-6.273294, 106.816177),
		            map: map,
		            animation: google.maps.Animation.DROP,
		            title: 'Oen Choennah & Co Office',
		            icon: 'images/marker.png'
		        });
		         var contentinfo =
			      '<h1>Oen Choennah & Co</h1>'+
			      '<p><b>The Habibie Centre Building, 2nd floor Jl. kemang Selatan No.98, Kemang Jakarta Selatan 12560 Indonesia</b></p>'+
			      '<p><a href="#">View in google map</a></p>';

			      var infowindow = new google.maps.InfoWindow({
			      content: contentinfo
			  });

			  google.maps.event.addListener(marker, 'click', function() {
			    infowindow.open(map,marker);
			  });
		      }
		      google.maps.event.addDomListener(window, 'load', initialize);
		</script>
    </head>
	<body class="site-index">
	 <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand page-scroll" href="#home"><img src="<?php echo base_url('asset/images/logo.png');?>" width="80%"/></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
          <li>
            <a class="page-scroll" href="../../#home">BERANDA</a>
          </li>
          <li>
            <a class="page-scroll" href="../../#about">TENTANG KAMI</a>
          </li>
          <li>
            <a class="page-scroll" href="../../#news">NEWS</a>
          </li>
          <li>
            <a class="page-scroll" href="../../#csr">CSR</a>
          </li>
          <li>
            <a class="page-scroll" href="../../#dbisnis">DIREKTORI BISNIS</a>
          </li>
          <li>
            <a class="page-scroll" href="../../#kbr">KEBIJAKAN & REGULASI</a>
          </li>
          <li>
            <a class="page-scroll" href="../../#hub">HUBUNGI KAMI</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
	