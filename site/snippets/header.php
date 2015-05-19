<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8" />
  <meta http-equiv="refresh" content="1415645643135">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/bootstrap.min.css') ?>
  <?php echo css('panel/assets/css/fontawesome.css') ?>
  <?php echo css('assets/css/fontello.css') ?>
  <?php echo css('assets/css/prism.css') ?>
  <?php echo css('assets/css/main.css') ?>

  <?php echo js('panel/assets/js/vendors/jquery.js') ?>
  <?php echo js('assets/js/respond.min.js') ?>
  <?php echo js('assets/js/html5.js') ?>
  <?php echo js('assets/js/bootstrap.min.js') ?>
  <?php echo js('assets/js/jquery.mixitup.min.js') ?>
  <?php echo js('assets/js/easing.min.js') ?>
  <?php echo js('assets/js/prism.min.js') ?>
  <?php echo js('assets/js/main.js') ?>

  <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>

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