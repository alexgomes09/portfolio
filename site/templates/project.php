<?php snippet('header') ?>

<main class="main" role="main">

  <h1><?php echo $page->title()->html() ?></h1>

  <div class="text">

    <div id="projectInfo">
      <b>Technology Used: </b><br>
      <?php foreach($page->tags()->split(',') as $tag): ?>
        <?php echo $tag."<br>"?> 
      <?php endforeach ?>

      <p><br><b>Year: </b><?php echo $page->date('Y', 'year') ?></p>
      <?php echo $page->sidenote()->kirbytext() ?>
    </div>

    <div id="projectDetails">
      <?php echo $page->text()->kirbytext() ?>
    </div>

  </div>

  <div class="nextprev cf" role="navigation">
    <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>"><i class="fa fa-arrow-left"></i> previous project</a>
    <?php endif ?>
    <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next project <i class="fa fa-arrow-right"></i></a>
    <?php endif ?>
  </div>

</main>

<?php snippet('footer') ?>
