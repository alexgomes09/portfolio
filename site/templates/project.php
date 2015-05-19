<?php snippet('header') ?>

<main class="main" role="main">

  <h1><?php echo $page->title()->html() ?></h1>

  <div class="text">

    <div id="projectInfo">
      <b>Technology Used: </b><br></br>
      <?php foreach($page->tags()->split(',') as $tag): ?>
        <?php echo $tag."<br>"?> 
      <?php endforeach ?>
      <p><br><b>Year: </b><?php echo $page->year('Y', 'year') ?></p>
      
      <?php echo $page->sidenote()->kirbytext() ?>

      <?php if(!$page->projectlocation()->empty()): ?>
        <a class="button" href="<?php echo $page->projectlocation() ?>" target="_blank">
          <i class="fa fa-external-link"></i> Open Project
        </a>
      <?php endif ?>
      <?php if(!$page->sourcecode()->empty()): ?>
        <a class="button" href="<?php echo $page->sourcecode() ?>" target="_blank">
          <i class="fa fa-code"></i> Source Code
        </a>
      <?php endif ?>
      <?php if(!$page->download()->empty()): ?>
        <a class="button" href="<?php echo $page->file($page->download())->url() ?>" target="_parent">
          Download Project (<?php echo $page->file($page->download())->niceSize() ?>)
        </a>
      <?php endif ?>
    </div>

    <div id="projectDetails">
      <?php echo $page->text()->kirbytext() ?>

      <?php if(!$page->codesnippet()->empty()): ?>
        <ul class="nav nav-tabs" role="tablist" id="codeTab">
          <?php foreach($page->codesnippet()->yaml() as $codesnippet): ?>
            <li role="presentation">
              <a href="#<?php echo $codesnippet['filename'] ?>" aria-controls="home" role="tab" data-toggle="tab">
                <?php echo $codesnippet['filename'] ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>

        <div class="tab-content">
          <?php foreach($page->codesnippet()->yaml() as $codesnippet): ?>
            <div role="tabpanel" class="tab-pane" id="<?php echo $codesnippet['filename'] ?>">
              <pre class="<?php echo $codesnippet['languagetype'] ?> line-numbers">
                <code>
                  <?php echo $codesnippet['code']?>
                </code>
              </pre>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
      

    </div> <!-- projectDetails end -->


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
