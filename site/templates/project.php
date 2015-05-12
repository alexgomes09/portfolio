<?php snippet('header') ?>

<main class="main" role="main">

  <h1><?php echo $page->title()->html() ?></h1>

  <div class="text">

    <div id="projectInfo">
      <b>Technology Used: </b><br>
      <?php foreach($page->tags()->split(',') as $tag): ?>
        <?php echo $tag."<br>"?> 
      <?php endforeach ?>
      <p><br><b>Year: </b><?php echo $page->year('Y', 'year') ?></p>
      
      <?php echo $page->sidenote()->kirbytext() ?>

      <a class="sourcecode" data-toggle="modal" data-target="#basicModal">Open Project</a>
      <a class="sourcecode" href="<?php echo $page->sourcecode() ?>" target="_blank">Source Code</a>

      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal-title">
              <button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
              <h4 class="modal-title"><?php echo $page->title() ?></h4>
            </div>
            <div class="modal-body">
              <iframe class="lunch" src="<?php echo $page->url().'/Simplicity/index.html' ?>"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="projectDetails">
      <?php echo $page->text()->kirbytext() ?>

     <pre class="highlight">
    // Define our Function
    function checkMeaningOfLife ( decimal, success ) {
        if ( parseInt(decimal,10) === 42 ) {
            window.console.log(success);
        }
    };
    // Define our Variables
    var str = 'The meaning of life is true',
        decimal = 42.00;
    // Fire our Function
    checkMeaningOfLife(decimal,success);
</pre>
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
