<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta http-equiv="refresh" content="1415645643135">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/styles/github.min.css">

  <?php echo css('assets/css/bootstrap.min.css') ?>
  <?php echo css('panel/assets/css/fontawesome.css') ?>
  <?php echo css('assets/css/fontello.css') ?>
  <?php echo css('assets/css/main.css') ?>

  <?php echo js('panel/assets/js/vendors/jquery.js') ?>
  <?php echo js('assets/js/bootstrap.min.js') ?>
  <?php echo js('assets/js/jquery.mixitup.min.js') ?>
  <?php echo js('assets/js/easing.min.js') ?>
  <?php echo js('assets/js/syntaxhighlighter.min.js') ?>
  <?php echo js('assets/js/main.js') ?>

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