<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
	<!--
 █████╗ ██╗     ███████╗██╗  ██╗     ██████╗  ██████╗ ███╗   ███╗███████╗███████╗
██╔══██╗██║     ██╔════╝╚██╗██╔╝    ██╔════╝ ██╔═══██╗████╗ ████║██╔════╝██╔════╝
███████║██║     █████╗   ╚███╔╝     ██║  ███╗██║   ██║██╔████╔██║█████╗  ███████╗
██╔══██║██║     ██╔══╝   ██╔██╗     ██║   ██║██║   ██║██║╚██╔╝██║██╔══╝  ╚════██║
██║  ██║███████╗███████╗██╔╝ ██╗    ╚██████╔╝╚██████╔╝██║ ╚═╝ ██║███████╗███████║
╚═╝  ╚═╝╚══════╝╚══════╝╚═╝  ╚═╝     ╚═════╝  ╚═════╝ ╚═╝     ╚═╝╚══════╝╚══════╝

	-->
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="google-site-verification" content="_BLsx56T6N9TpHkfHHygAokn40aL9Dz2oCuzXUQiLKE" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  
	<meta name="programmer"           content="<?php echo $site->title() .' ('. url().')'?>">
	<meta property="fb:admins"      content="1066852063">
	<meta property="og:type"        content="website">
	<meta property="og:url"         content="http://www.alexgomes.tk/">
	<meta property="og:image"       content="http://alexgomes.tk/assets/images/favicon.png">
	<meta property="og:title"       content="Alex Gomes">
	<meta property="og:description" content="Alex gomes's portfolio. My portfolio contains all of my project that I have done during my academic year and spare time">
  
	<link rel="shortcut icon" href="<?php echo url('assets/images/favicon.png')?>" type="image/png" />
	<link rel="canonical" href="<? echo url()?>">
	
  <?php echo css('assets/css/magic.min.css') ?>
  <?php echo css('assets/css/bootstrap.min.css') ?>
  <?php echo css('panel/assets/css/fontawesome.css') ?>
  <?php echo css('assets/css/fontello.css') ?>
  <?php echo css('assets/css/prism.css') ?>
  <?php echo css('assets/css/main.css') ?>
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63913625-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
  <header class="header cf" role="banner">
    <div class="logo">
      <a href="<?php echo url() ?>">
        <img src="<?php echo url('assets/images/avatar.png') ?>" alt="<?php echo $site->title()->html() ?>" />
      </a>
    </div>

    <?php snippet('menu') ?>
  </header>