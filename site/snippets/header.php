<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="google-site-verification" content="_BLsx56T6N9TpHkfHHygAokn40aL9Dz2oCuzXUQiLKE" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8" />
  <meta http-equiv="refresh" content="1415645643135">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/magic.min.css') ?>
  <?php echo css('assets/css/bootstrap.min.css') ?>
  <?php echo css('panel/assets/css/fontawesome.css') ?>
  <?php echo css('assets/css/fontello.css') ?>
  <?php echo css('assets/css/prism.css') ?>
  <?php echo css('assets/css/main.css') ?>
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