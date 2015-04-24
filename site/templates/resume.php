<?php snippet('header') ?>

<main class="main" role="main">

    <div class="text">
    	<h2>Skills</h2>
		<?php foreach($page->skills()->yaml() as $skills): ?>
		    <div class="skills">
			    <span><?php echo $skills["skill"] ?></span>
			    <span><?php echo $skills["range"] ?></span>
		    </div>
		</div>
		<?php endforeach ?>
    </div>

</main>

<?php snippet('footer') ?>