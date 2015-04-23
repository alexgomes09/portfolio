<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/main.css') ?>
  <?php echo css('panel/assets/css/fontawesome.css') ?>

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